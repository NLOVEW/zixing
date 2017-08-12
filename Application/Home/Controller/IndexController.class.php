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
        public function myIndex(){
            if (!session('?userID')) {
                session('userID',null);
                $this->display('/Login/login');
                return;
            }else{
                if(session('position')=='1'){
                    $path='Student/index';
                    $coursePath='Student/course';
                    $resourcePath="Student/resource";
                }elseif (session('position')=='2'){
                    $path='Assistant/index';
                    $coursePath='Assistant/course';
                    $resourcePath="Assistant/resource";
                }elseif (session('position')=='3'){
                    $path='Teacher/index';
                    $coursePath='Teacher/course';
                    $resourcePath="Teacher/resource";
                }elseif (session('position')=='4'){
                    $path='Manager/index';
                    $coursePath='Manager/course';
                    $resourcePath="Manager/resource";
                }
                $this->assign('path',$path);
                $this->assign('coursePath',$coursePath);
                $this->assign('resourcePath',$resourcePath);
                $this->assign('username',session('userName'));
            }
            $this->display();
        }
    }