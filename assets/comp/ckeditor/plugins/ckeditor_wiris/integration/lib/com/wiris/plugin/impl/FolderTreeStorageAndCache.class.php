<?php

class com_wiris_plugin_impl_FolderTreeStorageAndCache implements com_wiris_plugin_storage_StorageAndCache{
	public function __construct() {
		;
	}
	public function deleteCache() {
		$formulaFolder = $this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$FORMULA_FOLDER);
		$cacheFolder = $this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$CACHE_FOLDER);
		$includes = new _hx_array(array());
		$includes->push("png");
		$includes->push("csv");
		$includes->push("txt");
		if(!(com_wiris_system_PropertiesTools::getProperty($this->config, com_wiris_plugin_api_ConfigurationKeys::$SAVE_MODE, "xml") === "image")) {
			$includes->push("ini");
		}
		com_wiris_util_sys_Store::deleteDirectory($formulaFolder, $includes);
		com_wiris_util_sys_Store::deleteDirectory($cacheFolder, $includes);
	}
	public function isFormulaFileName($name) {
		$i = _hx_index_of($name, ".", null);
		if($i === -1) {
			return null;
		}
		$digest = _hx_substr($name, 0, $i);
		if(strlen($digest) !== 32) {
			return null;
		}
		return $digest;
	}
	public function updateFolderStructure($dir) {
		$folder = com_wiris_util_sys_Store::newStore($dir);
		$files = $folder->hlist();
		if($files !== null) {
			$i = null;
			{
				$_g1 = 0; $_g = $files->length;
				while($_g1 < $_g) {
					$i1 = $_g1++;
					$digest = $this->isFormulaFileName($files[$i1]);
					if($digest !== null) {
						$newFolder = $this->getFolderStore($dir, $digest);
						$newFolder->mkdirs();
						$newFile = $this->getFileStoreWithParent($newFolder, $digest, _hx_substr($files[$i1], _hx_index_of($files[$i1], ".", null) + 1, null));
						$file = com_wiris_util_sys_Store::newStoreWithParent($folder, $files[$i1]);
						$file->moveTo($newFile);
						unset($newFolder,$newFile,$file);
					}
					unset($i1,$digest);
				}
			}
		}
	}
	public function updateFoldersStructure() {
		$this->updateFolderStructure($this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$CACHE_FOLDER));
		$this->updateFolderStructure($this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$FORMULA_FOLDER));
	}
	public function getFileStore($dir, $digest, $extension) {
		return $this->getFileStoreWithParent($this->getFolderStore($dir, $digest), $digest, $extension);
	}
	public function getFileStoreWithParent($parent, $digest, $extension) {
		return com_wiris_util_sys_Store::newStoreWithParent($parent, _hx_substr($digest, 4, null) . "." . $extension);
	}
	public function getFolderStore($dir, $digest) {
		return com_wiris_util_sys_Store::newStore($dir . "/" . _hx_substr($digest, 0, 2) . "/" . _hx_substr($digest, 2, 2));
	}
	public function getExtension($service) {
		if($service === "png") {
			return "png";
		}
		if($service === "svg") {
			return "svg";
		}
		return $service . ".txt";
	}
	public function getAndCheckFolder($key) {
		$folder = com_wiris_system_PropertiesTools::getProperty($this->config, $key, null);
		if($folder === null || strlen(trim($folder)) === 0) {
			throw new HException("Missing configuration value: " . $key);
		}
		return $folder;
	}
	public function storeData($digest, $service, $stream) {
		$formula = $this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$CACHE_FOLDER);
		$parent = $this->getFolderStore($formula, $digest);
		$parent->mkdirs();
		$store = $this->getFileStoreWithParent($parent, $digest, $this->getExtension($service));
		$store->writeBinary(haxe_io_Bytes::ofData($stream));
	}
	public function retreiveData($digest, $service) {
		$formula = $this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$CACHE_FOLDER);
		$store = $this->getFileStore($formula, $digest, $this->getExtension($service));
		if(com_wiris_plugin_impl_FolderTreeStorageAndCache::$backwards_compat) {
			if(!$store->exists()) {
				$oldstore = com_wiris_util_sys_Store::newStore($formula . "/" . $digest . "." . $this->getExtension($service));
				if(!$oldstore->exists()) {
					return null;
				}
				$parent = $store->getParent();
				$parent->mkdirs();
				$oldstore->moveTo($store);
			}
		} else {
			if(!$store->exists()) {
				return null;
			}
		}
		return $store->readBinary()->b;
	}
	public function decodeDigest($digest) {
		$formula = $this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$FORMULA_FOLDER);
		$store = $this->getFileStore($formula, $digest, "ini");
		if(com_wiris_plugin_impl_FolderTreeStorageAndCache::$backwards_compat) {
			if(!$store->exists()) {
				$oldstore = com_wiris_util_sys_Store::newStore($formula . "/" . $digest . ".ini");
				$parent = $store->getParent();
				$parent->mkdirs();
				$oldstore->moveTo($store);
			}
		}
		return $store->read();
	}
	public function codeDigest($content) {
		$digest = com_wiris_system_Md5Tools::encodeString($content);
		$parent = $this->getFolderStore($this->getAndCheckFolder(com_wiris_plugin_api_ConfigurationKeys::$FORMULA_FOLDER), $digest);
		$parent->mkdirs();
		$store = $this->getFileStoreWithParent($parent, $digest, "ini");
		$store->write($content);
		return $digest;
	}
	public function init($obj, $config) {
		$this->config = $config;
	}
	public $config;
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
	static $backwards_compat = true;
	function __toString() { return 'com.wiris.plugin.impl.FolderTreeStorageAndCache'; }
}
