<?php

class com_wiris_util_sys_Store {
	public function __construct() {
		;
	}
	public function moveTo($dest) {
		rename($this->file, $dest->file);
	}
	public function copyTo($dest) {
		$b = $this->readBinary();
		$dest->writeBinary($b);
	}
	public function getParent() {
		$parent = com_wiris_util_sys_Store_0($this);
		if($parent === null) {
			$parent = $this->file;
		}
		$i = com_wiris_common_WInteger::max(_hx_last_index_of($parent, "/", null), _hx_last_index_of($parent, "\\", null));
		if($i < 0) {
			return com_wiris_util_sys_Store::newStore(".");
		}
		$parent = _hx_substr($parent, 0, $i);
		return com_wiris_util_sys_Store::newStore($parent);
	}
	public function exists() {
		return file_exists($this->file);
	}
	public function getFile() {
		return $this->file;
	}
	public function read() {
		return sys_io_File::getContent($this->file);
	}
	public function append($str) {
		$output = sys_io_File::append($this->file, true);
		$output->writeString($str);
		$output->flush();
		$output->close();
	}
	public function readBinary() {
		return sys_io_File::getBytes($this->file);
	}
	public function writeBinary($bs) {
		sys_io_File::saveBytes($this->file, $bs);
	}
	public function write($str) {
		sys_io_File::saveContent($this->file, $str);
	}
	public function mkdirs() {
		$parent = $this->getParent();
		if(!$parent->exists()) {
			$parent->mkdirs();
		}
		if(!$this->exists()) {
			@mkdir($this->file, 493);
		}
	}
	public function hlist() {
		return sys_FileSystem::readDirectory($this->file);
	}
	public $file;
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
	static function newStore($folder) {
		$s = new com_wiris_util_sys_Store();
		$s->file = $folder;
		return $s;
	}
	static function newStoreWithParent($store, $str) {
		return com_wiris_util_sys_Store::newStore($store->getFile() . "/" . $str);
	}
	static function getCurrentPath() {
		return com_wiris_util_sys_Store_1();
	}
	function __toString() { return 'com.wiris.util.sys.Store'; }
}
function com_wiris_util_sys_Store_0(&$»this) {
	{
		$p = realpath($»this->file);
		if(($p === false)) {
			return null;
		} else {
			return $p;
		}
		unset($p);
	}
}
function com_wiris_util_sys_Store_1() {
	{
		$p = realpath(".");
		if(($p === false)) {
			return null;
		} else {
			return $p;
		}
		unset($p);
	}
}
