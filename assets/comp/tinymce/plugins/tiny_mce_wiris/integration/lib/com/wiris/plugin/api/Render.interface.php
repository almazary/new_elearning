<?php

interface com_wiris_plugin_api_Render {
	function computeDigest($mml, $param);
	function getMathml($digest);
	function showImage($digest, $mml, $param);
	function createImage($mml, $param, &$output);
}
