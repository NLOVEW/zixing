<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class AdminController extends Controller{

        public function index(){
            if (!session('?userID')) {
                session('userID',null);
                $this->display('/Login/login');
                return;
            }else{
                $this->assign('username',session('userName'));
            }
            $this->display();
        }
        public function welcome(){
            $this->display();
        }
    }