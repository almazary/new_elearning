<?php

class com_wiris_plugin_api_PluginBuilder {
	public function __construct() { 
	}
	public function addCorsHeaders($response, $origin) {
	}
	public function newEditor() {
		return null;
	}
	public function newCas() {
		return null;
	}
	public function newTest() {
		return null;
	}
	public function setStorageAndCacheInitObject($obj) {
	}
	public function getStorageAndCache() {
		return null;
	}
	public function getConfiguration() {
		return null;
	}
	public function newAsyncTextService() {
		return null;
	}
	public function newTextService() {
		return null;
	}
	public function newAsyncRender() {
		return null;
	}
	public function newRender() {
		return null;
	}
	public function setStorageAndCache($store) {
	}
	public function addConfigurationUpdater($conf) {
	}
	static function getInstance() {
		return new com_wiris_plugin_impl_PluginBuilderImpl();
	}
	function __toString() { return 'com.wiris.plugin.api.PluginBuilder'; }
}
