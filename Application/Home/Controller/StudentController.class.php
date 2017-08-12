<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class StudentController extends Controller{
        function index(){
            if (!session('?userID')) {
                session('userID',null);
                $this->display('/Login/login');
                return;
            }else {
                $student = M('student');
                $userID = session('userID');
                $userName=session('userName');
                $user = $student->query("select * from student WHERE s_name='$userName'");
                if ($userID == $user[0]['s_no']) {
                    $this->assign('username', session('userName'));
                    $this->display();
                } else {
                    $this->redirect('/Login/login','','30',var_dump($user));
                }
            }
        }

//         欢迎页面
        function welcome(){
            $this->display();
        }

//         个人信息页面
        function personal(){
            $userID=session('userID');
            $assistant=M('student');
            $data=$assistant->query("select * from student WHERE s_no='$userID'");
            $this->assign('data',$data);
            $this->display();
        }

        function completeChange(){
            $user=M('student');
            $id=session('userID');
            $data=$user->query("select * from student where s_no='$id'");
            $pwd=$data[0]['s_password'];
            $oldPwd=$_POST['oldPwd'];
            $newPwd=$_POST['newPwd'];
            if($pwd==$oldPwd){
                $user->execute("update student set s_password='$newPwd' WHERE s_no='$id'");
                $this->redirect('Teacher/welcome','','3','<P style="color: #5ddfff;font-size: 30px;margin-left: 20px;margin-top: 20px">密码修改成功(三秒后自动跳转)</P>');
            }
        }

//        统计登录情况
        function loginTotal(){
            //从数据库获取登录数据显示到前台
            $toatl=M('login_record');
            $id=session('userID');
            $count= $toatl->query("select * from login_record WHERE lr_id=$id");// 查询满足要求的总记录数 $map表示查询条件
            $count=count($count);
            $Page = new \Think\Page($count,15);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();// 分页显示输出
            $record = $toatl->where("lr_id='$id'")->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('record',$record);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }

        //资源浏览
        function resource(){
            $share_resource=M('share_resource');
            $student=M('student');
            $id=session('userID');
            $data=$student->query("select * from student WHERE s_no='$id'");
            $class=$data[0]['s_class'];
            $count= $share_resource->where("s_class='$class'")->count();// 查询满足要求的总记录数 $map表示查询条件
            $Page = new \Think\Page($count,8);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询
            $allData = $share_resource->where("s_class='$class'")->order('r_id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('allData',$allData);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }

        function search(){
            $key=$_POST['key'];
            $resource=M('resource');
            $student=M('student');
            $id=session('userID');
            $data=$student->query("select * from student WHERE s_no='$id'");
            $class=$data[0]['s_class'];
            $values=$resource->query("select * from resource WHERE r_id LIKE '%$key%' 
                    OR r_name LIKE '%$key%' OR r_uploaderphone LIKE '%$key%'
                    OR r_course LIKE '%$key%' OR r_keyword LIKE '%$key%'");
            $count= count($values);// 查询满足要求的总记录数
            $Page = new \Think\Page($count,8);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询
            $allData = $resource->where("r_id LIKE '%$key%'
            OR r_name LIKE '%$key%' OR r_uploaderphone LIKE '%$key%'
            OR r_course LIKE '%$key%' OR r_keyword LIKE '%$key%' and '$class'")->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('allData',$allData);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }

        function course(){
            $course=M('course');
            $count= $course->count();// 查询满足要求的总记录数 $map表示查询条件
            $Page = new \Think\Page($count,8);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询
            $allData = $course->order('c_id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('allData',$allData);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }

        function show(){
            $id=$_GET['id'];
            $name=$_GET['name'];
            $userId=session('userID');
            $userName=session('userName');
            $time=date("Y-m-d H:i:s");
            $cur=M('course_user_record');
            $cur->execute("insert into course_user_record VALUES ('$id','$name','$userId','$userName','浏览','$time')");
            $course=M('course');
            $data=$course->query("select * from course WHERE c_id='$id'");
            $this->assign('data',$data);
            $this->display();
        }
//        退出页面
        function back(){
            session('userID',null);
            session('userName',null);
            session('position',null);
            $this->redirect('Login/login','','','');
        }
    }