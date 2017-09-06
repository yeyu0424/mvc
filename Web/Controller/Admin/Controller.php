<?php

class Controller
{
    public function __construct()
    {
        if(CONTROLLER!=="Login" && empty($_SESSION["adminuser"])){
            $url = URL."/Login/logins";
            header("Location:{$url}");
            exit();
        }
    }

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