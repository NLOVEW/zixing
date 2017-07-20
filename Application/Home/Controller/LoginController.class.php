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

}