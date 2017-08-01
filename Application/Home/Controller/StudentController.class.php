<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class StudentController extends Controller{
        function index(){
            $this->assign("username",session('username'));
            $this->display();
        }

//         欢迎页面
        function welcome(){
            $this->display();
        }

//         个人信息页面
        function personal(){
            $this->display();
        }

//        完成密码修改
        function completeChange(){

        }

//        统计登录情况
        function loginTotal(){
            //从数据库获取登录数据显示到前台

            $this->display();
        }

        //资源浏览
        function lookResource(){
            $this->display();
        }

//        退出页面
        function back(){
            session(null);
        }
    }