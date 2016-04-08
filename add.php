<?php
if(!isset($_COOKIE['username'])){
  header("Location: login.html");
}
else{
  $username=$_COOKIE['username'];
  $password=$_COOKIE['password'];
  include("connection.php");
  $result=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'",$conn);
  if(!$result)
    header("Location: login.html");
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>添加书籍</title>
  <link href="css/menu.css" media="screen" rel="stylesheet">
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <style type="text/css">
    body{
      width: auto;
      height:auto;
      background-image: url(https://getsharex.com/img/header_background.jpg);
      background-color: rgb(43,62,120);
      text-align:center;
  }
  .menu > li{
    width: 25%;
}
  input {
      border: none;
      font-family: inherit;
      font-size: inherit;
      font-weight: inherit;
      line-height: inherit;
      -webkit-appearance: none;
  }
  /* ---------- REGISTER ---------- */
  #info_wid {
      margin: 50px auto;
      width: 400px;
  }
  #info_wid h2 {
      text-align: center;
      background-color: #2FA99E;
      font-size: 28px;
      -webkit-border-radius: 20px 20px 0 0 ;
      -moz-border-radius: 20px 20px 0 0 ;
      border-radius: 20px 20px 0 0 ;
      color: #FFF;
      padding: 20px 26px;
      position: relative;top: 24px;left:0px;
  }
  #info_wid fieldset {
      background-color: #fff;
      -webkit-border-radius: 0 0 20px 20px;
      -moz-border-radius: 0 0 20px 20px;
      border-radius: 0 0 20px 20px;
      padding: 20px 26px;
  }
  #info_wid fieldset p {
      color: #777;
      margin-bottom: 14px;
  }
  #info_wid fieldset input {
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
  }
  #info_wid fieldset input[type="text"]{
      background-color: #eee;
      color: #777;
      padding: 4px 10px;
      width: 328px;
      height: 37px;
  }
  .info{
      background-color: rgb(51,136,255);
      font-size: 20px;
      color: #fff;
      display: block;
      padding: 4px 4px;
      width: 120px;
      height: 40px;
      float: left;
      margin-left: 110px;
      cursor:pointer;
      line-height: 1.5em;
  }
  .info:hover{background-color:rgb(49,126,243); }
</style>
</head>
<body>
  <div class="header">
    <ul class="menu boxed clearfix">
      <li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
      <li><a href="control.php"><i class="menu-icon menu-icon-4"></i>管理</a></li>
      <li><a href="info.php"><i class="menu-icon menu-icon-9"></i>借阅登记</a></li>
      <li><a href="add.php"><i class="menu-icon menu-icon-9"></i>添加书籍</a></li>
  </ul>
</div>
<div id="info_wid">
    <h2>添加书籍</h2>
    <form action="addsave.php" method="post"> 
      <fieldset>
        <p><input type="text" name="bookname" placeholder="书名" onBlur="if(this.placeholder=='')this.placeholder='书名'" onFocus="if(this.placeholder=='书名')this.placeholder=''"></p>
        <p><input type="text" name="booknumber" placeholder="书号" onBlur="if(this.placeholder=='')this.placeholder='书号'" onFocus="if(this.placeholder=='书号')this.placeholder=''"></p>
        <p><input type="text" name="author" placeholder="作者" onBlur="if(this.placeholder=='')this.placeholder='作者'" onFocus="if(this.placeholder=='作者')this.placeholder=''"></p>
        <p><input type="text" name="type" placeholder="类别" onBlur="if(this.placeholder=='')this.placeholder='类别'" onFocus="if(this.placeholder=='类别')this.placeholder=''"></p>
        <input class="info" type="submit" name="infosave" value="保存"/>
    </form>
</fieldset>
</div>
</body>
</html>