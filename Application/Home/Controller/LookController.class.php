<?php
    namespace Home\Controller;
    use Think\Controller;
    vendor('OfficeToPdf.OfficeToPdf', '' ,'.php');
    header("Content-type: text/html; charset=utf-8");
    class LookController extends Controller{


        function lookPdf(){
            $this->assign("path",'/Public/Resource/Pdf/test.pdf');
            $this->display();
        }

        function lookWord(){
            $pdf=new \OfficeToPdf();
            $inputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word'.'/test.docx';
            $outputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Word/wordPdf'.'/test.pdf';
            $pdf->run($inputPath,$outputPath);
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }

        function lookPpt(){
            $pdf=new \OfficeToPdf();
            $inputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/PPT'.'/test.pptx';
            $outputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/PPT/pptPdf'.'/test.pdf';
            $pdf->run($inputPath,$outputPath);
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }

        function lookExecl(){
            $pdf=new \OfficeToPdf();
            $inputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Execl'.'/test.xlsx';
            $outputPath = 'D:/PhpStudy/WWW/zixing/Public/Resource/Execl/execlPdf'.'/test.pdf';
            $pdf->run($inputPath,$outputPath);
            $outputPath=str_replace("D:/PhpStudy/WWW/zixing/Public","/Public",$outputPath);
            $this->assign('path',$outputPath);
            $this->display();
        }

        function lookVideo(){
            $this->display();
        }
    }