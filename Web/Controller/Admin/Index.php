<?php

class Index extends Controller
{
	public function indexs()
	{
		echo "<h2>网站后台</h2><br/>";
		$url = dirName(URL)."index.php";
		echo "<a href='{$url}'>网站前台</a>";
	}
}