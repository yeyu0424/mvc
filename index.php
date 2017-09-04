<?php
//自动加载类
function __autoload($cname)
{
	$fname = $cname.".php";
	if(file_exists("./Web/Controller/".$fname)){
		require("./Web/Controller/".$fname);
	}elseif(file_exists("./Web/Model/".$fname)){
		require("./Web/Model/".$fname);
	}elseif(file_exists("./Web/Org/".$fname)){
		require("./Web/Org/".$fname);
	}else{
		die("<h2>错误！{$cname}类加载失败！");
	}
}

$pathinfo = explode("/",trim($_SERVER['PATH_INFO']."/"));

$className = ucfirst($pathinfo[1]);
$method = $pathinfo[2];

define("URL",$_SERVER['SCRIPT_NAME']);


$ob = new $className;
$ob->run($method);