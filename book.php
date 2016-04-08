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
$keyword=$_GET["booknumber"];
include("connection.php");
if ($keyword == "")
	$sql=mysql_query("SELECT * from book");  
else
	$sql=mysql_query("SELECT * from book where booknumber='$keyword'");
if($sql==false){
	echo "<script>alert('亲……臣妾找不到啊……');history.go(-1);</script>";
} 
else{
	$res=mysql_fetch_array($sql);
	?>
	<!doctype html>
	<html>
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width,initial=1.0" charset="utf-8" >
		<!--保持页面原有尺寸，将页面调整为设备的可视浏览器空间-->
		<meta name="author" content="LY">
		<title>书籍管理</title>
		<link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css">
		<link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
		<!--<link rel="stylesheet" type="text/css" href="wlsj.css">-->
		<link href="css/menu.css" media="screen" rel="stylesheet">
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<style type="text/css">
			body{
				background-image: url(https://getsharex.com/img/header_background.jpg);
				background-color: rgb(43,62,120);
				width: auto;
				margin: 0;
				padding: 0;
			}
			.menu > li{
				width: 25%;
			}
			.body-fluid{
				width: auto;
				height:500px;
				color:#DCDCDC;			
				text-align:center;
			}
			form{
				padding: 0;
				margin: 0 5px;
				float: left;
			}
		</style>
	</head>
	<body>
		<ul class="menu boxed clearfix">
			<li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
			<li><a href="control.php"><i class="menu-icon menu-icon-4"></i>管理</a></li>
			<li><a href="info.php"><i class="menu-icon menu-icon-9"></i>借阅登记</a></li>
			<li><a href="add.php"><i class="menu-icon menu-icon-9"></i>添加书籍</a></li>
		</ul>
		<div class="body-fluid">	
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>书名</th>
						<th>作者</th>
						<th>书号</th>
						<th>分类</th>
						<th>状态</th>
						<th>管理</th>
					</tr>
				</thead>
				<tbody>
					<?php
					do{
						?>
						<tr>
							<td><?php echo $res['bookname'];?></td>
							<td><?php echo $res['author'];?></td>
							<td><?php echo $res['booknumber'];?></td>
							<td><?php echo $res['type'];?></td>
							<td><?php 
								if ($res['status'] == 1)
									echo "可借阅";
								else
									echo "已借出";
								?>
							</td>
							<td>
								<form action="bookdel.php" method="post">
									<input type="hidden" name="booknumber" value="<?php echo $res['booknumber'];?>"/>
									<input class="btn" type="submit" name="del" value="删除">
								</form>
								<form action="bookchange.php" method="post">
									<input type="hidden" name="bookname" value="<?php echo $res['bookname'];?>"/>
									<input type="hidden" name="booknumber" value="<?php echo $res['booknumber'];?>"/>
									<input type="hidden" name="author" value="<?php echo $res['author'];?>"/>
									<input type="hidden" name="type" value="<?php echo $res['type'];?>"/>
									<input type="hidden" name="status" value="<?php echo $res['status'];?>"/>
									<input class="btn" type="submit" name="change" value="修改">
								</form>
							</td>
						</tr>
						<?php
					}while($res=mysql_fetch_array($sql));
				}
				?>				
			</tbody>
		</table>
		<div class="pagination pagination-centered">
			<ul>
				<li>
					<a href="#">上一页</a>
				</li>
				<li>
					<a href="#">1</a>
				</li>
				<li>
					<a href="#">2</a>
				</li>
				<li>
					<a href="#">3</a>
				</li>
				<li>
					<a href="#">4</a>
				</li>
				<li>
					<a href="#">5</a>
				</li>
				<li>
					<a href="#">6</a>
				</li>
				<li>
					<a href="#">下一页</a>
				</li>
			</ul>
		</div>
	</div>   
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="wlsj.js"></script>
</body>
</html>