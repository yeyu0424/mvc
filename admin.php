<?php
//开启session
session_start();
//自动加载类
function __autoload($cname)
{
	$fname = $cname.".php";
	if(file_exists("./Web/Controller/Admin/".$fname)){
		require("./Web/Controller/Admin/".$fname);
	}elseif(file_exists("./Web/Model/".$fname)){
		require("./Web/Model/".$fname);
	}elseif(file_exists("./Web/Org/".$fname)){
		require("./Web/Org/".$fname);
	}else{
		die("<h2>错误！{$cname}类加载失败！");
	}
}

//导入配置文件  函数库
require("./Web/Common/function.php");
require("./Web/Conf/config.php");

//获取类与方法
$pathinfo = @explode("/",trim($_SERVER['PATH_INFO']."/"));
$className = ucfirst(!empty($pathinfo[1])?$pathinfo[1]:"index");
$method = !empty($pathinfo[2])?$pathinfo[2]:"indexs";

//定义当前URL地址 类名 方法名
define("URL",$_SERVER['SCRIPT_NAME']);
define("_PUBLIC_",dirname($_SERVER['SCRIPT_NAME'])."Public/");
define("CONTROLLER",$className);
define("METHOD",$method);
//实例化并调用
$ob = new $className;
$ob->run($method);