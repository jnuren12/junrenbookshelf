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
$keyword=$_GET["booknumber"];
$conn=@mysql_connect('localhost','root','');
mysql_select_db("bookshelf",$conn);
mysql_query("set names 'utf8'");
if ($keyword == "")
	$sql=mysql_query("SELECT * from people");  
else
	$sql=mysql_query("SELECT * from people where booknumber='$keyword'");
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
		<title>借阅人管理</title>
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
			}
			.body-fluid{
				width: auto;
				height:500px;				
				color:#DCDCDC;
				text-align:center;
			}
			.menu > li{
				width: 25%;
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
			<li><a href="control.php" data-toggle="tab"><i class="menu-icon menu-icon-4"></i>管理</a></li>
			<li><a href="info.php"><i class="menu-icon menu-icon-6"></i>借阅登记</a></li>
			<li><a href="add.php"><i class="menu-icon menu-icon-6"></i>添加书籍</a></li>
		</ul>
		<div class="body-fluid">	
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>姓名</th>
						<th>学号</th>
						<th>宿舍</th>
						<th>电话</th>
						<th>书号</th>
						<th>状态</th>
						<th>管理</th>
					</tr>
				</thead>
				<tbody>
					<?php
					do{
						?>
						<tr>
							<td><?php echo $res['studentname'];?></td>
							<td><?php echo $res['studentnumber'];?></td>
							<td><?php echo $res['roomnumber'];?></td>
							<td><?php echo $res['phonenumber'];?></td>
							<td><?php echo $res['booknumber'];?></td>
							<td><?php 
								if ($res['status'] == 1)
									echo "已还";
								else
									echo "未还";
								?>
							</td>
							<td>
							<form action="peopledel.php" method="post">
								<input type="hidden" name="booknumber" value="<?php echo $res['booknumber'];?>"/>
								<input class="btn" type="submit" name="del" value="删除">
							</form>
							<form action="peoplechange.php" method="post">
								<input type="hidden" name="studentname" value="<?php echo $res['studentname'];?>"/>
								<input type="hidden" name="studentnumber" value="<?php echo $res['studentnumber'];?>"/>
								<input type="hidden" name="roomnumber" value="<?php echo $res['roomnumber'];?>"/>
								<input type="hidden" name="phonenumber" value="<?php echo $res['phonenumber'];?>"/>
								<input type="hidden" name="booknumber" value="<?php echo $res['booknumber'];?>"/>
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