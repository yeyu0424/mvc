<?php

class Users extends Controller
{
    public function indexs()
    {
        $mod= new Model("users");
        $this->list = $mod->select();
        //var_dump($this->list);
        $this->display("index");

    }

    public function add()
    {
        $this->display("add");
    }

    public function insert()
    {
        $mod = new Model("users");
        $_POST['pass'] = md5($_POST['pass']);
        $_POST['addtime'] = time();
        $m = $mod->insert();
        if($m>0){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }

    public function del()
    {
        $mod = new Model("users");
        $m = $mod->del($_GET['id']);
        header("Location:".URL."/users/indexs");
    }

    public function edit()
    {
        $this->display("edit");
    }
}