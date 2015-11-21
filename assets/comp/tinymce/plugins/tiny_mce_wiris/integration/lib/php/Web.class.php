<?php

class php_Web {
	public function __construct(){}
	static function getParams() {
		$a = array_merge($_GET, $_POST);
		if(get_magic_quotes_gpc()) {
			reset($a); while(list($k, $v) = each($a)) $a[$k] = stripslashes((string)$v);
		}
		return php_Lib::hashOfAssociativeArray($a);
	}
	static function getParamValues($param) {
		$reg = new EReg("^" . $param . "(\\[|%5B)([0-9]*?)(\\]|%5D)=(.*?)\$", "");
		$res = new _hx_array(array());
		$explore = array(new _hx_lambda(array(&$param, &$reg, &$res), "php_Web_0"), 'execute');
		call_user_func_array($explore, array(str_replace(";", "&", php_Web::getParamsString())));
		call_user_func_array($explore, array(php_Web::getPostData()));
		if($res->length === 0) {
			$post = php_Lib::hashOfAssociativeArray($_POST);
			$data = $post->get($param);
			$k = 0; $v = "";
			if(is_array($data)) {
				 reset($data); while(list($k, $v) = each($data)) { 
				$res[$k] = $v;
				 } 
			}
		}
		if($res->length === 0) {
			return null;
		}
		return $res;
	}
	static function getHostName() {
		return $_SERVER['SERVER_NAME'];
	}
	static function getClientIP() {
		return $_SERVER['REMOTE_ADDR'];
	}
	static function getURI() {
		$s = $_SERVER['REQUEST_URI'];
		return _hx_array_get(_hx_explode("?", $s), 0);
	}
	static function redirect($url) {
		header("Location: " . $url);
	}
	static function setHeader($h, $v) {
		header($h . ": " . $v);
	}
	static function setReturnCode($r) {
		$code = null;
		switch($r) {
		case 100:{
			$code = "100 Continue";
		}break;
		case 101:{
			$code = "101 Switching Protocols";
		}break;
		case 200:{
			$code = "200 Continue";
		}break;
		case 201:{
			$code = "201 Created";
		}break;
		case 202:{
			$code = "202 Accepted";
		}break;
		case 203:{
			$code = "203 Non-Authoritative Information";
		}break;
		case 204:{
			$code = "204 No Content";
		}break;
		case 205:{
			$code = "205 Reset Content";
		}break;
		case 206:{
			$code = "206 Partial Content";
		}break;
		case 300:{
			$code = "300 Multiple Choices";
		}break;
		case 301:{
			$code = "301 Moved Permanently";
		}break;
		case 302:{
			$code = "302 Found";
		}break;
		case 303:{
			$code = "303 See Other";
		}break;
		case 304:{
			$code = "304 Not Modified";
		}break;
		case 305:{
			$code = "305 Use Proxy";
		}break;
		case 307:{
			$code = "307 Temporary Redirect";
		}break;
		case 400:{
			$code = "400 Bad Request";
		}break;
		case 401:{
			$code = "401 Unauthorized";
		}break;
		case 402:{
			$code = "402 Payment Required";
		}break;
		case 403:{
			$code = "403 Forbidden";
		}break;
		case 404:{
			$code = "404 Not Found";
		}break;
		case 405:{
			$code = "405 Method Not Allowed";
		}break;
		case 406:{
			$code = "406 Not Acceptable";
		}break;
		case 407:{
			$code = "407 Proxy Authentication Required";
		}break;
		case 408:{
			$code = "408 Request Timeout";
		}break;
		case 409:{
			$code = "409 Conflict";
		}break;
		case 410:{
			$code = "410 Gone";
		}break;
		case 411:{
			$code = "411 Length Required";
		}break;
		case 412:{
			$code = "412 Precondition Failed";
		}break;
		case 413:{
			$code = "413 Request Entity Too Large";
		}break;
		case 414:{
			$code = "414 Request-URI Too Long";
		}break;
		case 415:{
			$code = "415 Unsupported Media Type";
		}break;
		case 416:{
			$code = "416 Requested Range Not Satisfiable";
		}break;
		case 417:{
			$code = "417 Expectation Failed";
		}break;
		case 500:{
			$code = "500 Internal Server Error";
		}break;
		case 501:{
			$code = "501 Not Implemented";
		}break;
		case 502:{
			$code = "502 Bad Gateway";
		}break;
		case 503:{
			$code = "503 Service Unavailable";
		}break;
		case 504:{
			$code = "504 Gateway Timeout";
		}break;
		case 505:{
			$code = "505 HTTP Version Not Supported";
		}break;
		default:{
			$code = Std::string($r);
		}break;
		}
		header("HTTP/1.1 " . $code, true, $r);
	}
	static function getClientHeader($k) {
		$k1 = str_replace("-", "_", strtoupper($k));
		if(null == php_Web::getClientHeaders()) throw new HException('null iterable');
		$»it = php_Web::getClientHeaders()->iterator();
		while($»it->hasNext()) {
			$i = $»it->next();
			if($i->header === $k1) {
				return $i->value;
			}
		}
		return null;
	}
	static $_client_headers;
	static function getClientHeaders() {
		if(php_Web::$_client_headers === null) {
			php_Web::$_client_headers = new HList();
			$h = php_Lib::hashOfAssociativeArray($_SERVER);
			if(null == $h) throw new HException('null iterable');
			$»it = $h->keys();
			while($»it->hasNext()) {
				$k = $»it->next();
				if(_hx_substr($k, 0, 5) === "HTTP_") {
					php_Web::$_client_headers->add(_hx_anonymous(array("header" => _hx_substr($k, 5, null), "value" => $h->get($k))));
				}
			}
		}
		return php_Web::$_client_headers;
	}
	static function getParamsString() {
		if(isset($_SERVER["QUERY_STRING"])) {
			return $_SERVER["QUERY_STRING"];
		} else {
			return "";
		}
	}
	static function getPostData() {
		$h = fopen("php://input", "r");
		$bsize = 8192;
		$max = 32;
		$data = null;
		$counter = 0;
		while(!(feof($h) && $counter < $max)) {
			$data .= fread($h, $bsize);
			$counter++;
		}
		fclose($h);
		return $data;
	}
	static function getCookies() {
		return php_Lib::hashOfAssociativeArray($_COOKIE);
	}
	static function setCookie($key, $value, $expire = null, $domain = null, $path = null, $secure = null) {
		$t = (($expire === null) ? 0 : intval($expire->getTime() / 1000.0));
		if($path === null) {
			$path = "/";
		}
		if($domain === null) {
			$domain = "";
		}
		if($secure === null) {
			$secure = false;
		}
		setcookie($key, $value, $t, $path, $domain, $secure);
	}
	static function addPair($name, $value) {
		if($value === null) {
			return "";
		}
		return "; " . $name . $value;
	}
	static function getAuthorization() {
		if(!isset($_SERVER['PHP_AUTH_USER'])) {
			return null;
		}
		return _hx_anonymous(array("user" => $_SERVER['PHP_AUTH_USER'], "pass" => $_SERVER['PHP_AUTH_PW']));
	}
	static function getCwd() {
		return dirname($_SERVER["SCRIPT_FILENAME"]) . "/";
	}
	static function getMultipart($maxSize) {
		$h = new Hash();
		$buf = null;
		$curname = null;
		php_Web::parseMultipart(array(new _hx_lambda(array(&$buf, &$curname, &$h, &$maxSize), "php_Web_1"), 'execute'), array(new _hx_lambda(array(&$buf, &$curname, &$h, &$maxSize), "php_Web_2"), 'execute'));
		if($curname !== null) {
			$h->set($curname, $buf->b);
		}
		return $h;
	}
	static function parseMultipart($onPart, $onData) {
		$a = $_POST;
		if(get_magic_quotes_gpc()) {
			reset($a); while(list($k, $v) = each($a)) $a[$k] = stripslashes((string)$v);
		}
		$post = php_Lib::hashOfAssociativeArray($a);
		if(null == $post) throw new HException('null iterable');
		$»it = $post->keys();
		while($»it->hasNext()) {
			$key = $»it->next();
			call_user_func_array($onPart, array($key, ""));
			$v = $post->get($key);
			call_user_func_array($onData, array(haxe_io_Bytes::ofString($v), 0, strlen($v)));
			unset($v);
		}
		if(!isset($_FILES)) {
			return;
		}
		$parts = new _hx_array(array_keys($_FILES));
		{
			$_g = 0;
			while($_g < $parts->length) {
				$part = $parts[$_g];
				++$_g;
				$info = $_FILES[$part];
				$tmp = $info["tmp_name"];
				$file = $info["name"];
				$err = $info["error"];
				if($err > 0) {
					switch($err) {
					case 1:{
						throw new HException("The uploaded file exceeds the max size of " . ini_get("upload_max_filesize"));
					}break;
					case 2:{
						throw new HException("The uploaded file exceeds the max file size directive specified in the HTML form (max is" . (ini_get("post_max_size") . ")"));
					}break;
					case 3:{
						throw new HException("The uploaded file was only partially uploaded");
					}break;
					case 4:{
						continue 2;
					}break;
					case 6:{
						throw new HException("Missing a temporary folder");
					}break;
					case 7:{
						throw new HException("Failed to write file to disk");
					}break;
					case 8:{
						throw new HException("File upload stopped by extension");
					}break;
					}
				}
				call_user_func_array($onPart, array($part, $file));
				if("" !== $file) {
					$h = fopen($tmp, "r");
					$bsize = 8192;
					while(!feof($h)) {
						$buf = fread($h, $bsize);
						$size = strlen($buf);
						call_user_func_array($onData, array(haxe_io_Bytes::ofString($buf), 0, $size));
						unset($size,$buf);
					}
					fclose($h);
					unset($h,$bsize);
				}
				unset($tmp,$part,$info,$file,$err);
			}
		}
	}
	static function flush() {
		flush();
	}
	static function getMethod() {
		if(isset($_SERVER['REQUEST_METHOD'])) {
			return $_SERVER['REQUEST_METHOD'];
		} else {
			return null;
		}
	}
	static $isModNeko;
	function __toString() { return 'php.Web'; }
}
php_Web::$isModNeko = !php_Lib::isCli();
function php_Web_0(&$param, &$reg, &$res, $data) {
	{
		if($data === null || strlen($data) === 0) {
			return;
		}
		{
			$_g = 0; $_g1 = _hx_explode("&", $data);
			while($_g < $_g1->length) {
				$part = $_g1[$_g];
				++$_g;
				if($reg->match($part)) {
					$idx = $reg->matched(2);
					$val = urldecode($reg->matched(4));
					if($idx === "") {
						$res->push($val);
					} else {
						$res[Std::parseInt($idx)] = $val;
					}
					unset($val,$idx);
				}
				unset($part);
			}
		}
	}
}
function php_Web_1(&$buf, &$curname, &$h, &$maxSize, $p, $_) {
	{
		if($curname !== null) {
			$h->set($curname, $buf->b);
		}
		$curname = $p;
		$buf = new StringBuf();
		$maxSize -= strlen($p);
		if($maxSize < 0) {
			throw new HException("Maximum size reached");
		}
	}
}
function php_Web_2(&$buf, &$curname, &$h, &$maxSize, $str, $pos, $len) {
	{
		$maxSize -= $len;
		if($maxSize < 0) {
			throw new HException("Maximum size reached");
		}
		$buf->b .= _hx_substr($str->toString(), $pos, $len);
	}
}
