<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class LoginController extends Controller {

        /*
        * 生成验证码
        */
        public function verify(){
            $config = [
                'fontSize' => 30, // 验证码字体大小
                'length' => 4, // 验证码位数
                'imageH' => 60,
                'useCurve'  => false
            ];
            $Verify = new \Think\Verify($config);
            $Verify->entry();
        }

        public function login(){
            $this->display();
        }

        public function loginCheck()
        {
            $userID = $_POST['userID'];
            $password = $_POST['password'];
            $admin=M('Administrator');
            /*
                  记录登录的管理员
                */
            session("userID", $userID);

            if (!session('?userID')) {
                session('userID',null);
                $this->display('/Login/login');
                return;
            }else{
                /*
             * 验证验证码是否正确
             */
                $verify = new \Think\Verify();
                $code = $_POST['code'];
                if (!$verify->check($code)) {
                    $this->error("验证码错误");
                    return;
                } else {
                    $user=$admin->query('select Ad_name,Ad_password from Administrator where Ad_id=%d',$userID);
                    $userName=$user[0]['ad_name'];
                    $pwd=$user[0]['ad_password'];
                    if(strcmp($password,$pwd)==0){
                        session('userName',$userName);
                        $ipRecord=M('login_record');
                        $ip = get_client_ip();
                        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
                        $area =json_decode(file_get_contents($url));
                        $city = $area->data->region.'---'.$area->data->city;
                        $time=date("Y-m-d H:i:s");
                        $id=session('userID');
                        $ipRecord->execute("insert into login_record(LR_id,LR_name,LR_Time,LR_ip,LR_address) 
                                        VALUES ('$id','$userName','$time','$ip','$city')");
                        $this->redirect('Admin/index', '', 0, '页面跳转中...');
                    }else{
                        $this->redirect('Login/login', '', 3, '密码错误请重新登录，正在跳转...');
                    }
                }
            }
        }

    }