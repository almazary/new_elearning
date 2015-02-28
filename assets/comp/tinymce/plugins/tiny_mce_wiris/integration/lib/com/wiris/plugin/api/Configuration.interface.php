<?php

interface com_wiris_plugin_api_Configuration {
	function setInitObject($context);
	function setProperty($name, $value);
	function getProperty($name, $dflt);
	function getJavaScriptConfiguration();
	function getFullConfigurationAsJson();
	function getFullConfiguration();
}
