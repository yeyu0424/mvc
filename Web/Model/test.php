<?php
define("DSN","mysql:host=localhost;dbname=test;charset=utf8");
define("USER","root");
define("PASS","");

require("./Model.php");

$mod = new Model("stu");

echo "<pre>";
var_dump($mod);