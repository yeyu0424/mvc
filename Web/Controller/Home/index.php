<?php

class Index extends Controller
{
	public function indexs()
	{
		echo "<h2>自定义框架前台</h2><br/>";

		$url = dirName(URL)."admin.php";
		echo "<a href='{$url}'>网站后台</a>";
	}
}