<?php

interface com_wiris_plugin_api_ImageFormatController {
	function getMetrics($bytes, &$output);
	function getContentType();
}
