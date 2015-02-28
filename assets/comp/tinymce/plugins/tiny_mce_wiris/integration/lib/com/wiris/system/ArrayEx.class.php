<?php

class com_wiris_system_ArrayEx {
	public function __construct(){}
	static function contains($a, $b) {
		{
			$_g = 0;
			while($_g < $a->length) {
				$x = $a[$_g];
				++$_g;
				if($x == $b) {
					return true;
				}
				unset($x);
			}
		}
		return false;
	}
	function __toString() { return 'com.wiris.system.ArrayEx'; }
}
