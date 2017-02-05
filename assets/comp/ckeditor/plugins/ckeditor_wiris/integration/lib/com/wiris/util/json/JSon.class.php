<?php

class com_wiris_util_json_JSon extends com_wiris_util_json_StringParser {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function newLine($depth, $sb) {
		$sb->add("\x0D\x0A");
		$i = null;
		{
			$_g = 0;
			while($_g < $depth) {
				$i1 = $_g++;
				$sb->add("  ");
				unset($i1);
			}
		}
		$this->lastDepth = $depth;
	}
	public function setAddNewLines($addNewLines) {
		$this->addNewLines = $addNewLines;
	}
	public function decodeArray() {
		$v = new _hx_array(array());
		$this->nextToken();
		$this->skipBlanks();
		if($this->c === 93) {
			$this->nextToken();
			return $v;
		}
		while($this->c !== 93) {
			$o = $this->localDecode();
			$v->push($o);
			$this->skipBlanks();
			if($this->c === 44) {
				$this->nextToken();
				$this->skipBlanks();
			} else {
				if($this->c !== 93) {
					throw new HException("Expected ',' or ']'.");
				}
			}
			unset($o);
		}
		$this->nextToken();
		return $v;
	}
	public function decodeHash() {
		$h = new Hash();
		$this->nextToken();
		$this->skipBlanks();
		if($this->c === 125) {
			$this->nextToken();
			return $h;
		}
		while($this->c !== 125) {
			$key = $this->decodeString();
			$this->skipBlanks();
			if($this->c !== 58) {
				throw new HException("Expected ':'.");
			}
			$this->nextToken();
			$this->skipBlanks();
			$o = $this->localDecode();
			$h->set($key, $o);
			$this->skipBlanks();
			if($this->c === 44) {
				$this->nextToken();
				$this->skipBlanks();
			} else {
				if($this->c !== 125) {
					throw new HException("Expected ',' or '}'. " . $this->getPositionRepresentation());
				}
			}
			unset($o,$key);
		}
		$this->nextToken();
		return $h;
	}
	public function decodeNumber() {
		$sb = new StringBuf();
		$hex = false;
		$floating = false;
		do {
			$sb->add(com_wiris_util_json_JSon_0($this, $floating, $hex, $sb));
			$this->nextToken();
			if($this->c === 120) {
				$hex = true;
				$sb->add(com_wiris_util_json_JSon_1($this, $floating, $hex, $sb));
				$this->nextToken();
			}
			if($this->c === 46 || $this->c === 69 || $this->c === 101) {
				$floating = true;
			}
		} while($this->c >= 48 && $this->c <= 58 || $hex && $this->isHexDigit($this->c) || $floating && ($this->c === 46 || $this->c === 69 || $this->c === 101 || $this->c === 45));
		if($floating) {
			return Std::parseFloat($sb->b);
		} else {
			return Std::parseInt($sb->b);
		}
	}
	public function decodeString() {
		$sb = new StringBuf();
		$d = $this->c;
		$this->nextToken();
		while($this->c !== $d) {
			if($this->c === 92) {
				$this->nextToken();
				if($this->c === 110) {
					$sb->add("\x0A");
				} else {
					if($this->c === 114) {
						$sb->add("\x0D");
					} else {
						if($this->c === 34) {
							$sb->add("\"");
						} else {
							if($this->c === 39) {
								$sb->add("'");
							} else {
								if($this->c === 116) {
									$sb->add("\x09");
								} else {
									if($this->c === 92) {
										$sb->add("\\");
									} else {
										if($this->c === 117) {
											$this->nextToken();
											$code = com_wiris_util_json_JSon_2($this, $d, $sb);
											$this->nextToken();
											$code .= com_wiris_util_json_JSon_3($this, $code, $d, $sb);
											$this->nextToken();
											$code .= com_wiris_util_json_JSon_4($this, $code, $d, $sb);
											$this->nextToken();
											$code .= com_wiris_util_json_JSon_5($this, $code, $d, $sb);
											$dec = Std::parseInt("0x" . $code);
											$sb->add(com_wiris_util_json_JSon_6($this, $code, $d, $dec, $sb));
											unset($dec,$code);
										} else {
											throw new HException("Unknown scape sequence '\\" . com_wiris_util_json_JSon_7($this, $d, $sb) . "'");
										}
									}
								}
							}
						}
					}
				}
			} else {
				$sb->add(com_wiris_util_json_JSon_8($this, $d, $sb));
			}
			$this->nextToken();
		}
		$this->nextToken();
		return $sb->b;
	}
	public function decodeBooleanOrNull() {
		$sb = new StringBuf();
		while(com_wiris_util_xml_WCharacterBase::isLetter($this->c)) {
			$sb->b .= chr($this->c);
			$this->nextToken();
		}
		$word = $sb->b;
		if($word === "true") {
			return true;
		} else {
			if($word === "false") {
				return false;
			} else {
				if($word === "null") {
					return null;
				} else {
					throw new HException("Unrecognized keyword \"" . $word . "\".");
				}
			}
		}
	}
	public function localDecode() {
		$this->skipBlanks();
		if($this->c === 123) {
			return $this->decodeHash();
		} else {
			if($this->c === 91) {
				return $this->decodeArray();
			} else {
				if($this->c === 34) {
					return $this->decodeString();
				} else {
					if($this->c === 39) {
						return $this->decodeString();
					} else {
						if($this->c === 45 || $this->c >= 48 && $this->c <= 58) {
							return $this->decodeNumber();
						} else {
							if($this->c === 116 || $this->c === 102 || $this->c === 110) {
								return $this->decodeBooleanOrNull();
							} else {
								throw new HException("Unrecognized char " . _hx_string_rec($this->c, ""));
							}
						}
					}
				}
			}
		}
	}
	public function localDecodeString($str) {
		$this->init($str);
		return $this->localDecode();
	}
	public function encodeIntegerFormat($sb, $i) {
		$sb->add($i->toString());
	}
	public function encodeLong($sb, $i) {
		$sb->add("" . Std::string($i));
	}
	public function encodeFloat($sb, $d) {
		$sb->add(com_wiris_system_TypeTools::floatToString($d));
	}
	public function encodeBoolean($sb, $b) {
		$sb->add((($b) ? "true" : "false"));
	}
	public function encodeInteger($sb, $i) {
		$sb->add("" . _hx_string_rec($i, ""));
	}
	public function encodeString($sb, $s) {
		$sb->add("\"");
		$i = null;
		{
			$_g1 = 0; $_g = strlen($s);
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$c = _hx_char_code_at($s, $i1);
				if($c === 34) {
					$sb->add("\\\"");
				} else {
					if($c === 13) {
						$sb->add("\\r");
					} else {
						if($c === 10) {
							$sb->add("\\n");
						} else {
							if($c === 9) {
								$sb->add("\\t");
							} else {
								if($c === 92) {
									$sb->add("\\\\");
								} else {
									$sb->add(_hx_char_at($s, $i1));
								}
							}
						}
					}
				}
				unset($i1,$c);
			}
		}
		$sb->add("\"");
	}
	public function encodeArray($sb, $v) {
		$newLines = $this->addNewLines && com_wiris_util_json_JSon::getDepth($v) > 2;
		$this->depth++;
		$myDepth = $this->lastDepth;
		$sb->add("[");
		if($newLines) {
			$this->newLine($this->depth, $sb);
		}
		$i = null;
		{
			$_g1 = 0; $_g = $v->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$o = $v[$i1];
				if($i1 > 0) {
					$sb->add(",");
					if($newLines) {
						$this->newLine($this->depth, $sb);
					}
				}
				$this->encodeImpl($sb, $o);
				unset($o,$i1);
			}
		}
		if($newLines) {
			$this->newLine($myDepth, $sb);
		}
		$sb->add("]");
		$this->depth--;
	}
	public function encodeHash($sb, $h) {
		$newLines = $this->addNewLines && com_wiris_util_json_JSon::getDepth($h) > 2;
		$this->depth++;
		$myDepth = $this->lastDepth;
		$sb->add("{");
		if($newLines) {
			$this->newLine($this->depth, $sb);
		}
		$e = $h->keys();
		$first = true;
		while($e->hasNext()) {
			if($first) {
				$first = false;
			} else {
				$sb->add(",");
				if($newLines) {
					$this->newLine($this->depth, $sb);
				}
			}
			$key = $e->next();
			$this->encodeString($sb, $key);
			$sb->add(":");
			$this->encodeImpl($sb, $h->get($key));
			unset($key);
		}
		if($newLines) {
			$this->newLine($myDepth, $sb);
		}
		$sb->add("}");
		$this->depth--;
	}
	public function encodeImpl($sb, $o) {
		if(com_wiris_system_TypeTools::isHash($o)) {
			$this->encodeHash($sb, $o);
		} else {
			if(com_wiris_system_TypeTools::isArray($o)) {
				$this->encodeArray($sb, $o);
			} else {
				if(Std::is($o, _hx_qtype("String"))) {
					$this->encodeString($sb, $o);
				} else {
					if(Std::is($o, _hx_qtype("Int"))) {
						$this->encodeInteger($sb, $o);
					} else {
						if(Std::is($o, _hx_qtype("haxe.Int64"))) {
							$this->encodeLong($sb, $o);
						} else {
							if(Std::is($o, _hx_qtype("com.wiris.util.json.JSonIntegerFormat"))) {
								$this->encodeIntegerFormat($sb, $o);
							} else {
								if(Std::is($o, _hx_qtype("Bool"))) {
									$this->encodeBoolean($sb, $o);
								} else {
									if(Std::is($o, _hx_qtype("Float"))) {
										$this->encodeFloat($sb, $o);
									} else {
										throw new HException("Impossible to convert to json object of type " . Std::string(Type::getClass($o)));
									}
								}
							}
						}
					}
				}
			}
		}
	}
	public function encodeObject($o) {
		$sb = new StringBuf();
		$this->depth = 0;
		$this->encodeImpl($sb, $o);
		return $sb->b;
	}
	public $lastDepth;
	public $depth;
	public $addNewLines;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static function sb() { $»args = func_get_args(); return call_user_func_array(self::$sb, $»args); }
	static $sb;
	static function encode($o) {
		$js = new com_wiris_util_json_JSon();
		return $js->encodeObject($o);
	}
	static function decode($str) {
		$json = new com_wiris_util_json_JSon();
		return $json->localDecodeString($str);
	}
	static function getDepth($o) {
		if(com_wiris_system_TypeTools::isHash($o)) {
			$h = $o;
			$m = 0;
			if($h->exists("_left_") || $h->exists("_right_")) {
				if($h->exists("_left_")) {
					$m = com_wiris_common_WInteger::max(com_wiris_util_json_JSon::getDepth($h->get("_left_")), $m);
				}
				if($h->exists("_right_")) {
					$m = com_wiris_common_WInteger::max(com_wiris_util_json_JSon::getDepth($h->get("_right_")), $m);
				}
				return $m;
			}
			$iter = $h->keys();
			while($iter->hasNext()) {
				$key = $iter->next();
				$m = com_wiris_common_WInteger::max(com_wiris_util_json_JSon::getDepth($h->get($key)), $m);
				unset($key);
			}
			return $m + 2;
		} else {
			if(com_wiris_system_TypeTools::isArray($o)) {
				$a = $o;
				$i = null;
				$m = 0;
				{
					$_g1 = 0; $_g = $a->length;
					while($_g1 < $_g) {
						$i1 = $_g1++;
						$m = com_wiris_common_WInteger::max(com_wiris_util_json_JSon::getDepth($a[$i1]), $m);
						unset($i1);
					}
				}
				return $m + 1;
			} else {
				return 1;
			}
		}
	}
	static function getString($o) {
		return $o;
	}
	static function getFloat($n) {
		if(Std::is($n, _hx_qtype("Float"))) {
			return $n;
		} else {
			if(Std::is($n, _hx_qtype("Int"))) {
				return $n + 0.0;
			} else {
				return 0.0;
			}
		}
	}
	static function getInt($n) {
		if(Std::is($n, _hx_qtype("Float"))) {
			return Math::round($n);
		} else {
			if(Std::is($n, _hx_qtype("Int"))) {
				return $n;
			} else {
				return 0;
			}
		}
	}
	static function getBoolean($b) {
		return $b;
	}
	static function getArray($a) {
		return $a;
	}
	static function getHash($a) {
		return $a;
	}
	static function compare($a, $b, $eps) {
		if(com_wiris_system_TypeTools::isHash($a)) {
			$isBHash = com_wiris_system_TypeTools::isHash($b);
			if(!$isBHash) {
				return false;
			}
			$ha = $a;
			$hb = $b;
			$it = $ha->keys();
			$itb = $hb->keys();
			while($it->hasNext()) {
				if(!$itb->hasNext()) {
					return false;
				}
				$itb->next();
				$key = $it->next();
				if(!$hb->exists($key) || !com_wiris_util_json_JSon::compare($ha->get($key), $hb->get($key), $eps)) {
					return false;
				}
				unset($key);
			}
			if($itb->hasNext()) {
				return false;
			}
			return true;
		} else {
			if(com_wiris_system_TypeTools::isArray($a)) {
				$isBArray = com_wiris_system_TypeTools::isArray($b);
				if(!$isBArray) {
					return false;
				}
				$aa = $a;
				$ab = $b;
				if($aa->length !== $ab->length) {
					return false;
				}
				$i = null;
				{
					$_g1 = 0; $_g = $aa->length;
					while($_g1 < $_g) {
						$i1 = $_g1++;
						if(!com_wiris_util_json_JSon::compare($aa[$i1], $ab[$i1], $eps)) {
							return false;
						}
						unset($i1);
					}
				}
				return true;
			} else {
				if(Std::is($a, _hx_qtype("String"))) {
					if(!Std::is($b, _hx_qtype("String"))) {
						return false;
					}
					return _hx_equal($a, $b);
				} else {
					if(Std::is($a, _hx_qtype("Int"))) {
						if(!Std::is($b, _hx_qtype("Int"))) {
							return false;
						}
						return _hx_equal($a, $b);
					} else {
						if(Std::is($a, _hx_qtype("haxe.Int64"))) {
							$isBLong = Std::is($b, _hx_qtype("haxe.Int64"));
							if(!$isBLong) {
								return false;
							}
							return _hx_equal($a, $b);
						} else {
							if(Std::is($a, _hx_qtype("com.wiris.util.json.JSonIntegerFormat"))) {
								if(!Std::is($b, _hx_qtype("com.wiris.util.json.JSonIntegerFormat"))) {
									return false;
								}
								$ja = $a;
								$jb = $b;
								return $ja->toString() === $jb->toString();
							} else {
								if(Std::is($a, _hx_qtype("Bool"))) {
									if(!Std::is($b, _hx_qtype("Bool"))) {
										return false;
									}
									return _hx_equal($a, $b);
								} else {
									if(Std::is($a, _hx_qtype("Float"))) {
										if(!Std::is($b, _hx_qtype("Float"))) {
											return false;
										}
										$da = com_wiris_util_json_JSon::getFloat($a);
										$db = com_wiris_util_json_JSon::getFloat($b);
										return $da >= $db - $eps && $da <= $db + $eps;
									}
								}
							}
						}
					}
				}
			}
		}
		return true;
	}
	static function main() {
		$s1 = "{\"displays\":[{\"horizontal_axis_values_position\":\"below\",\"vertical_axis_label\":\"\",\"window_width\":450.,\"horizontal_axis_label\":\"\",\"styles\":[{\"color\":\"#9a0000\",\"ref\":\"line1\"},{\"color\":\"#105b5c\",\"ref\":\"conic1\"},{\"color\":\"#a3b017\",\"fixed\":false,\"ref\":\"point1\"},{\"color\":\"#a3b017\",\"fixed\":false,\"ref\":\"point2\"}],\"window_height\":450.,\"height\":21.,\"id\":\"plotter1\",\"grid_y\":true,\"width\":21.,\"grid_x\":true,\"axis_color\":\"#9696ff\",\"vertical_axis_values_position\":\"left\",\"grid_primary_color\":\"#ffc864\",\"background_color\":\"#fffff0\",\"axis_y\":true,\"axis_x\":true,\"center\":[0.,0.]}],\"elements\":[{\"type\":\"line_segment\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><apply><eq></eq><ci>y</ci><ci>x</ci></apply></math>\",\"coordinates\":[[-31.5,-31.5],[31.5,31.5]],\"id\":\"line1\"},{\"type\":\"path\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><apply><eq></eq><apply><plus></plus><apply><times></times><apply><minus></minus><apply><divide></divide><cn>1</cn><cn>4</cn></apply></apply><apply><power></power><ci>x</ci><cn>2</cn></apply></apply><ci>y</ci><cn>4</cn></apply><cn>0</cn></apply></math>\",\"coordinates\":[[9.795918464660645,19.99000358581543],[9.387755393981934,18.032485961914062],[8.979591369628906,16.158267974853516],[8.571428298950195,14.36734676361084],[8.163265228271484,12.659725189208984],[7.755102157592773,11.035402297973633],[7.346938610076904,9.494377136230469],[6.938775539398193,8.036651611328125],[6.530612468719482,6.662224292755127],[6.122448921203613,5.371095180511475],[5.714285850524902,4.163265228271484],[5.306122303009033,3.038733959197998],[4.897959232330322,1.997501015663147],[4.489795684814453,1.0395668745040894],[4.081632614135742,0.1649312824010849],[3.673469305038452,-0.626405656337738],[3.265306234359741,-1.3344439268112183],[2.857142925262451,-1.959183692932129],[2.448979616165161,-2.500624656677246],[2.040816307067871,-2.9587671756744385],[1.6326531171798706,-3.333611011505127],[1.2244898080825806,-3.6251561641693115],[0.8163265585899353,-3.833402633666992],[0.40816327929496765,-3.958350658416748],[0.,-4.],[-0.40816327929496765,-3.958350658416748],[-0.8163265585899353,-3.833402633666992],[-1.2244898080825806,-3.6251561641693115],[-1.6326531171798706,-3.333611011505127],[-2.040816307067871,-2.9587671756744385],[-2.448979616165161,-2.500624656677246],[-2.857142925262451,-1.959183692932129],[-3.265306234359741,-1.3344439268112183],[-3.673469305038452,-0.626405656337738],[-4.081632614135742,0.1649312824010849],[-4.489795684814453,1.0395668745040894],[-4.897959232330322,1.997501015663147],[-5.306122303009033,3.038733959197998],[-5.714285850524902,4.163265228271484],[-6.122448921203613,5.371095180511475],[-6.530612468719482,6.662224292755127],[-6.938775539398193,8.036651611328125],[-7.346938610076904,9.494377136230469],[-7.755102157592773,11.035402297973633],[-8.163265228271484,12.659725189208984],[-8.571428298950195,14.36734676361084],[-8.979591369628906,16.158267974853516],[-9.387755393981934,18.032485961914062],[-9.795918464660645,19.99000358581543],[-10.204081535339355,22.030820846557617]],\"id\":\"conic1\"},{\"type\":\"point\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><vector><apply><plus></plus><apply><times></times><apply><minus></minus><cn>2</cn></apply><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply><apply><plus></plus><apply><times></times><apply><minus></minus><cn>2</cn></apply><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply></vector></math>\",\"coordinates\":[-2.4721360206604004,-2.4721360206604004],\"id\":\"point1\"},{\"type\":\"point\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><vector><apply><plus></plus><apply><times></times><cn>2</cn><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply><apply><plus></plus><apply><times></times><cn>2</cn><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply></vector></math>\",\"coordinates\":[6.4721360206604,6.4721360206604],\"id\":\"point2\"}],\"constraints\":[]}";
		$s2 = "{\"displays\":[{\"horizontal-axis-values-position\":\"below\",\"vertical-axis-label\":\"\",\"window-width\":450.,\"styles\":[{\"color\":\"#9a0000\",\"ref\":\"line1\"},{\"color\":\"#105b5c\",\"ref\":\"conic1\"},{\"color\":\"#a3b017\",\"fixed\":false,\"ref\":\"point1\"},{\"color\":\"#a3b017\",\"fixed\":false,\"ref\":\"point2\"}],\"background-color\":\"#fffff0\",\"height\":21.,\"id\":\"plotter1\",\"grid-y\":true,\"window-height\":450.,\"grid-x\":true,\"width\":21.,\"horizontal-axis-label\":\"\",\"vertical-axis-values-position\":\"left\",\"grid-primary-color\":\"#ffc864\",\"axis-color\":\"#9696ff\",\"axis-y\":true,\"axis-x\":true,\"center\":[0.,0.]}],\"elements\":[{\"type\":\"line_segment\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><apply><eq></eq><ci>y</ci><ci>x</ci></apply></math>\",\"coordinates\":[[-31.5,-31.5],[31.5,31.5]],\"id\":\"line1\"},{\"type\":\"path\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><apply><eq></eq><apply><plus></plus><apply><times></times><apply><minus></minus><apply><divide></divide><cn>1</cn><cn>4</cn></apply></apply><apply><power></power><ci>x</ci><cn>2</cn></apply></apply><ci>y</ci><cn>4</cn></apply><cn>0</cn></apply></math>\",\"coordinates\":[[9.795918464660645,19.99000358581543],[9.387755393981934,18.032485961914062],[8.979591369628906,16.158267974853516],[8.571428298950195,14.36734676361084],[8.163265228271484,12.659725189208984],[7.755102157592773,11.035402297973633],[7.346938610076904,9.494377136230469],[6.938775539398193,8.036651611328125],[6.530612468719482,6.662224292755127],[6.122448921203613,5.371095180511475],[5.714285850524902,4.163265228271484],[5.306122303009033,3.038733959197998],[4.897959232330322,1.997501015663147],[4.489795684814453,1.0395668745040894],[4.081632614135742,0.1649312824010849],[3.673469305038452,-0.626405656337738],[3.265306234359741,-1.3344439268112183],[2.857142925262451,-1.959183692932129],[2.448979616165161,-2.500624656677246],[2.040816307067871,-2.9587671756744385],[1.6326531171798706,-3.333611011505127],[1.2244898080825806,-3.6251561641693115],[0.8163265585899353,-3.833402633666992],[0.40816327929496765,-3.958350658416748],[0.,-4.],[-0.40816327929496765,-3.958350658416748],[-0.8163265585899353,-3.833402633666992],[-1.2244898080825806,-3.6251561641693115],[-1.6326531171798706,-3.333611011505127],[-2.040816307067871,-2.9587671756744385],[-2.448979616165161,-2.500624656677246],[-2.857142925262451,-1.959183692932129],[-3.265306234359741,-1.3344439268112183],[-3.673469305038452,-0.626405656337738],[-4.081632614135742,0.1649312824010849],[-4.489795684814453,1.0395668745040894],[-4.897959232330322,1.997501015663147],[-5.306122303009033,3.038733959197998],[-5.714285850524902,4.163265228271484],[-6.122448921203613,5.371095180511475],[-6.530612468719482,6.662224292755127],[-6.938775539398193,8.036651611328125],[-7.346938610076904,9.494377136230469],[-7.755102157592773,11.035402297973633],[-8.163265228271484,12.659725189208984],[-8.571428298950195,14.36734676361084],[-8.979591369628906,16.158267974853516],[-9.387755393981934,18.032485961914062],[-9.795918464660645,19.99000358581543],[-10.204081535339355,22.030820846557617]],\"id\":\"conic1\"},{\"type\":\"point\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><vector><apply><plus></plus><apply><times></times><apply><minus></minus><cn>2</cn></apply><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply><apply><plus></plus><apply><times></times><apply><minus></minus><cn>2</cn></apply><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply></vector></math>\",\"coordinates\":[-2.4721360206604004,-2.4721360206604004],\"id\":\"point1\"},{\"type\":\"point\",\"value-content\":\"<math  xmlns=\\\"http://www.w3.org/1998/Math/MathML\\\"><vector><apply><plus></plus><apply><times></times><cn>2</cn><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply><apply><plus></plus><apply><times></times><cn>2</cn><apply><root></root><cn>5</cn></apply></apply><cn>2</cn></apply></vector></math>\",\"coordinates\":[6.4721360206604,6.4721360206604],\"id\":\"point2\"}],\"constraints\":[]}";
		if(com_wiris_util_json_JSon::compare(com_wiris_util_json_JSon::decode($s1), com_wiris_util_json_JSon::decode($s2), 1e-8)) {
			haxe_Log::trace("Equal", _hx_anonymous(array("fileName" => "JSon.hx", "lineNumber" => 521, "className" => "com.wiris.util.json.JSon", "methodName" => "main")));
		} else {
			haxe_Log::trace("Not equal", _hx_anonymous(array("fileName" => "JSon.hx", "lineNumber" => 522, "className" => "com.wiris.util.json.JSon", "methodName" => "main")));
		}
	}
	function __toString() { return 'com.wiris.util.json.JSon'; }
}
function com_wiris_util_json_JSon_0(&$»this, &$floating, &$hex, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_1(&$»this, &$floating, &$hex, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_2(&$»this, &$d, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_3(&$»this, &$code, &$d, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_4(&$»this, &$code, &$d, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_5(&$»this, &$code, &$d, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_6(&$»this, &$code, &$d, &$dec, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($dec);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_7(&$»this, &$d, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
function com_wiris_util_json_JSon_8(&$»this, &$d, &$sb) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($»this->c);
		return $s->toString();
	}
}
