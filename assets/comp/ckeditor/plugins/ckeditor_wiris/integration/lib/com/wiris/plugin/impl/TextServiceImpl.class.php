<?php

class com_wiris_plugin_impl_TextServiceImpl implements com_wiris_plugin_api_TextService{
	public function __construct($plugin) {
		if(!php_Boot::$skip_constructor) {
		$this->plugin = $plugin;
	}}
	public function filter($str, $prop) {
		return _hx_deref(new com_wiris_plugin_impl_TextFilter($this->plugin))->filter($str, $prop);
	}
	public function getMathML($digest, $latex) {
		if($digest !== null) {
			$content = $this->plugin->getStorageAndCache()->decodeDigest($digest);
			if($content !== null) {
				if(StringTools::startsWith($content, "<")) {
					$breakline = null;
					$breakline = _hx_index_of($content, "\x0A", 0);
					return _hx_substr($content, 0, $breakline);
				} else {
					$iniFile = com_wiris_util_sys_IniFile::newIniFileFromString($content);
					$mathml = $iniFile->getProperties()->get("mml");
					if($mathml !== null) {
						return $mathml;
					} else {
						return "Error: mathml not found.";
					}
				}
			} else {
				return "Error: formula not found.";
			}
		} else {
			if($latex !== null) {
				return $this->latex2mathml($latex);
			} else {
				return "Error: no digest or latex has been sent.";
			}
		}
	}
	public function latex2mathml($latex) {
		$param = array();;
		$param["latex"] = $latex;
		$provider = $this->plugin->newGenericParamsProvider($param);
		return $this->service("latex2mathml", $provider);
	}
	public function mathml2latex($mml) {
		$param = array();;
		$param["mml"] = $mml;
		$provider = $this->plugin->newGenericParamsProvider($param);
		return $this->service("mathml2latex", $provider);
	}
	public function mathml2accessible($mml, $lang, $param) {
		if($lang !== null) {
			$param["lang"] = $lang;
		}
		$param["mml"] = $mml;
		$provider = $this->plugin->newGenericParamsProvider($param);
		return $this->service("mathml2accessible", $provider);
	}
	public function service($serviceName, $provider) {
		$digest = null;
		$renderParams = $provider->getRenderParameters($this->plugin->getConfiguration());
		if(com_wiris_plugin_impl_TextServiceImpl::hasCache($serviceName)) {
			$digest = $this->plugin->newRender()->computeDigest(null, $renderParams);
			$store = $this->plugin->getStorageAndCache();
			$ext = com_wiris_plugin_impl_TextServiceImpl::getDigestExtension($serviceName, $provider);
			$s = $store->retreiveData($digest, $ext);
			if($s !== null) {
				return com_wiris_system_Utf8::fromBytes($s);
			}
		}
		$url = $this->plugin->getImageServiceURL($serviceName, com_wiris_plugin_impl_TextServiceImpl::hasStats($serviceName));
		$h = new com_wiris_plugin_impl_HttpImpl($url, null);
		$this->plugin->addReferer($h);
		$this->plugin->addProxy($h);
		$ha = com_wiris_system_PropertiesTools::fromProperties($provider->getServiceParameters());
		$iter = $ha->keys();
		while($iter->hasNext()) {
			$k = $iter->next();
			$h->setParameter($k, $ha->get($k));
			unset($k);
		}
		$h->request(true);
		$r = $h->getData();
		if($digest !== null) {
			$store = $this->plugin->getStorageAndCache();
			$ext = com_wiris_plugin_impl_TextServiceImpl::getDigestExtension($serviceName, $provider);
			$store->storeData($digest, $ext, com_wiris_system_Utf8::toBytes($r));
		}
		return $r;
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
	static function hasCache($serviceName) {
		if($serviceName === "mathml2accessible") {
			return true;
		}
		return false;
	}
	static function hasStats($serviceName) {
		if($serviceName === "latex2mathml") {
			return true;
		}
		return false;
	}
	static function getDigestExtension($serviceName, $provider) {
		$lang = $provider->getParameter("lang", "en");
		if($lang !== null && strlen($lang) === 0) {
			return "en";
		}
		return $lang;
	}
	function __toString() { return 'com.wiris.plugin.impl.TextServiceImpl'; }
}
