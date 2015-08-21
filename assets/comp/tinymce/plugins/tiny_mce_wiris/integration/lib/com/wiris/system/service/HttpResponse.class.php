<?php

class com_wiris_system_service_HttpResponse {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->headers = new Hash();
	}}
	public function getHeader($name) {
		return $this->headers->get($name);
	}
	public function close() {
		flush();
	}
	public function writeString($s) {
		echo($s);
	}
	public function writeBinary($data) {
		$this->writeString($data->toString());
	}
	public function sendError($num, $message) {
		php_Web::setReturnCode($num);
		$this->writeString($message);
		$this->close();
	}
	public function setHeader($name, $value) {
		$this->headers->set($name, $value);
		header($name . ": " . $value);
	}
	public $headers;
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
	function __toString() { return 'com.wiris.system.service.HttpResponse'; }
}
