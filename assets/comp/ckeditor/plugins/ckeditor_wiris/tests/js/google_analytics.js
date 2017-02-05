if (window.location.hostname == 'www.wiris.com' || window.location.hostname == 'www.wiris.net') {
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-3542309-1']);
	_gaq.push(['_trackPageview']);
	_gaq.push(['_setDomainName', 'wiris.com']); 

	(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	 })();
}
