<?php

class com_wiris_plugin_impl_ImageFormatControllerSvg implements com_wiris_plugin_api_ImageFormatController{
	public function __construct() { 
	}
	public function getMetrics($bytes, &$output) {
		$svg = $bytes->toString();
		$output = $output;
		$svgXml = com_wiris_util_xml_WXmlUtils::parseXML($svg);
		$width = $svgXml->firstElement()->get("width");
		$height = $svgXml->firstElement()->get("height");
		$baseline = $svgXml->firstElement()->get("wrs:baseline");
		$r = null;
		if($output !== null) {
			$output["width"] = "" . $width;
			$output["height"] = "" . $height;
			$output["baseline"] = "" . $baseline;
			$r = "";
		} else {
			$r = "&cw=" . $width . "&ch=" . $height . "&cb=" . $baseline;
		}
		return $r;
	}
	public function getContentType() {
		return "image/svg+xml";
	}
	function __toString() { return 'com.wiris.plugin.impl.ImageFormatControllerSvg'; }
}
