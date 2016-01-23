/**********************************
* jCounter Script v0.1.4 (beta)
* Author: Catalin Berta
* Official page and documentation: http://devingredients.com/jcounter
* Licensed under the MIT license
**********************************/
;(function($,document,window,undefined) {
	//once upon a time...
	$.fn.jCounter = function(options,callback) {
		var jCounterDirection = 'down'; // points out whether it should count down or up | handled via customRange setting
		
		var customRangeDownCount; //if true, it will tell countdown_proc() it's a down count and not an up count
		var days,hours,minutes,seconds;
		var endCounter = false; //stops jCounter if true
		var eventDate; //time target (holds a number of seconds)
		var pausedTime; //stores the time (in seconds) when pausing
		var thisEl = this; //custom 'this' selector
		var thisLength = this.length; //number of multiple elements per selector

		var pluralLabels = new Array('DAYS','HOURS','MINUTES','SECONDS'); //plural labels - used for localization
		var singularLabels = new Array('DAY','HOUR','MINUTE','SECOND');	//singular labels - used for localization

		this.options = options; //stores jCounter's options parameter to verify against specified methods
		this.version = '0.1.4';

		//default settings
		var settings = {
			animation: null,
			callback: null,
			customDuration: null,
			customRange: null,
			date: null,
			debugLog: false,
			serverDateSource: 'dateandtime.php', //path to dateandtime.php file (i.e. http://my-domain.com/dateandtime.php)
			format: 'dd:hh:mm:ss',
			timezone: 'Europe/London',
			twoDigits: 'on'
		};

		//merge the settings with the options values
		if (typeof options === 'object') {
			$.extend(settings,options);
			thisEl.data("userOptions", settings); //push the settings to applied elements (they're used by methods)
		}

		if(thisEl.data('userOptions').debugLog == true &&  window['console'] !== undefined ) {
			var consoleLog = true;	//shows debug messages via console.log() if true
		}

		//METHODS
		var jC_methods = {
			//initialize
			init : function() {
				thisEl.each(function(i,el) {
					initCounter(el);
				});
			},
			//pause method: $.jCounter('pause')
			pause : function() {
				if(consoleLog) { console.log("(jC) Activity: Counter paused."); }
				endCounter = true;
				return thisEl.each(function(i,el) {
					clearInterval($(el).data("jC_interval"));
				});
			},
			//stop method: $.jCounter('stop')
			stop : function() {
				if(consoleLog) { console.log("(jC) Activity: Counter stopped."); }
				endCounter = true;
				return thisEl.each(function(i,el) {
					clearInterval($(el).data("jC_interval"));
					$(el).removeData("jC_pausedTime");
					resetHTMLCounter(el);
				});
			},
			//reset method: $.jCounter('reset')
			reset : function() {
				if(consoleLog) { console.log("(jC) Activity: Counter reset."); }
				return thisEl.each(function(i,el) {
					clearInterval($(el).data("jC_interval"));
					resetHTMLCounter(el);
					initCounter(el);
				});
			},
			//start method: $.jCounter('start')
			
			start : function() {
				if(consoleLog) { console.log("(jC) Activity: Counter started."); }
				return thisEl.each(function(i,el) {
					pausedTime = $(el).data("jC_pausedTime");
					endCounter = false;
					clearInterval($(el).data("jC_interval"));
					initCounter(el);
				});
			}
		}
		
		//checks whether customDuration is used
		if(thisEl.data("userOptions").customDuration) {
			if(!isNaN(thisEl.data("userOptions").customDuration)) {
				var customDuration = true;
			} else {
				var customDuration = false;
				if(consoleLog) { console.log("(jC) Error: The customDuration value is not a number! NOTE: 'customDuration' accepts a number of seconds."); }
			}
		}
		
		//checks whether customRange is used
		if(thisEl.data("userOptions").customRange) {	
			var customRangeValues = thisEl.data("userOptions").customRange.split(":");
			var rangeVal0 = parseInt(customRangeValues[0]);
			var rangeVal1 = parseInt(customRangeValues[1]);
			if(!isNaN(rangeVal0) && !isNaN(rangeVal1)) {
				var customRange = true;
				if(rangeVal0 > rangeVal1) {
					var customRangeDownCount = true;
				} else {
					var customRangeDownCount = false;
					jCounterDirection = 'up';
				}
			} else {
				var customRange = false;
				if(consoleLog) { console.log("(jC) Error: The customRange value is not a valid range! Example: customRange: '0:30' or '30:0'"); }
			}
		}

		//checks whether animation is set to slide
		if(thisEl.data("userOptions").animation == 'slide') {	
			thisEl.data("jCanimation","slide");
		}

		//FUNCTIONS
		
		//jCounter initializer
		function initCounter(el) {
			if(customDuration) {
				if (pausedTime) {
					if (!isNaN(pausedTime)) {
						eventDate = Math.round(pausedTime);
					}
				} else {
					eventDate = Math.round($(el).data("userOptions").customDuration);
				}
				currentTime = 0;
				countdown_proc(currentTime,el);
				$(el).data("jC_interval", setInterval(function(){
					if(endCounter == false) {
						currentTime = parseInt(currentTime) + 1;
						countdown_proc(currentTime,el)
					}				
				},1000));
			} else if(customRange) {
				eventDate = Math.round(customRangeValues[1]);
				if (pausedTime) {
					if (!isNaN(pausedTime)) {
						var currentTime = eventDate - pausedTime;
					}
				} else {
					var currentTime = Math.round(customRangeValues[0]);
				}
				countdown_proc(currentTime,el);
				$(el).data("jC_interval", setInterval(function(){
					if(endCounter == false) {
						var ifRangeDownCount = (customRangeDownCount) ? currentTime = parseInt(currentTime) - 1 : currentTime = parseInt(currentTime) + 1;
						countdown_proc(currentTime,el);
					}				
				},1000));
			} else {
				eventDate = Date.parse($(el).data("userOptions").date) / 1000;
				dateSource = thisEl.data("userOptions").serverDateSource + '?timezone=' + thisEl.data("userOptions").timezone + '&callback=?';
				$.ajax({
                	url: dateSource,
	                dataType : 'json',
	                data : {},
	                success : function(data, textStatus){
						var currentDate = Date.parse(data.currentDate) / 1000;
						startCounter(currentDate,el);
	                },
	                error : function(){
						if(consoleLog) { console.log("(jC) Error: Couldn't find dateandtime.php from serverDateSource: " + thisEl.data('userOptions').serverDateSource + "\n(jC) - Make sure the path is correct! \n(jC) - Now using the client-side time (not recommended).") }
						var currentDate = Math.floor($.now() / 1000);
						startCounter(currentDate,el);
	                }
            	});
			}
		}

		function startCounter(currentDate,el) {
			countdown_proc(currentDate,el);
			if (eventDate > currentDate) {
				$(el).data("jC_interval", setInterval(function(){
					if(endCounter == false) {
						currentDate = parseInt(currentDate) + 1;
						countdown_proc(currentDate,el)
					}				
				},1000));
			} else {
				resetHTMLCounter(el)
			}
		}

		//jCslider - adds the slide effect layer
		//Note: this requires a jCounter slide-ready theme! (i.e. iOS dark or iOS light)
		function jCslider(el,unitClass,timeUnit,eventDate,duration) {
			$(el).find(unitClass + " u").each(function(i,el) {
				var twoDigits = (thisEl.data("userOptions").twoDigits == 'on') ? '0' : '';
				var newIndex = (jCounterDirection == 'up') ? newIndex = -i : newIndex = i;		
				currNo = parseInt(timeUnit,10) + (newIndex);
				if (String(parseInt(timeUnit,10)).length >= 2) { 
					$(el).text(parseInt(timeUnit,10) + (newIndex))
				} else if(String(parseInt(timeUnit,10)).length == 1 && currNo == 10) {
					$(el).text(parseInt(timeUnit,10) + (newIndex))
				} else {
					$(el).text(twoDigits + (parseInt(timeUnit,10) + (newIndex)));
				}
			})
			$(el).find(unitClass).animate({
				top: '0.15em'
			},200, function() {
				$(el).find(unitClass + " u:eq(1)").remove();
				$(el).find(unitClass).prepend('<u></u>');
				$(el).find(unitClass).css({'top':'-1.24em'})					
			});
		}

		//resets jCounter's HTML values to 0 or 00, based on the twoDigits setting
		function resetHTMLCounter(el) {
			if(thisEl.data("userOptions").twoDigits == 'on') {
				$(el).find(".days,.hours,.minutes,.seconds").text('00');
			} else if(thisEl.data("userOptions").twoDigits == 'off') {
				$(el).find(".days,.hours,.minutes,.seconds").text('0');
			}
			if(thisEl.data("jCanimation") == 'slide') {
				$(el).find(".daysSlider u,.hoursSlider u,.minutesSlider u,.secondsSlider u").text('00');
			}
		}

		//main jCounter processor
		function countdown_proc(duration,el) {
			//check if the counter needs to count down or up
			if(customRangeDownCount) {
				if(eventDate >= duration) {
					clearInterval($(el).data("jC_interval"));
					if(thisEl.data("userOptions").callback) {
						thisEl.data("userOptions").callback.call(this);
					}
				}

			} else {
				if(eventDate <= duration) {
					clearInterval($(el).data("jC_interval"));
					if(thisEl.data("userOptions").callback) {
						thisEl.data("userOptions").callback.call(this);
					}
				}
			}
			
			//if customRange is used, update the seconds variable
			var seconds = (customRange) ? duration : eventDate - duration;

			var thisInstanceFormat = thisEl.data("userOptions").format;
			
			//calculate seconds into days,hours,minutes,seconds
			//if dd (days) is specified in the format setting (i.e. format: 'dd:hh:mm:ss')
			if(thisInstanceFormat.indexOf('dd') != -1)  {
				var days = Math.floor(seconds / (60 * 60 * 24)); //calculate the number of days
				seconds -= days * 60 * 60 * 24; //update the seconds variable with no. of days removed
			}
			//if hh (hours) is specified
			if(thisInstanceFormat.indexOf('hh') != -1)  {
				var hours = Math.floor(seconds / (60 * 60));
				seconds -= hours * 60 * 60; //update the seconds variable with no. of hours removed
			}
			//if mm (minutes) is specified
			if(thisInstanceFormat.indexOf('mm') != -1)  {
				var minutes = Math.floor(seconds / 60);
				seconds -= minutes * 60; //update the seconds variable with no. of minutes removed
			}
			//if ss (seconds) is specified
			if(thisInstanceFormat.indexOf('ss') == -1)  {
				seconds -= seconds; //if ss is unspecified in format, update the seconds variable to 0;
			}

			//conditional Ss
			//updates the plural and singular labels accordingly
			if (days == 1) { $(el).find(".textDays").text(singularLabels[0]); } else { $(el).find(".textDays").text(pluralLabels[0]); }
			if (hours == 1) { $(el).find(".textHours").text(singularLabels[1]); } else { $(el).find(".textHours").text(pluralLabels[1]); }
			if (minutes == 1) { $(el).find(".textMinutes").text(singularLabels[2]); } else { $(el).find(".textMinutes").text(pluralLabels[2]); }
			if (seconds == 1) { $(el).find(".textSeconds").text(singularLabels[3]); } else { $(el).find(".textSeconds").text(pluralLabels[3]); }
			
			//twoDigits ON setting
			//if the twoDigits setting is set to ON, jCounter will always diplay a minimum number of 2 digits
			if(thisEl.data("userOptions").twoDigits == 'on') {
				days = (String(days).length >= 2) ? days : "0" + days;
				hours = (String(hours).length >= 2) ? hours : "0" + hours;
				minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
				seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
			}

			//updates the jCounter's html values
			if(!isNaN(eventDate)) {
				$(el).find(".days").text(days);
				$(el).find(".hours").text(hours);
				$(el).find(".minutes").text(minutes);
				$(el).find(".seconds").text(seconds);

				if(thisEl.data("jCanimation") == 'slide') {
					$(el).find(".daysSlider u:eq(1)").text(days);
					$(el).find(".hoursSlider u:eq(1)").text(hours);
					$(el).find(".minutesSlider u:eq(1)").text(minutes);
					$(el).find(".secondsSlider u:eq(1)").text(seconds);
					jCslider(el,'.secondsSlider',seconds,eventDate,duration); 
					if(parseInt(seconds,10) == 59) { 
						jCslider(el,'.minutesSlider',minutes,eventDate,duration) 
						if(parseInt(minutes,10) == 59) { 
							jCslider(el,'.hoursSlider',hours,eventDate,duration) 
							if(parseInt(hours,10) == 23) { 
								jCslider(el,'.daysSlider',days,eventDate,duration) 
							}
						}
					}	
				}
			} else { 
				if(consoleLog) { console.log("(jC) Error: Invalid date! Here's an example: 01 January 1970 12:00:00"); }
				clearInterval($(el).data("jC_interval"));
			}
			//stores the remaining time when pausing jCounter
			$(el).data("jC_pausedTime", eventDate-duration);
		}
		
		
		
		//method calling logic
		if ( jC_methods[this.options] ) {
			return jC_methods[ this.options ].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof this.options === 'object' || ! this.options ) {
			return jC_methods.init.apply( this, arguments );
		} else {
			console.log('(jC) Error: Method >>> ' +  this.options + ' <<< does not exist.' );
		} 

	}
	//the end;
}) (jQuery,document,window);