<?php

class com_wiris_plugin_impl_ConfigurationImpl implements com_wiris_plugin_api_Configuration{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->props = array();;
	}}
	public function setConfigurations($configurationKeys, $configurationValues) {
		$configurationKeysArray = _hx_explode(",", $configurationKeys);
		$configurationValuesArray = _hx_explode(",", $configurationValues);
		$keysIterator = $configurationKeysArray->iterator();
		$valuesIterator = $configurationValuesArray->iterator();
		while($keysIterator->hasNext() && $valuesIterator->hasNext()) {
			$key = $keysIterator->next();
			$value = $valuesIterator->next();
			if($this->getProperty($key, null) !== null) {
				$this->setProperty($key, $value);
			}
			unset($value,$key);
		}
	}
	public function getJsonConfiguration($configurationKeys) {
		$configurationKeysArray = _hx_explode(",", $configurationKeys);
		$iterator = $configurationKeysArray->iterator();
		$jsonOutput = new Hash();
		$jsonVariables = new Hash();
		$thereIsNullValue = false;
		while($iterator->hasNext()) {
			$key = $iterator->next();
			$value = $this->getProperty($key, "null");
			if($value === "null") {
				$thereIsNullValue = true;
			}
			$jsonVariables->set($key, $value);
			unset($value,$key);
		}
		if(!$thereIsNullValue) {
			$jsonOutput->set("status", "ok");
		} else {
			$jsonOutput->set("status", "warning");
		}
		$jsonOutput->set("result", $jsonVariables);
		return com_wiris_util_json_JSon::encode($jsonOutput);
	}
	public function getJavaScriptConfiguration() {
		$sb = new StringBuf();
		$arrayParse = "[]";
		$this->appendVarJs($sb, "_wrs_conf_editorEnabled", $this->getProperty("wiriseditorenabled", null), "Specifies if fomula editor is enabled");
		$this->appendVarJs($sb, "_wrs_conf_imageMathmlAttribute", "'" . $this->getProperty("wiriseditormathmlattribute", null) . "'", "Specifies the image tag where we should save the formula editor mathml code");
		$this->appendVarJs($sb, "_wrs_conf_saveMode", "'" . $this->getProperty("wiriseditorsavemode", null) . "'", "This value can be 'xml', 'safeXml', 'image' or 'base64'");
		$this->appendVarJs($sb, "_wrs_conf_editMode", "'" . $this->getProperty("wiriseditoreditmode", null) . "'", "This value can be 'default' or 'image'");
		if($this->getProperty("wiriseditorparselatex", null) === "true") {
			$arrayParse = $this->appendElement2JavascriptArray($arrayParse, "latex");
		}
		if($this->getProperty("wiriseditorparsexml", null) === "true") {
			$arrayParse = $this->appendElement2JavascriptArray($arrayParse, "xml");
		}
		$this->appendVarJs($sb, "_wrs_conf_parseModes", $arrayParse, "This value can contain 'latex' and 'xml)");
		$this->appendVarJs($sb, "_wrs_conf_editorAttributes", "'" . $this->getProperty("wiriseditorwindowattributes", null) . "'", "Specifies formula editor window options");
		$this->appendVarJs($sb, "_wrs_conf_editorUrl", "'" . $this->plugin->getImageServiceURL("editor", false) . "'", "WIRIS editor");
		$this->appendVarJs($sb, "_wrs_conf_modalWindow", $this->getProperty("wiriseditormodalwindow", null), "Editor modal window");
		$this->appendVarJs($sb, "_wrs_conf_CASEnabled", $this->getProperty("wiriscasenabled", null), "Specifies if WIRIS cas is enabled");
		$this->appendVarJs($sb, "_wrs_conf_CASMathmlAttribute", "'" . $this->getProperty("wiriscasmathmlattribute", null) . "'", "Specifies the image tag where we should save the WIRIS cas mathml code");
		$this->appendVarJs($sb, "_wrs_conf_CASAttributes", "'" . $this->getProperty("wiriscaswindowattributes", null) . "'", "Specifies WIRIS cas window options");
		$this->appendVarJs($sb, "_wrs_conf_hostPlatform", "'" . $this->getProperty("wirishostplatform", null) . "'", "Specifies host platform");
		$this->appendVarJs($sb, "_wrs_conf_versionPlatform", "'" . $this->getProperty("wirisversionplatform", "unknown") . "'", "Specifies host version platform");
		$this->appendVarJs($sb, "_wrs_conf_enableAccessibility", $this->getProperty("wirisaccessibilityenabled", null), "Specifies whether accessibility is enabled");
		$this->appendVarJs($sb, "_wrs_conf_setSize", $this->getProperty("wiriseditorsetsize", null), "Specifies whether to set the size of the images at edition time");
		$this->appendVarJs($sb, "_wrs_conf_editorToolbar", "'" . $this->getProperty(com_wiris_plugin_api_ConfigurationKeys::$EDITOR_TOOLBAR, null) . "'", "Toolbar definition");
		$this->appendVarJs($sb, "_wrs_conf_chemEnabled", $this->getProperty("wirischemeditorenabled", null), "Specifies if WIRIS chem editor is enabled");
		$this->appendVarJs($sb, "_wrs_conf_imageFormat", "'" . $this->getProperty("wirisimageformat", "png") . "'", "WIRIS Plugin image format");
		if($this->getProperty(com_wiris_plugin_api_ConfigurationKeys::$EDITOR_PARAMS, null) !== null) {
			$this->appendVarJs($sb, "_wrs_conf_editorParameters", $this->getProperty(com_wiris_plugin_api_ConfigurationKeys::$EDITOR_PARAMS, null), "Editor parameters");
		} else {
			$h = com_wiris_plugin_api_ConfigurationKeys::$imageConfigPropertiesInv;
			$attributes = new StringBuf();
			$confVal = "";
			$i = 0;
			$it = $h->keys();
			$value = null;
			while($it->hasNext()) {
				$value = $it->next();
				if($this->getProperty($value, null) !== null) {
					if($i !== 0) {
						$attributes->add(",");
					}
					$i++;
					$confVal = $this->getProperty($value, null);
					str_replace("-", "_", $confVal);
					str_replace("-", "_", $confVal);
					$attributes->add("'");
					$attributes->add(com_wiris_plugin_api_ConfigurationKeys::$imageConfigPropertiesInv->get($value));
					$attributes->add("' : '");
					$attributes->add($confVal);
					$attributes->add("'");
				}
			}
			$this->appendVarJs($sb, "_wrs_conf_editorParameters", "{" . $attributes->b . "}", "Editor parameters");
		}
		$this->appendVarJs($sb, "_wrs_conf_wirisPluginPerformance", $this->getProperty("wirispluginperformance", null), "Experimental settings to improve performance");
		$sb->add("var _wrs_conf_configuration_loaded = true;\x0D\x0A");
		$sb->add("if (typeof _wrs_conf_core_loaded != 'undefined') _wrs_conf_plugin_loaded = true;\x0D\x0A");
		$version = null;
		try {
			$version = com_wiris_system_Storage::newResourceStorage("VERSION")->read();
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$ex = $_ex_;
			{
				$version = "Missing version";
			}
		}
		$sb->add("var _wrs_conf_version = '" . $version . "';\x0D\x0A");
		return $sb->b;
	}
	public function appendElement2JavascriptArray($array, $value) {
		$arrayOpen = _hx_index_of($array, "[", null);
		$arrayClose = _hx_index_of($array, "]", null);
		if($arrayOpen === -1 || $arrayClose === -1) {
			throw new HException("Array not valid");
		}
		return "[" . "'" . $value . "'" . (com_wiris_plugin_impl_ConfigurationImpl_0($this, $array, $arrayClose, $arrayOpen, $value));
	}
	public function appendVarJs($sb, $varName, $value, $comment) {
		$sb->add("var ");
		$sb->add($varName);
		$sb->add(" = ");
		$sb->add($value);
		$sb->add("; // ");
		$sb->add($comment);
		$sb->add("\x0D\x0A");
	}
	public function setPluginBuilderImpl($plugin) {
		$this->plugin = $plugin;
	}
	public function initialize($cu) {
		$cu->init($this->initObject);
	}
	public function initialize0() {
		if($this->initialized) {
			return;
		}
		$this->initialized = true;
		$this->plugin->addConfigurationUpdater(new com_wiris_plugin_impl_FileConfigurationUpdater());
		$this->plugin->addConfigurationUpdater(new com_wiris_plugin_impl_CustomConfigurationUpdater($this));
		$a = $this->plugin->getConfigurationUpdaterChain();
		$iter = $a->iterator();
		while($iter->hasNext()) {
			$cu = $iter->next();
			$this->initialize($cu);
			$cu->updateConfiguration($this->props);
			unset($cu);
		}
	}
	public function setInitObject($context) {
		$this->initObject = $context;
	}
	public function setProperty($key, $value) {
		$this->props[$key] = $value;
	}
	public function getProperty($key, $dflt) {
		$this->initialize0();
		return com_wiris_system_PropertiesTools::getProperty($this->props, $key, $dflt);
	}
	public function getFullConfigurationAsJson() {
		$this->initialize0();
		return null;
	}
	public function getFullConfiguration() {
		$this->initialize0();
		return $this->props;
	}
	public $initialized;
	public $props;
	public $initObject;
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
	function __toString() { return 'com.wiris.plugin.impl.ConfigurationImpl'; }
}
function com_wiris_plugin_impl_ConfigurationImpl_0(&$»this, &$array, &$arrayClose, &$arrayOpen, &$value) {
	if(strlen($array) === 2) {
		return "]";
	} else {
		return "," . _hx_substr($array, $arrayOpen + 1, $arrayClose - $arrayOpen);
	}
}
