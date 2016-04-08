<?php 
         $keyword=$_GET["bookname"];
		 $conn=@mysql_connect("127.0.0.1","root","");
         mysql_select_db("bookshelf",$conn);
         mysql_query("set names 'utf8'");
         if ($keyword == "")
         	$sql=mysql_query("SELECT * from book");  
         else
         	$sql=mysql_query("SELECT * from book where bookname like '%$keyword%'"); 
		 if($sql==false){
		   	echo "<script>alert('亲……臣妾找不到啊……换个关键词试试呗~~');history.go(-1);</script>";
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
<title>搜索结果</title>
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
				width: 20%;
			}
.header{
	width: auto;
	height: 60px;
	 background-color:#29386c;
	 padding: 20px 0;
	border: 1px;
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
	<ul class="menu boxed clearfix">
          <li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
          <li><a href="search.php?bookname=&search=查找"><i class="menu-icon menu-icon-5"></i>书架</a></li>
          <li><a href="control.php"><i class="menu-icon menu-icon-4"></i>管理</a></li>
          <li><a href="login.html"><i class="menu-icon menu-icon-8"></i>管理员登录</a></li>
          <li><a href="#"><i class="menu-icon menu-icon-6"></i>联系我们</a></li>
      </ul>
	<div class="body-fluid">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							书名
						</th>
						<th>
							作者
						</th>
						<th>
							类别
						</th>
						<th>
							状态
						</th>
					</tr>
				</thead>
			    <tbody>
		<?php
		 do{
		?>
        <tr>
        <td><?php echo $res['booknumber'];?></td>
          <td><?php echo $res['bookname'];?></td>
          <td><?php echo $res['author'];?></td>
          <td><?php echo $res['type'];?></td>
          <td><?php 
          	if ($res['status'] == 1)
          		echo "可借阅";
          	else
          		echo "已借出";
          ?></td>
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