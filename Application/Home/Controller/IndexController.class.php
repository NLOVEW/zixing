<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class IndexController extends Controller {

        /*
         * 首页面
         */
        public function index(){
            session(null);
            $this->display();
        }

        /*
         * 登陆后的界面
         */
        public function index2(){
            if(session('?username')){
                $this->assign("username",session('username'));
            }
            /*
             * 验证验证码是否正确
             */
            if (!empty($_POST)) {
                $verify = new \Think\Verify();
                $code = $_POST['code'];
                if(!$verify->check($code)){
                    $this->error("验证码错误");
                    return;
                }else{
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                        /*
                         * 记录登录的账号
                         */
                    session('username',$username);
                    $this->assign("username",session('username'));
                }
            }
            /*
             * 需要判断属于哪个个人中心   学生，助教，讲师，课程负责人
             */
            $this->display();
        }
    }