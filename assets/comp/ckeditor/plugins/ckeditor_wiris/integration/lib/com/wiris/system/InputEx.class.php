<?php

class com_wiris_system_InputEx {
	public function __construct(){}
	static function readInt32_($a) {
		$ch1 = $a->readByte();
		$ch2 = $a->readByte();
		$ch3 = $a->readByte();
		$ch4 = $a->readByte();
		return ($ch1 << 8 | $ch2) << 16 | ($ch3 << 8 | $ch4);
	}
	function __toString() { return 'com.wiris.system.InputEx'; }
}
