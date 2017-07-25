<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class AdminController extends Controller{
        public function index(){
            $username=$_POST['username'];
            $passwprd=$_POST['password'];
            /*
             * 验证验证码是否正确
             */
            if (!empty($_POST)) {
                $verify = new \Think\Verify();
                $code = $_POST['code'];
                if(!$verify->check($code))
                {
                    $this->error("验证码错误");
                    return;
                }else{
                    /*
                     * 记录登录的管理员
                     */
                    session("username",$username);
                    $this->assign('username',$username);
                }
            }
            $this->display();
        }
        public function welcome(){
            $this->display();
        }
    }