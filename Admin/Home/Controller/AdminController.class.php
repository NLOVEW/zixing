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
                $admin=M('Administrator');
                $userID = session('userID');
                $userName=session('userName');
                $user=$admin->query("select * from Administrator WHERE Ad_name='$userName'");
                if($userID==$user[0]['ad_id']){
                    $this->assign('username',session('userName'));
                    $this->display();
                }else{
                    $this->display('/Login/login');
                }
            }
        }

        public function welcome(){
            $this->display();
        }
    }