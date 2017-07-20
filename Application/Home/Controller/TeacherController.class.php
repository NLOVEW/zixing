<?php

    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");

    class TeacherController extends Controller{
        function index(){
            $this->assign("username",session('username'));
            $this->display();
        }

//         欢迎页面
        function welcome(){
            $this->display();
        }

//         个人信息页面
        function change_message(){
            $this->assign("username","luck_nhb");
            $this->assign("tel_phone",13592589109);
            $this->display();
        }


//        修改密码
        function change_password(){
            $this->display();
        }

//        完成密码修改
        function complete_passwordChange(){
            $this->redirect('Teacher/welcome','信息添加成功',3,
                "<span style='color: red;font-size: 18px'>密码修改成功</span>");
        }

//        统计登录情况
        function total_login(){
            //从数据库获取登录数据显示到前台

            $this->display();
        }

//        退出页面
        function back(){
            session(null);
        }
    }
