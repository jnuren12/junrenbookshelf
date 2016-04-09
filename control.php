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
<!doctype html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width,initial=1.0" charset="utf-8" >
	<!--保持页面原有尺寸，将页面调整为设备的可视浏览器空间-->
	<meta name="author" content="LY">
	<title>网联书架管理</title>
	<!--<link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/menu.css" media="screen" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="wlsj.css">-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<style type="text/css">
	@viewport{
       width: extend-to-zoom 100%;
       zoom:1.0;
   }
		body{
			background-image: url(images/5.jpg);
		}
		a:hover, a:focus {
			color: #c9376e !important; 
			text-decoration: none;
		}
		.menu > li{
			width: 16.6666666666%;
		}
		.body-fluid{
			width: auto;
			height:500px;
			color:#DCDCDC;
			text-align:center;
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<body>
	<div class="header">
		<ul class="menu boxed clearfix">
			<li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
			<li><a href="#panel-784120" data-toggle="tab"><i class="menu-icon menu-icon-4"></i>书架管理</a></li>
			<li><a href="#panel-280270" data-toggle="tab"><i class="menu-icon menu-icon-8"></i>借阅管理</a></li>
			<li><a href="contactmanage.php"><i class="menu-icon menu-icon-6"></i>反馈管理</a></li>
			<li><a href="info.php"><i class="menu-icon menu-icon-9"></i>借阅登记</a></li>
			<li><a href="add.php"><i class="menu-icon menu-icon-9"></i>添加书籍</a></li>
		</ul>
	</div>
	<div class="body-fluid">
		<div class="tab-content">
			<div class="tab-pane active" id="panel-784120">
				<div class="search" style="margin:150px 0">
					<i> </i>
					<div class="s-bar">
						<form action="book.php" method="get">
							<input type="text" name="booknumber" value="请输入书号查找书籍" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入书号查找书籍';}">
							<input type="submit"  value="查找"/>
						</form>
					</div>
					<p>输入" "（空格）查找全部</p>
				</div>
			</div>
			<div class="tab-pane" id="panel-280270">
				<div class="search" style="margin:150px 0">
					<i> </i>
					<div class="s-bar">
						<form action="people.php" method="get">
							<input type="text" name="booknumber" value="请输入书号查找借阅人" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入书号查找借阅人';}">
							<input type="submit"  value="查找"/>
						</form>
					</div>
					<p>输入" "（空格）查找全部</p>
				</div>
			</div>
		</div>
	</div>    
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="wlsj.js"></script>
</body>
</html>