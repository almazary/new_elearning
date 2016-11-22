<?php

interface com_wiris_plugin_api_Render {
	function computeDigest($mml, $param);
	function getMathml($digest);
	function showImageJson($digest, $lang);
	function showImage($digest, $mml, $provider);
	function createImage($mml, $param, &$output);
}
