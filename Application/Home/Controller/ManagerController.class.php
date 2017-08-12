<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");

    class ManagerController extends Controller{

        public function index(){
            if (!session('?userID')) {
                session('userID',null);
                $this->display('/Login/login');
                return;
            }else{
                $course_manager=M('course_manager');
                $userID = session('userID');
                $userName=session('userName');
                $user=$course_manager->query("select * from course_manager WHERE cm_name='$userName'");
                if($userID==$user[0]['cm_phone']){
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

        function personal(){
            $userID=session('userID');
            $course_manager=M('course_manager');
            $data=$course_manager->query("select * from course_manager WHERE cm_phone='$userID'");
            $this->assign('data',$data);
            $this->display();
        }

        function completeChange(){
            $user=M('course_manager');
            $id=session('userID');
            $data=$user->query("select * from course_manager where cm_phone='$id'");
            $pwd=$data[0]['cm_password'];
            $oldPwd=$_POST['oldPwd'];
            $newPwd=$_POST['newPwd'];
            if($pwd==$oldPwd){
                $user->execute("update course_manager set cm_password='$newPwd' WHERE cm_phone='$id'");
                $this->redirect('Teacher/welcome','','3','<P style="color: #5ddfff;font-size: 30px;margin-left: 20px;margin-top: 20px">密码修改成功(三秒后自动跳转)</P>');
            }
        }

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




        public function upload(){
            $course=M('course');
            $data=$course->query("select * from course ORDER BY c_id DESC ");
            $this->assign('data',$data);
            $this->display();
        }

        public function resourceUpload(){
            //上传文件
            if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
                exit;
            }
            if ( !empty($_REQUEST[ 'debug' ]) ) {
                $random = rand(0, intval($_REQUEST[ 'debug' ]) );
                if ( $random === 0 ) {
                    header("HTTP/1.0 500 Internal Server Error");
                    exit;
                }
            }

            //获取配置信息
            if (isset($_REQUEST["course"])) {
                $course = $_REQUEST["course"];
            } elseif (!empty($_POST['course'])) {
                $course = $_POST['course'];
            }
            if (isset($_REQUEST["keyWord"])) {
                $keyWord = $_REQUEST["keyWord"];
            } elseif (!empty($_POST['keyWord'])) {
                $keyWord = $_POST['keyWord'];
            }

            @set_time_limit(50 * 60);
            if (isset($_REQUEST["name"])) {
                $name = $_REQUEST["name"];
                $fileSize=$_REQUEST['size'];
                $fileName=iconv("UTF-8","gb2312", $name);
            } elseif (!empty($_FILES)) {
                $name = $_FILES["file"]["name"];
                $fileSize = $_FILES["file"]["size"];
                $fileName=iconv("UTF-8","gb2312", $name);
            } else {
                $name = uniqid("file_");
                $fileName=iconv("UTF-8","gb2312", $name);
            }
            //获取文件后缀名
            $subName=substr(strrchr($fileName, '.'), 1);
            if ($subName=='pdf'){
                $uploadDir = 'Public/Resource/Pdf';
                $dataPath="Resource/Pdf";
                $type='Pdf';
            }elseif ($subName=='ppt'||$subName=='pptx'){
                $uploadDir = 'Public/Resource/PPT';
                $dataPath="Resource/PPT";
                $type='PPT';
            }elseif ($subName=='xlsx'||$subName=='xls'){
                $uploadDir = 'Public/Resource/Execl';
                $dataPath="Resource/Execl";
                $type='Execl';
            }elseif ($subName=='mp4'){
                $uploadDir = 'Public/Resource/Video';
                $dataPath="Resource/Video";
                $type='Video';
            }elseif ($subName=='doc'||$subName=='docx'){
                $uploadDir = 'Public/Resource/Word';
                $dataPath="Resource/Word";
                $type='Doc';
            }else{
                $uploadDir = 'Public/Resource/Zip';
                $dataPath="Resource/Zip";
                $type='压缩文件';
            }

            $targetDir = 'Public/Resource/Tem';
            $cleanupTargetDir = true;
            $maxFileAge = 6 * 3600;
            if (!file_exists($targetDir)) {
                @mkdir($targetDir);
            }
            if (!file_exists($uploadDir)) {
                @mkdir($uploadDir);
            }
            $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
            $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
            $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
            $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
            if ($cleanupTargetDir) {
                if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "无法打开文件夹"}, "id" : "id"}');
                }
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                    if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                        continue;
                    }
                    if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            }
            if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "信息输入失败"}, "id" : "id"}');
            }
            if (!empty($_FILES)) {
                if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "临时文件转移失败"}, "id" : "id"}');
                }
                if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "信息读取失败"}, "id" : "id"}');
                }
            } else {
                if (!$in = @fopen("php://input", "rb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "信息读取失败"}, "id" : "id"}');
                }
            }
            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }
            @fclose($out);
            @fclose($in);
            rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
            $index = 0;
            $done = true;
            for( $index = 0; $index < $chunks; $index++ ) {
                if ( !file_exists("{$filePath}_{$index}.part") ) {
                    $done = false;
                    break;
                }
            }
            if ( $done ) {
                if (!$out = @fopen($uploadPath, "wb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                }
                if ( flock($out, LOCK_EX) ) {
                    for( $index = 0; $index < $chunks; $index++ ) {
                        if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                            break;
                        }
                        while ($buff = fread($in, 4096)) {
                            fwrite($out, $buff);
                        }
                        @fclose($in);
                        @unlink("{$filePath}_{$index}.part");
                    }
                    flock($out, LOCK_UN);
                }
                @fclose($out);
            }
            $resource=M('resource');
            $uploaderPhone=session('userID');
            $time=date("Y-m-d H:i:s");
            $path=$dataPath.'/'.$name;
            $fileSize=$this->getFileSize($fileSize);
            $resource->execute("insert into resource(R_name,R_uploaderPhone,R_course,R_keyword,
                                  R_address,R_type,R_time,R_size) VALUES (
                                  '$name','$uploaderPhone','$course','$keyWord','$path',
                                  '$type','$time','$fileSize')"
            );
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
        }

        function getFileSize($size){        //自行设计的得到文件大小的函数，单位为byte
            $dw="Byte";
            if($size >= pow(2, 40)){
                $size=round($size/pow(2, 40), 3);
                $dw="TB";
            }else if($size >= pow(2, 30)){
                $size=round($size/pow(2, 30), 3);
                $dw="GB";
            }else if($size >= pow(2, 20)){
                $size=round($size/pow(2, 20), 3);
                $dw="MB";
            }else if($size >= pow(2, 10)){
                $size=round($size/pow(2, 10), 3);
                $dw="KB";
            }else {
                $dw="Bytes";
            }
            return $size.$dw;

        }

        public function forClass(){
            $share_resource=M('share_resource');
            $resource=M("resource");
            $Student=M('student');
            $data=$resource->query("select * from resource");
            $forClass=$share_resource->query("select * from share_resource");
            //按照班级序号升序排序并且去除重复班级号
            $studentData=$Student->query("select distinct s_class from student ORDER BY s_class ASC ");

            for($j=0;$j<count($studentData);$j++){
                $doc=null;$execl=null;$ppt=null;$pdf=null;$video=null;$other=null;
                for($i=0;$i<count($forClass);$i++){
                    if($forClass[$i]['r_type']=='Doc'&&$forClass[$i]['s_class']==$studentData[$j]['s_class']){
                        $doc[]=array('r_id'=>$forClass[$i]['r_id'],'r_name'=>$forClass[$i]['r_name'],
                            'r_type'=>$forClass[$i]['r_type']);
                    } elseif ($forClass[$i]['r_type']=='Execl'&&$forClass[$i]['s_class']==$studentData[$j]['s_class']){
                        $execl[]=array('r_id'=>$forClass[$i]['r_id'],'r_name'=>$forClass[$i]['r_name'],
                            'r_type'=>$forClass[$i]['r_type']);
                    }elseif ($forClass[$i]['r_type']=='PPT'&&$forClass[$i]['s_class']==$studentData[$j]['s_class']){
                        $ppt[]=array('r_id'=>$forClass[$i]['r_id'],'r_name'=>$forClass[$i]['r_name'],
                            'r_type'=>$forClass[$i]['r_type']);
                    }elseif ($forClass[$i]['r_type']=='Pdf'&&$forClass[$i]['s_class']==$studentData[$j]['s_class']){
                        $pdf[]=array('r_id'=>$forClass[$i]['r_id'],'r_name'=>$forClass[$i]['r_name'],
                            'r_type'=>$forClass[$i]['r_type']);
                    }elseif ($forClass[$i]['r_type']=='Video'&&$forClass[$i]['s_class']==$studentData[$j]['s_class']){
                        $video[]=array('r_id'=>$forClass[$i]['r_id'],'r_name'=>$forClass[$i]['r_name'],
                            'r_type'=>$forClass[$i]['r_type']);
                    }elseif ($forClass[$i]['r_type']=='压缩文件'&&$forClass[$i]['s_class']==$studentData[$j]['s_class']){
                        $other[]=array('r_id'=>$forClass[$i]['r_id'],'r_name'=>$forClass[$i]['r_name'],
                            'r_type'=>$forClass[$i]['r_type']);
                    }
                }
                $allClass[]=array('id'=>$studentData[$j]['s_class'],'doc'=>$doc,'execl'=>$execl,'ppt'=>$ppt,
                    'pdf'=>$pdf,'video'=>$video,'other'=>$other);
            }
            $this->assign('allClass',$allClass);
            //过去同类型资源文件
            for($i=0;$i<count($data);$i++){
                if($data[$i]['r_type']=='Doc'){
                    $docType[]=array('r_id'=>$data[$i]['r_id'],'r_name'=>$data[$i]['r_name'],
                        'r_type'=>$data[$i]['r_type'],'r_address'=>$data[$i]['r_address'],'r_size'=>$data[$i]['r_size']);
                }elseif ($data[$i]['r_type']=='Execl'){
                    $execlType[]=array('r_id'=>$data[$i]['r_id'],'r_name'=>$data[$i]['r_name'],
                        'r_type'=>$data[$i]['r_type'],'r_address'=>$data[$i]['r_address'],'r_size'=>$data[$i]['r_size']);
                }elseif ($data[$i]['r_type']=='PPT'){
                    $pptType[]=array('r_id'=>$data[$i]['r_id'],'r_name'=>$data[$i]['r_name'],
                        'r_type'=>$data[$i]['r_type'],'r_address'=>$data[$i]['r_address'],'r_size'=>$data[$i]['r_size']);
                }elseif ($data[$i]['r_type']=='Pdf'){
                    $pdfType[]=array('r_id'=>$data[$i]['r_id'],'r_name'=>$data[$i]['r_name'],
                        'r_type'=>$data[$i]['r_type'],'r_address'=>$data[$i]['r_address'],'r_size'=>$data[$i]['r_size']);
                }elseif ($data[$i]['r_type']=='Video'){
                    $videoType[]=array('r_id'=>$data[$i]['r_id'],'r_name'=>$data[$i]['r_name'],
                        'r_type'=>$data[$i]['r_type'],'r_address'=>$data[$i]['r_address'],'r_size'=>$data[$i]['r_size']);
                }elseif ($data[$i]['r_type']=='压缩文件'){
                    $otherType[]=array('r_id'=>$data[$i]['r_id'],'r_name'=>$data[$i]['r_name'],
                        'r_type'=>$data[$i]['r_type'],'r_address'=>$data[$i]['r_address'],'r_size'=>$data[$i]['r_size']);
                }
            }
            $this->assign('docType',$docType);
            $this->assign('execlType',$execlType);
            $this->assign('pptType',$pptType);
            $this->assign('pdfType',$pdfType);
            $this->assign('videoType',$videoType);
            $this->assign('otherType',$otherType);
            $this->display();
        }

        public function role(){
            $share_resource=M('share_resource');
            $resource=M('resource');
            $Student=M('student');
            $forClass=$share_resource->query("select * from share_resource");
            //按照班级序号升序排序并且去除重复班级号
            $studentData=$Student->query("select distinct s_class from student ORDER BY s_class ASC ");
            for($i=0;$i<count($studentData);$i++){
                $class=$_POST[$studentData[$i]['s_class'].'A'];
                $this->add($class,$share_resource,$studentData[$i]['s_class']);
            }
            for($i=0;$i<count($studentData);$i++){
                $class=$_POST[$studentData[$i]['s_class'].'D'];
                $this->delete($class,$share_resource,$studentData[$i]['s_class']);
            }
            $this->redirect('Manager/forClass','',30,'<P style="color: #5ddfff;font-size: 30px;margin-left: 20px;margin-top: 20px">资源分配操作完成(三秒后自动跳转)</P>');
        }
        private function add($class,$share_resource,$num){
            for($i=0;$i<count($class);$i++){
                $data=explode('->',$class[$i]);
                var_dump($data);
                $id=$data[0];
                $name=$data[1];
                $type=$data[2];
                $size=$data[3];
                $address=$data[4];
                $share_resource->execute("insert into share_resource VALUES ('$id','$num','$name','$type','$address','$size')");
            }
        }
        private function delete($delete,$share_resource,$num){
            for($i=0;$i<count($delete);$i++){
                $id=$delete[$i];
                $share_resource->execute("delete from share_resource where r_id='$id' AND s_class='$num'");
            }

        }

        public function resource(){
            $resource=M('resource');
            $count= $resource->count();// 查询满足要求的总记录数 $map表示查询条件
            $Page = new \Think\Page($count,8);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询
            $allData = $resource->order('r_id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('allData',$allData);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }

        public function totalRecord(){
            $resource_user_record=M('resource_user_record');
            $count= $resource_user_record->count();
            $Page = new \Think\Page($count,13);
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
            $show = $Page->show();
            $allData = $resource_user_record->order('rur_resourceid asc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('allData',$allData);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        }

        public function search(){
            $key=$_POST['key'];
            $resource=M('resource');
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
            OR r_course LIKE '%$key%' OR r_keyword LIKE '%$key%'")->limit($Page->firstRow.','.$Page->listRows)->select();
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

        function remove(){
            $id=$_POST['id'];
            $name=$_POST['name'];
            $resource=M('resource');
            $resource->execute("delete from resource where r_id='$id'");
            $userId=session("userID");
            $userName=session('userName');
            $time=date("Y-m-d H:i:s");
            $resource_user_record=M('resource_user_record');
            $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','删除','$time','$userName','$name')");
            $data = 'ok';
            $this->ajaxReturn($data);
        }

        function back(){
            session('userID',null);
            session('userName',null);
            session('position',null);
            $this->redirect('Login/login','','','');
        }
    }
