<?php

class com_wiris_plugin_impl_RenderImpl implements com_wiris_plugin_api_Render{
	public function __construct($plugin) {
		if(!php_Boot::$skip_constructor) {
		$this->plugin = $plugin;
	}}
	public function safeMath2Accessible($mml, $lang, $param) {
		try {
			$text = $this->plugin->newTextService()->mathml2accessible($mml, $lang, $param);
			return $text;
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$ex = $_ex_;
			{
				return "";
			}
		}
	}
	public function getMetricsFromBytes($bs, &$output) {
		$output = $output;
		$width = 0;
		$height = 0;
		$dpi = 0;
		$baseline = 0;
		$bys = haxe_io_Bytes::ofData($bs);
		$bi = new haxe_io_BytesInput($bys, null, null);
		$n = $bys->length;
		$alloc = 10;
		$b = haxe_io_Bytes::alloc($alloc);
		$bi->readBytes($b, 0, 8);
		$n -= 8;
		while($n > 0) {
			$len = com_wiris_system_InputEx::readInt32_($bi);
			$typ = com_wiris_system_InputEx::readInt32_($bi);
			if($typ === 1229472850) {
				$width = com_wiris_system_InputEx::readInt32_($bi);
				$height = com_wiris_system_InputEx::readInt32_($bi);
				com_wiris_system_InputEx::readInt32_($bi);
				$bi->readByte();
			} else {
				if($typ === 1650545477) {
					$baseline = com_wiris_system_InputEx::readInt32_($bi);
				} else {
					if($typ === 1883789683) {
						$dpi = com_wiris_system_InputEx::readInt32_($bi);
						$dpi = Math::round($dpi / 39.37);
						com_wiris_system_InputEx::readInt32_($bi);
						$bi->readByte();
					} else {
						if($len > $alloc) {
							$alloc = $len;
							$b = haxe_io_Bytes::alloc($alloc);
						}
						$bi->readBytes($b, 0, $len);
					}
				}
			}
			com_wiris_system_InputEx::readInt32_($bi);
			$n -= $len + 12;
			unset($typ,$len);
		}
		$r = null;
		if($output !== null) {
			$output["width"] = "" . _hx_string_rec($width, "");
			$output["height"] = "" . _hx_string_rec($height, "");
			$output["baseline"] = "" . _hx_string_rec($baseline, "");
			if($dpi !== 96) {
				$output["dpi"] = "" . _hx_string_rec($dpi, "");
			}
			$r = "";
		} else {
			$r = "&cw=" . _hx_string_rec($width, "") . "&ch=" . _hx_string_rec($height, "") . "&cb=" . _hx_string_rec($baseline, "");
			if($dpi !== 96) {
				$r = $r . "&dpi=" . _hx_string_rec($dpi, "");
			}
		}
		return $r;
	}
	public function getMetrics($digest, &$output) {
		$output = $output;
		$bs = null;
		try {
			$bs = $this->showImage($digest, null, null);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				return "";
			}
		}
		return $this->getMetricsFromBytes($bs, $output);
	}
	public function getEditorParametersList() {
		$pl = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$EDITOR_PARAMETERS_LIST, com_wiris_plugin_api_ConfigurationKeys::$EDITOR_PARAMETERS_DEFAULT_LIST);
		return _hx_explode(",", $pl);
	}
	public function getMathml($digest) {
		return null;
	}
	public function showImage($digest, $mml, $param) {
		if($digest === null && $mml === null) {
			throw new HException("Missing parameters 'formula' or 'mml'.");
		}
		if($digest !== null && $mml !== null) {
			throw new HException("Only one parameter 'formula' or 'mml' is valid.");
		}
		$atts = false;
		if($digest === null && $mml !== null) {
			$digest = $this->computeDigest($mml, $param);
		}
		$formula = $this->plugin->getStorageAndCache()->decodeDigest($digest);
		if($formula === null) {
			throw new HException("Formula associated to digest not found.");
		}
		if(StringTools::startsWith($formula, "<")) {
			throw new HException("Not implemented.");
		}
		$iniFile = com_wiris_util_sys_IniFile::newIniFileFromString($formula);
		$renderParams = $iniFile->getProperties();
		$i = null;
		$ss = $this->getEditorParametersList();
		if($param !== null) {
			$_g1 = 0; $_g = $ss->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$key = $ss[$i1];
				$value = com_wiris_system_PropertiesTools::getProperty($param, $key, null);
				if($value !== null) {
					$atts = true;
					$renderParams->set($key, $value);
				}
				unset($value,$key,$i1);
			}
		}
		if($atts) {
			if($mml !== null) {
				$digest = $this->computeDigest($mml, com_wiris_system_PropertiesTools::toProperties($renderParams));
			} else {
				$digest = $this->computeDigest($renderParams->get("mml"), com_wiris_system_PropertiesTools::toProperties($renderParams));
			}
		}
		$store = $this->plugin->getStorageAndCache();
		$bs = null;
		$bs = $store->retreiveData($digest, "png");
		if($bs === null) {
			{
				$_g1 = 0; $_g = $ss->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$key = $ss[$i1];
					if(!$renderParams->exists($key)) {
						$confKey = com_wiris_plugin_api_ConfigurationKeys::$imageConfigProperties->get($key);
						if($confKey !== null) {
							$value = $this->plugin->getConfiguration()->getProperty($confKey, null);
							if($value !== null) {
								$renderParams->set($key, $value);
							}
							unset($value);
						}
						unset($confKey);
					}
					unset($key,$i1);
				}
			}
			$h = new com_wiris_plugin_impl_HttpImpl($this->plugin->getImageServiceURL(null), null);
			$this->plugin->addReferer($h);
			$this->plugin->addProxy($h);
			$iter = $renderParams->keys();
			while($iter->hasNext()) {
				$key = $iter->next();
				$h->setParameter($key, $renderParams->get($key));
				unset($key);
			}
			$h->request(true);
			$b = haxe_io_Bytes::ofString($h->getData());
			$store->storeData($digest, "png", $b->b);
			$bs = $b->b;
		}
		return $bs;
	}
	public function createImage($mml, $param, &$output) {
		$output = $output;
		if($mml === null) {
			throw new HException("Missing parameter 'mml'.");
		}
		$digest = $this->computeDigest($mml, $param);
		$contextPath = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$CONTEXT_PATH, "/");
		$showImagePath = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$SHOWIMAGE_PATH, null);
		$s = "";
		if($param !== null && com_wiris_system_PropertiesTools::getProperty($param, "metrics", "false") === "true") {
			$s = $this->getMetrics($digest, $output);
		}
		$a = "";
		if($param !== null && com_wiris_system_PropertiesTools::getProperty($param, "accessible", "false") === "true") {
			$lang = com_wiris_system_PropertiesTools::getProperty($param, "lang", "en");
			$text = $this->safeMath2Accessible($mml, $lang, $param);
			if($output === null) {
				$a = "&text=" . rawurlencode($text);
			} else {
				$output["alt"] = $text;
			}
		}
		$rparam = "";
		if($param !== null && com_wiris_system_PropertiesTools::getProperty($param, "refererquery", null) !== null) {
			$refererquery = com_wiris_system_PropertiesTools::getProperty($param, "refererquery", null);
			$rparam = "&refererquery=" . $refererquery;
		}
		return com_wiris_plugin_impl_RenderImpl::concatPath($contextPath, $showImagePath) . rawurlencode($digest) . $s . $a . $rparam;
	}
	public function computeDigest($mml, $param) {
		$ss = $this->getEditorParametersList();
		$i = null;
		$renderParams = new Hash();
		{
			$_g1 = 0; $_g = $ss->length;
			while($_g1 < $_g) {
				$i1 = $_g1++;
				$key = $ss[$i1];
				$value = com_wiris_system_PropertiesTools::getProperty($param, $key, null);
				if($value !== null) {
					$renderParams->set($key, $value);
				}
				unset($value,$key,$i1);
			}
		}
		if($mml !== null) {
			$renderParams->set("mml", $mml);
		}
		$s = com_wiris_util_sys_IniFile::propertiesToString($renderParams);
		return $this->plugin->getStorageAndCache()->codeDigest($s);
	}
	public $plugin;
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
	static function concatPath($s1, $s2) {
		if(_hx_last_index_of($s1, "/", null) === strlen($s1) - 1) {
			return $s1 . $s2;
		} else {
			return $s1 . "/" . $s2;
		}
	}
	function __toString() { return 'com.wiris.plugin.impl.RenderImpl'; }
}
