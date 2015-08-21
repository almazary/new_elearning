<?php

class com_wiris_plugin_impl_PluginBuilderImpl extends com_wiris_plugin_api_PluginBuilder {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
		$this->updaterChain = new _hx_array(array());
		$this->updaterChain->push(new com_wiris_plugin_impl_DefaultConfigurationUpdater());
		$ci = new com_wiris_plugin_impl_ConfigurationImpl();
		$this->configuration = $ci;
		$ci->setPluginBuilderImpl($this);
	}}
	public function addCorsHeaders($response, $origin) {
		$conf = $this->getConfiguration();
		if($conf->getProperty("wiriscorsenabled", "false") === "true") {
			$confDir = $conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$CONFIGURATION_PATH, null);
			$corsConfFile = $confDir . "/corsservers.ini";
			$s = com_wiris_system_Storage::newStorage($corsConfFile);
			if($s->exists()) {
				$dir = $s->read();
				$allowedHosts = _hx_explode("\x0A", $dir);
				if(com_wiris_system_ArrayEx::contains($allowedHosts, $origin)) {
					$response->setHeader("Access-Control-Allow-Origin", $origin);
				}
			} else {
				$response->setHeader("Access-Control-Allow-Origin", "*");
			}
		}
	}
	public function addReferer($h) {
		$conf = $this->getConfiguration();
		$h->setHeader("Referer", $conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$REFERER, ""));
	}
	public function addProxy($h) {
		$conf = $this->getConfiguration();
		$proxyEnabled = $conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$HTTPPROXY, "false");
		if($proxyEnabled === "true") {
			$host = $conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$HTTPPROXY_HOST, null);
			$port = Std::parseInt($conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$HTTPPROXY_PORT, "80"));
			if($host !== null && strlen($host) > 0) {
				$user = $conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$HTTPPROXY_USER, null);
				$pass = $conf->getProperty(com_wiris_plugin_api_ConfigurationKeys::$HTTPPROXY_PASS, null);
				$h->setProxy(com_wiris_std_system_HttpProxy::newHttpProxy($host, $port, $user, $pass));
			}
		}
	}
	public function getImageServiceURL($service) {
		$protocol = null;
		$port = null;
		$url = null;
		$config = $this->getConfiguration();
		$protocol = $config->getProperty(com_wiris_plugin_api_ConfigurationKeys::$SERVICE_PROTOCOL, null);
		$port = $config->getProperty(com_wiris_plugin_api_ConfigurationKeys::$SERVICE_PORT, null);
		$url = $config->getProperty(com_wiris_plugin_api_ConfigurationKeys::$INTEGRATION_PATH, null);
		if($protocol === null && $url !== null) {
			if(StringTools::startsWith($url, "https")) {
				$protocol = "https";
			}
		}
		if($protocol === null) {
			$protocol = "http";
		}
		if($port !== null) {
			if($protocol === "http") {
				if(!($port === "80")) {
					$port = ":" . $port;
				} else {
					$port = "";
				}
			}
			if($protocol === "https") {
				if(!($port === "443")) {
					$port = ":" . $port;
				} else {
					$port = "";
				}
			}
		} else {
			$port = "";
		}
		$domain = $config->getProperty(com_wiris_plugin_api_ConfigurationKeys::$SERVICE_HOST, null);
		$path = $config->getProperty(com_wiris_plugin_api_ConfigurationKeys::$SERVICE_PATH, null);
		if($service !== null) {
			$end = _hx_last_index_of($path, "/", null);
			if($end === -1) {
				$path = $service;
			} else {
				$path = _hx_substr($path, 0, $end) . "/" . $service;
			}
		}
		return $protocol . "://" . $domain . $port . $path;
	}
	public function setStorageAndCacheInitObject($obj) {
		$this->storageAndCacheInitObject = $obj;
	}
	public function getConfigurationUpdaterChain() {
		return $this->updaterChain;
	}
	public function initialize($sac, $conf) {
		$sac->init($this->storageAndCacheInitObject, $conf);
	}
	public function getStorageAndCache() {
		if($this->store === null) {
			$className = $this->configuration->getProperty(com_wiris_plugin_api_ConfigurationKeys::$STORAGE_CLASS, null);
			if($className === null || $className === "FolderTreeStorageAndCache") {
				$this->store = new com_wiris_plugin_impl_FolderTreeStorageAndCache();
			} else {
				if($className === "FileStorageAndCache") {
					$this->store = new com_wiris_plugin_impl_FileStorageAndCache();
				} else {
					$cls = Type::resolveClass($className);
					if($cls === null) {
						throw new HException("Class " . $className . " not found.");
					}
					$this->store = Type::createInstance($cls, new _hx_array(array()));
					if($this->store === null) {
						throw new HException("Instance from " . Std::string($cls) . " cannot be created.");
					}
				}
			}
			$this->initialize($this->store, $this->configuration->getFullConfiguration());
		}
		return $this->store;
	}
	public function getConfiguration() {
		return $this->configuration;
	}
	public function newAsyncTextService() {
		return new com_wiris_plugin_asyncimpl_AsyncTextServiceImpl($this);
	}
	public function newTextService() {
		return new com_wiris_plugin_impl_TextServiceImpl($this);
	}
	public function newCas() {
		return new com_wiris_plugin_impl_CasImpl($this);
	}
	public function newEditor() {
		return new com_wiris_plugin_impl_EditorImpl($this);
	}
	public function newTest() {
		return new com_wiris_plugin_impl_TestImpl($this);
	}
	public function newAsyncRender() {
		return new com_wiris_plugin_asyncimpl_AsyncRenderImpl($this);
	}
	public function newRender() {
		return new com_wiris_plugin_impl_RenderImpl($this);
	}
	public function setStorageAndCache($store) {
		$this->store = $store;
	}
	public function addConfigurationUpdater($conf) {
		$this->updaterChain->push($conf);
	}
	public $storageAndCacheInitObject;
	public $updaterChain;
	public $store;
	public $configuration;
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
	function __toString() { return 'com.wiris.plugin.impl.PluginBuilderImpl'; }
}
