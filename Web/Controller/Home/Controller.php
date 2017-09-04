<?php

class Controller
{
	//加载方法
	public function run($method)
	{
		if(method_exists($this,$method)){
			$this->$method();
		}else{
			die("<h2>你调用的{$method}方法不存在！</h2>");
		}
	}
	//加载模板
	public function display($tpl)
	{
		$cname = CONTROLLER;
		require("./Web/View/Home/{$cname}/".$tpl.".html");
	}
}