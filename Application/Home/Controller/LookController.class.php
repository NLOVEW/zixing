<?php
namespace Home\Controller;
use Think\Controller;
vendor('OfficeToPdf.OfficeToPdf', '' ,'.php');
header("Content-type: text/html; charset=utf-8");
class LookController extends Controller{

    function lookPdf(){
        $path=$_POST['path'];
        $all=explode('->',$path);
        $path=$all[0];
        $id=$all[1];
        $resourceName=$all[2];
        $userId=session("userID");
        $userName=session('userName');
        $time=date("Y-m-d H:i:s");
        $resource_user_record=M('resource_user_record');
        $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','在线浏览','$time','$userName','$resourceName')");
        $this->assign("path",$path);
        $this->display();
    }

    function lookWord(){
        $path=$_POST['path'];
        $all=explode('->',$path);
        $path=$all[0];
        $id=$all[1];
        $resourceName=$all[2];
        $userId=session("userID");
        $userName=session('userName');
        $time=date("Y-m-d H:i:s");
        $resource_user_record=M('resource_user_record');
        $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','在线浏览','$time','$userName','$resourceName')");
        $name=explode('.',$path);
        $pdf=new \OfficeToPdf();
        $path=iconv("UTF-8",'gb2312',$path);
        $name=md5($name[0]);
        $inputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/'.$path;
        $outputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/wordPdf/'.$name.'.pdf';
        if(file_exists($outputPath)){
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }else{
            $pdf->run($inputPath,$outputPath);
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }
    }

    function lookPpt(){
        $path=$_POST['path'];
        $all=explode('->',$path);
        $path=$all[0];
        $id=$all[1];
        $resourceName=$all[2];
        $userId=session("userID");
        $userName=session('userName');
        $time=date("Y-m-d H:i:s");
        $resource_user_record=M('resource_user_record');
        $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','在线浏览','$time','$userName','$resourceName')");
        $name=explode('.',$path);
        $pdf=new \OfficeToPdf();
        $path=iconv("UTF-8",'gb2312',$path);
        $name=md5($name[0]);
        $inputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/'.$path;
        $outputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/wordPdf/'.$name.'.pdf';
        if(file_exists($outputPath)){
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }else{
            $pdf->run($inputPath,$outputPath);
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }
    }

    function lookExecl(){
        $path=$_POST['path'];
        $all=explode('->',$path);
        $path=$all[0];
        $id=$all[1];
        $resourceName=$all[2];
        $userId=session("userID");
        $userName=session('userName');
        $time=date("Y-m-d H:i:s");
        $resource_user_record=M('resource_user_record');
        $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','在线浏览','$time','$userName','$resourceName')");

        $name=explode('.',$path);
        $pdf=new \OfficeToPdf();
        $path=iconv("UTF-8",'gb2312',$path);
        $name=md5($name[0]);
        $inputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/'.$path;
        $outputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/wordPdf/'.$name.'.pdf';
        if(file_exists($outputPath)){
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }else{
            $pdf->run($inputPath,$outputPath);
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }
    }
    function lookVideo(){
        $path=$_POST['path'];
        $all=explode('->',$path);
        $path=$all[0];
        $id=$all[1];
        $resourceName=$all[2];
        $userId=session("userID");
        $userName=session('userName');
        $time=date("Y-m-d H:i:s");
        $resource_user_record=M('resource_user_record');
        $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','在线浏览','$time','$userName','$resourceName')");
        $this->assign('path',$path);
        $this->display();
    }

    function download(){
        $path=$_POST['path'];
        $all=explode('->',$path);
        $path=$all[0];
        $id=$all[1];
        $resourceName=$all[2];
        $userId=session("userID");
        $userName=session('userName');
        $time=date("Y-m-d H:i:s");
        $resource_user_record=M('resource_user_record');
        $resource_user_record->execute("insert into resource_user_record VALUES ('$id','$userId','下载','$time','$userName','$resourceName')");
        $path='./Public/'.$path;
        $filename = $path;
        $showname=$resourceName;
        $this->downloadFile($filename,$showname);
    }
    private function downloadFile($file_url,$new_name){
        //用以解决中文不能显示出来的问题
        $file_url=iconv("utf-8","gb2312",$file_url);
        $new_name=iconv("utf-8",'gb2312',$new_name);
        //首先要判断给定的文件存在与否
        if(!file_exists($file_url)){
            echo "文件已删除";
            return ;
        }
        $fp=fopen($file_url,"r");
        $file_size=filesize($file_url);
        //下载文件需要用到的头
        header("Content-Type:text/html; charset=utf-8");
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length:".$file_size);
        Header("Content-Disposition: attachment; filename=".$new_name);
        $buffer=1024;
        $file_count=0;
        //向浏览器返回数据
        while(!feof($fp) && $file_count<$file_size){
            $file_con=fread($fp,$buffer);
            $file_count+=$buffer;
            echo $file_con;
        }
        fclose($fp);
    }
}