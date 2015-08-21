<?php

class com_wiris_system_TypeTools {
	public function __construct(){}
	static function floatToString($value) {
		return "" . _hx_string_rec($value, "");
	}
	static function isFloating($str) {
		$pattern = new EReg("^(\\d|\\d\\.|\\.\\d)", "");
		return $pattern->match($str);
	}
	static function isInteger($str) {
		$pattern = new EReg("^(\\d)", "");
		return $pattern->match($str);
	}
	static function isIdentifierPart($c) {
		$letterPattern = new EReg("[a-z]", "i");
		$numberPattern = new EReg("[0-9]", "");
		$str = chr($c);
		return $letterPattern->match($str) || $numberPattern->match($str) || $str === "_";
	}
	static function isIdentifierStart($c) {
		$letterPattern = new EReg("[a-z]", "i");
		$str = chr($c);
		return $letterPattern->match($str) || $str === "_";
	}
	static function isArray($o) {
		return Std::is($o, _hx_qtype("Array"));
	}
	static function isHash($o) {
		return Std::is($o, _hx_qtype("Hash"));
	}
	static function string2ByteData_iso8859_1($str) {
		return haxe_io_Bytes::ofString($str);
	}
	function __toString() { return 'com.wiris.system.TypeTools'; }
}
