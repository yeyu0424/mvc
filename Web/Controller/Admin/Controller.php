<?php

class Controller
{
	public function run($method)
	{
		if(method_exists($this,$method)){
			$this->$method();
		}else{
			die("<h2>你调用的{$method}方法不存在！</h2>");
		}
	}
	
	public function display($tpl)
	{
		$cname = get_class($this);
		require("./Web/View/Admin/{$cname}/".$tpl.".html");
	}
}