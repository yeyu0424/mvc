<?php

require("./web/Controller/User.php");
require("./web/Controller/Type.php");

$pathinfo = explode("/",trim($_SERVER['PATH_INFO']."/"));

$className = ucfirst($pathinfo[1]);
$method = $pathinfo[2];

$ob = new $className;
$ob->$method();