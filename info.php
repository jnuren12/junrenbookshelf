<?php
if(!isset($_COOKIE['username'])){
  header("Location: login.html");
}
else{
  $username=$_COOKIE['username'];
  $password=$_COOKIE['password'];
  include("connection.php");
  $result=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'",$conn);
  if (mysql_num_rows($result) == 0)
    header("Location: login.html");
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>借阅登记</title>
  <meta name="viewport" content="width=device-width,initial=1.0" charset="utf-8" >
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/menu.css" media="screen" rel="stylesheet">
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css"/>
  <script src="http://cdn.gbtags.com/jquery/2.1.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/styles.css" media="screen" type="text/css" />
  <style type="text/css">
    @viewport{
     width: extend-to-zoom 100%;
     zoom:1.0;
   }
   body{
    width: auto;
    height:auto;
    background-image: url(images/5.jpg);
    text-align:center;
  }
  .login-page{
    background: none;
  }
  .menu > li{
    width: 25%;
  }
  a:hover{
    text-decoration: none;
  }
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
  <div class="login-page">
    <div class="login-form">
      <div class="login-content">
        <div class="form-login-error">
        </div>
        <form method="post" role="form" id="form_login" action="infosave.php">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user"></i>
              </div>
              <input type="text" class="form-control" name="studentname" id="username" placeholder="姓名" autocomplete="off"/>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-star"></i>
              </div>
              <input type="text" class="form-control" name="studentnumber" id="username" placeholder="学号" autocomplete="off"/>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-university"></i>
              </div>
              <input type="text" class="form-control" name="roomnumber" id="username" placeholder="宿舍" autocomplete="off"/>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
              <input type="text" class="form-control" name="phonenumber" id="username" placeholder="电话" autocomplete="off"/>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-bookmark"></i>
              </div>
              <input type="text" class="form-control" name="booknumber" id="username" placeholder="书号" autocomplete="off"/>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-login">
              <i class="fa fa-save"></i>
              登记
            </button>
          </div>
          <!-- Implemented in v1.1.4 --> 
        </form>
      </div>
    </div>
  </div>
</body>
</html>