<?php

class User extends Controller
{
	public function index()
	{
		$this->display("index");
	}

	public function add()
	{
		$this->display("add");
	}
}