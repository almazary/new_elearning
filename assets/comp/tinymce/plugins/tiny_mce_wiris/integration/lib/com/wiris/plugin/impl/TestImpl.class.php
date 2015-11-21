<?php

class com_wiris_plugin_impl_TestImpl implements com_wiris_plugin_api_Test{
	public function __construct($plugin) {
		if(!php_Boot::$skip_constructor) {
		$this->plugin = $plugin;
	}}
	public function createTableRow($testName, $reportText, $solutionLink, $condition) {
		$output = "";
		$output .= "<tr>";
		$output .= "<td>" . $testName . "</td>";
		$output .= "<td>" . $reportText . "</td>";
		$output .= "<td>";
		if($condition) {
			$output .= "<span class=\"ok\">OK</span><br/>";
		} else {
			$output .= "<span class=\"error\">ERROR</span><br/>";
		}
		$output .= "</td>";
		$output .= "</tr>\x0D\x0A";
		return $output;
	}
	public function getTestPage() {
		$random = "" . _hx_string_rec(Math::floor(Math::random() * 9999), "");
		$mml = "<math xmlns=\"http://www.w3.org/1998/Math/MathML\"><mrow><msqrt><mn>" . $random . "</mn></msqrt></mrow></math>";
		$testName = null; $reportText = null; $solutionLink = null;
		$condition = null;
		$output = "";
		$output .= "<html><head>\x0D\x0A";
		$output .= "<title>WIRIS plugin test page</title><meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\" /><style type=\"text/css\">/*<!--*/html {font-family: sans-serif;}h2 {margin-left: 1em;}h3 {margin-left: 2em;}p {margin-left: 3em;}p.concrete {margin-left: 4em;}.ok {font-weight: bold;color: #0c0;}.error {font-weight: bold;color: #f00;}/*-->*/</style><style type=\"text/css\">body{font-family: Arial;}span{font-weight: bold;}span.ok {color: #009900;}span.error {color: #dd0000;}table, th, td, tr {border: solid 1px #000000;border-collapse:collapse;padding: 5px;}th{background-color: #eeeeee;}img{border:none;}</style>\x0D\x0A";
		$output .= "<script src=\"../core/WIRISplugins.js?viewer=image\" ></script>\x0D\x0A";
		$output .= "</head><body><h1>WIRIS plugin test page</h1>\x0D\x0A";
		$output .= "<table><tr><th>Test</th><th>Report</th><th>Status</th></tr>\x0D\x0A";
		$testName = "WIRIS plugin version";
		try {
			$s = com_wiris_system_Storage::newResourceStorage("VERSION")->read();
			$reportText = "<b>" . $s . "</b>";
			$solutionLink = "";
			$condition = true;
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$ex = $_ex_;
			{
				$reportText = "Missing version";
				$solutionLink = "";
				$condition = false;
			}
		}
		$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		$testName = "Creating and storing data";
		$solutionLink = "";
		$param = array();;
		$outp = array();;
		$imageUrl = $this->plugin->newRender()->createImage($mml, $param, $outp);
		$reportText = "<a href=\"" . $imageUrl . "\" />" . $imageUrl . "</a>";
		$condition = true;
		$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		$testName = "Retrieving data";
		$solutionLink = "";
		$reportText = "<img src=\"" . $imageUrl . "\" />";
		$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		$testName = "JavaScript MathML filter";
		$solutionLink = "";
		$reportText = $mml;
		$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		$testName = "Host platform";
		$solutionLink = "";
		$platform = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$HOST_PLATFORM, "failed");
		$reportText = $platform;
		$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		$testName = "Filter test";
		$solutionLink = "";
		$condition = true;
		$p = null;
		$p = array();;
		$p["savemode"] = "safeXml";
		$s2 = str_replace("<", com_wiris_plugin_impl_TestImpl_0($this, $condition, $ex, $imageUrl, $mml, $outp, $output, $p, $param, $platform, $random, $reportText, $solutionLink, $testName), $mml);
		$s2 = str_replace(">", com_wiris_plugin_impl_TestImpl_1($this, $condition, $ex, $imageUrl, $mml, $outp, $output, $p, $param, $platform, $random, $reportText, $s2, $solutionLink, $testName), $s2);
		$s2 = str_replace("\"", com_wiris_plugin_impl_TestImpl_2($this, $condition, $ex, $imageUrl, $mml, $outp, $output, $p, $param, $platform, $random, $reportText, $s2, $solutionLink, $testName), $s2);
		$reportText = $this->plugin->newTextService()->filter("square root: " . $s2, $p);
		$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		$debug = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$DEBUG, "false") === "true";
		if($debug) {
			$testName = "Font family";
			$solutionLink = "";
			$condition = true;
			$reportText = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$FONT_FAMILY, "");
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "Configuration file";
			$solutionLink = "";
			$condition = true;
			$reportText = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$CONFIGURATION_PATH, "") . "\\configuration.ini";
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "Cache path";
			$solutionLink = "";
			$condition = true;
			$reportText = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$CACHE_FOLDER, "");
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "Formula path";
			$solutionLink = "";
			$condition = true;
			$reportText = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$FORMULA_FOLDER, "");
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "Integration path";
			$solutionLink = "";
			$condition = true;
			$reportText = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$INTEGRATION_PATH, "");
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "Context path";
			$solutionLink = "";
			$condition = true;
			$reportText = $this->plugin->getConfiguration()->getProperty(com_wiris_plugin_api_ConfigurationKeys::$CONTEXT_PATH, "");
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "default-configuration.ini load";
			$solutionLink = "";
			$defaultConfiguration = com_wiris_system_Storage::newResourceStorage("default-configuration.ini")->read();
			$condition = $defaultConfiguration !== null && strlen($defaultConfiguration) > 0;
			if($condition) {
				$reportText = "Length: " . _hx_string_rec(strlen($defaultConfiguration), "");
			} else {
				$reportText = "Not found!";
			}
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
			$testName = "cas.png load";
			$solutionLink = "";
			$casPng = com_wiris_system_Storage::newResourceStorage("cas.png")->readBinary();
			$casPngLength = 0;
			if($casPng !== null) {
				$casPngLength = haxe_io_Bytes::ofData($casPng)->length;
				$condition = $casPngLength > 0;
			} else {
				$condition = false;
			}
			if($condition) {
				$reportText = "Length: " . _hx_string_rec($casPngLength, "");
			} else {
				$reportText = "Not found!";
			}
			$output .= $this->createTableRow($testName, $reportText, $solutionLink, $condition);
		}
		$output .= "<div id=\"haxe:trace\"></div>";
		return $output;
	}
	public $plugin;
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
	function __toString() { return 'com.wiris.plugin.impl.TestImpl'; }
}
function com_wiris_plugin_impl_TestImpl_0(&$»this, &$condition, &$ex, &$imageUrl, &$mml, &$outp, &$output, &$p, &$param, &$platform, &$random, &$reportText, &$solutionLink, &$testName) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(171);
		return $s->toString();
	}
}
function com_wiris_plugin_impl_TestImpl_1(&$»this, &$condition, &$ex, &$imageUrl, &$mml, &$outp, &$output, &$p, &$param, &$platform, &$random, &$reportText, &$s2, &$solutionLink, &$testName) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(187);
		return $s->toString();
	}
}
function com_wiris_plugin_impl_TestImpl_2(&$»this, &$condition, &$ex, &$imageUrl, &$mml, &$outp, &$output, &$p, &$param, &$platform, &$random, &$reportText, &$s2, &$solutionLink, &$testName) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar(168);
		return $s->toString();
	}
}
