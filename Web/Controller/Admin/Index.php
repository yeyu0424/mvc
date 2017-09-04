<?php

class Index extends Controller
{
	public function indexs()
	{
		$this->display("index");
	}

	public function top()
	{
		$this->display("top");
	}

	public function menu()
	{
		$this->display("menu");
	}

	public function main()
	{
		$this->display("main");
	}


}