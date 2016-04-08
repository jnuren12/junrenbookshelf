<?php
if(!isset($_COOKIE['username'])){
	header("Location: login.html");
}
else{
	$username=$_COOKIE['username'];
	$password=$_COOKIE['password'];
	$conn=@mysql_connect('localhost','root','');
	mysql_select_db('bookshelf',$conn);
	$result=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'",$conn);
	if(!$result)
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
		body{
			background-image: url(https://getsharex.com/img/header_background.jpg);
			background-color: rgb(43,62,120);
		}
		a:hover, a:focus {
			color: #c9376e !important; 
			text-decoration: none;
		}
		.menu > li{
			width: 20%;
		}
		.body-fluid{
			width: auto;
			height:500px;
			color:#DCDCDC;
			text-align:center;
			margin: 0;
			padding: 0;
		}
		footer{
			background-image: url(https://getsharex.com/img/header_background.jpg);
			background-size: auto;
			padding: 5px 0;
			text-align: center;
		}
		footer p{
			color:#DCDCDC;
			font-family: "Microsoft YaHei" ! important;
		}
	</style>
</head>
<body>
	<div class="header">
		<ul class="menu boxed clearfix">
			<li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
			<li><a href="#panel-784120" data-toggle="tab"><i class="menu-icon menu-icon-4"></i>书架管理</a></li>
			<li><a href="#panel-280270" data-toggle="tab"><i class="menu-icon menu-icon-8"></i>借阅人管理</a></li>
			<li><a href="info.php"><i class="menu-icon menu-icon-6"></i>借阅登记</a></li>
			<li><a href="add.php"><i class="menu-icon menu-icon-6"></i>添加书籍</a></li>
		</ul>
	</div>
	<div class="body-fluid">
		<div class="tab-content">
			<div class="tab-pane active" id="panel-784120">
				<div class="search" style="margin:150px 0">
					<i> </i>
					<div class="s-bar">
						<form action="book.php" method="get">
							<input type="text" name="booknumber" value = "" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入书号查找书籍';}">
							<input type="submit"  value="查找"/>
						</form>
					</div>
					<p></p>
				</div>
			</div>
			<div class="tab-pane" id="panel-280270">
				<div class="search" style="margin:150px 0">
					<i> </i>
					<div class="s-bar">
						<form action="people.php" method="get">
							<input type="text" name="booknumber" value = "" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入书号查找借阅人';}">
							<input type="submit"  value="查找"/>
						</form>
					</div>
					<p></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid" style="margin:0px;">
		<div class="col-xs-6 col-md-12" style="padding:0px;">
			<footer>
				<p>Copyright © 2016 WLKF Team</p>
			</footer>
		</div>  
	</div>    
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="wlsj.js"></script>
</body>
</html>