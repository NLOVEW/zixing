<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");
    class SearchController extends Controller{
        function course(){
            $this->display();
        }
        function resource(){
            $this->display();
        }
    }
