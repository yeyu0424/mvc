<?php

class Login extends Controller
{
    public function logins()
    {
        $this->display("login");
    }

    public function doLogin()
    {
        if($_POST['mycode']!==$_SESSION['code']){
            $this->errorinfo = "验证码错误！";
            $this->display("login");
            return;
        }

        $mod = new Model('users');
        $pass = md5($_POST['pass']);
        $sql = "select * from users where username='{$_POST['username']}' and pass='{$pass}'";
        $list = $mod->query($sql);
        if(count($list)>0){
            $_SESSIION['adminuser'] = $list[0];
            $url = URL."/index/indexs";
            header("Location:{$url}");
        }else{
            $this->errorinfo = "登录账号或密码错误";
            $this->display("login");
        }
    }

    public function logout()
    {
        unset($_SESSION['adminuser']);
        $this->display("login");
    }

    public function verify()
    {
        $verify = new Verify();
        $verify->ttf = './Public/msyh.ttf';
        $verify->length = 4;
        $verify->type = 1;
        $verify->entry();
    }
}