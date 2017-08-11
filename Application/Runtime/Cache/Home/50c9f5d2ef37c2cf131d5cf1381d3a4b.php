<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>自兴人工智能学院后台管理</title>
  <link rel="stylesheet" type="text/css" href="/Public/LoginConfig/assets/css/style.css" />
  
</head>
<body onLoad="sendRequest()" >
<div class="videozz"></div>
<div class="box">
  <div class="box-a">
    <div class="m-2">
      <div class="m-2-1">
        <form action="/index.php/Home/Login/loginCheck" method="post">
          <div class="m-2-2">
            <input name="userId" type="text" placeholder="请输入账号"  style="width: 350px;height: 50px"/>
          </div>
          <div class="m-2-2">
            <input name="password" type="password" placeholder="请输入密码" style="width: 350px;height: 50px"/>
          </div>
          <div class="m-2-2-1">
            <input name="code" type="text" placeholder="请输入验证码" style="width: 150px;height: 50px"/>
            <img  id="code" src="/index.php/Home/Login/verify" onclick="this.src='/index.php/Home/Login/verify?'+Math.random()" style="width: 180px;height: 50px" alt="点击换一个"/>
          </div>
          <div class="m-2-2">
            <button type="submit" value="登录" style="width: 350px;height: 50px;cursor: pointer"/> 登录
          </div>
        </form>
      </div>
    </div>
    <div class="m-5">
      <div id="m-5-id-1">
        <div id="m-5-2">
          <div id="m-5-id-2">
          </div>
          <div id="m-5-id-3"></div>
        </div>
      </div>
    </div>
    <div class="m-10"></div>
    <div class="m-xz7"></div>
    <div class="m-xz8 xzleft"></div>
    <div class="m-xz9"></div>
    <div class="m-xz9-1"></div>
    <div class="m-x17 xzleft"></div>
    <div class="m-x18"></div>
    <div class="m-x19 xzleft"></div>
    <div class="m-x20"></div>
    <div class="m-8"></div>
    <div class="m-9"><div class="masked1" id="sx8">自兴人工智能</div></div>
    <div class="m-11">
      <div class="m-k-1"><div class="t1"></div></div>
      <div class="m-k-2"><div class="t2"></div></div>
      <div class="m-k-3"><div class="t3"></div></div>
      <div class="m-k-4"><div class="t4"></div></div>
      <div class="m-k-5"><div class="t5"></div></div>
      <div class="m-k-6"><div class="t6"></div></div>
      <div class="m-k-7"><div class="t7"></div></div>
    </div>
    <div class="m-14"><div class="ss"></div></div>
    <div class="m-15-a">
      <div class="m-15-k">
        <div class="m-15xz1">
          <div class="m-15-dd2"></div>
        </div>
      </div>
    </div>
    <div class="m-16"></div>
    <div class="m-17"></div>
    <div class="m-18 xzleft"></div>
    <div class="m-19"></div>
    <div class="m-20 xzleft"></div>
    <div class="m-21"></div>
    <div class="m-22"></div>
    <div class="m-23 xzleft"></div>
    <div class="m-24" id="localtime"></div>
  </div>
</div>
<script type="text/javascript" src="/Public/LoginConfig/assets/js/common.min.js"></script>
</body>
<script>

</script>
</html>