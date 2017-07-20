<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class LookController extends Controller{
        function lookPdf(){
            $this->display();
        }

        function pdfView(){
            $this->display();
        }

        function lookWord(){
            $this->display();
        }
    }