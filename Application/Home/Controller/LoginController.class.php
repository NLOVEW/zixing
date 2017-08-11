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
            'imageH' =>55,
            'useCurve'  => false
        ];
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function login(){
        $this->display();
    }

    public function loginCheck(){
        $userID = $_POST['userId'];
        $password = $_POST['password'];
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
                $student=M('student');
                $teacher=M('teacher');
                $assistant=M('assistant');
                $course_manager=M('course_manager');
                $studentData=$student->query("select * from student WHERE s_no='$userID'");
                if($studentData!=null){
                    $userName=$studentData[0]['s_name'];
                    $pwd=$studentData[0]['s_password'];
                    session('position','1');
                }else{
                    $teacherData=$teacher->query("select * from teacher WHERE t_phone='$userID'");
                    if($teacherData!=null){
                        $userName=$teacherData[0]['t_name'];
                        $pwd=$teacherData[0]['t_password'];
                        session('position','3');
                    }else{
                        $assistantData=$assistant->query("select * from assistant WHERE as_phone='$userID'");
                        if($assistantData!=null){
                            $userName=$assistantData[0]['as_name'];
                            $pwd=$assistantData[0]['as_password'];
                            session('position','2');
                        }else{
                            $course_managerData=$course_manager->query("select * from course_manager WHERE cm_phone='$userID'");
                            if($course_managerData!=null) {
                                $userName = $course_managerData[0]['cm_name'];
                                $pwd=$course_managerData[0]['cm_password'];
                                session('position','4');
                            }else{
                                $this->redirect('Login/login', '', 3, '无此用户请核实用户，正在跳转...');
                            }
                        }
                    }
                }
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
                    $this->redirect('Index/myIndex', '', 0, '页面跳转中...');
                }else{
                    $this->redirect('Login/login', '', 3, '密码错误请重新登录，正在跳转...');
                }
            }
        }
    }

}