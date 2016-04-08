<?php 
$keyword=$_GET["bookname"];
include("connection.php");
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
}
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
		<!-- jQuery -->
		<script type="text/javascript" src="../../../jss/dependents/jquery/jquery.min.js"></script>
		<!-- bootstrap -->
		<script type="text/javascript" src="../../../jss/dependents/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../../jss/dependents/bootstrap/css/bootstrap.min.css" />
<!--[if lt IE 9]>
	<script src="../../../jss/dependents/bootstrap/plugins/ie/html5shiv.js"></script>
	<script src="../../../jss/dependents/bootstrap/plugins/ie/respond.js"></script>
	<![endif]-->
<!--[if lt IE 8]>
	<script src="../../../jss/dependents/bootstrap/plugins/ie/json2.js"></script>
	<![endif]-->
	<!-- font-awesome -->
	<link rel="stylesheet" type="text/css" href="../../../jss/dependents/fontAwesome/css/font-awesome.min.css" media="all" />
	<!-- dtGrid -->
	<script type="text/javascript" src="../../../jquery.dtGrid.js"></script>
	<script type="text/javascript" src="../../../i18n/en.js"></script>
	<script type="text/javascript" src="../../../i18n/zh-cn.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../jquery.dtGrid.css" />
	<!-- datePicker -->
	<script type="text/javascript" src="../../../jss/dependents/datePicker/WdatePicker.js" defer="defer"></script>
	<link rel="stylesheet" type="text/css" href="../../../jss/dependents/datePicker/skin/WdatePicker.css" />
	<link rel="stylesheet" type="text/css" href="../../../jss/dependents/datePicker/skin/default/datepicker.css" />

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
	<script type="text/javascript">
	//映射内容
	var sex = {1:'男', 2:'女'};
	var degree = {1:'小学', 2:'初中', 3:'高中', 4:'中专', 5:'大学', 6:'硕士', 7:'博士', 8:'其他'};
	//模拟数据（薪水在6000-12000之间，日期在1980-01-01 00::00:00到2014-10-01 00:00:00之间）
	var datas = new Array();
	for(var i=0; i<186; i++){
		var user = new Object();
		user.user_id = 'user_'+i;
		user.user_code = 'user_'+i;
		user.user_name = '模拟用户'+(Math.floor(Math.random()*1000)+10000)+'号';
		user.sex = (Math.floor(Math.random()*2)+1);
		user.salary = (Math.floor(Math.random()*6000)+6000);
		user.degree = (Math.floor(Math.random()*8)+1);
		user.time = new Date(Math.floor(Math.random()*1096588800000)+315504000000);
		user.time_stamp_s = Math.floor((Math.floor(Math.random()*1096588800000)+315504000000)/1000);
		user.time_stamp_ms = Math.floor(Math.random()*1096588800000)+315504000000;
		user.string_date = $.fn.DtGrid.tools.dateFormat(new Date(Math.floor(Math.random()*1096588800000)+315504000000), 'yyyy-MM-dd');
		user.string_time = $.fn.DtGrid.tools.dateFormat(new Date(Math.floor(Math.random()*1096588800000)+315504000000), 'yyyy-MM-dd hh:mm:ss');
		datas.push(user);
	}
		var dtGridColumns_2_1_2 = [
		{id:'user_code', title:'用户编号', type:'string', columnClass:'text-center'},
		{id:'user_name', title:'用户名称', type:'string', columnClass:'text-center'},
		{id:'sex', title:'性别', type:'string', codeTable:sex, columnClass:'text-center', hideType:'xs'},
		{id:'salary', title:'薪水', type:'number', format:'#,###.00', columnClass:'text-center', hideType:'xs'},
		{id:'degree', title:'学历', type:'string', codeTable:degree, columnClass:'text-center', hideType:'sm|xs'},
		{id:'time', title:'日期对象', type:'date', format:'yyyy-MM-dd hh:mm:ss', columnClass:'text-center', hideType:'md|sm|xs'},
		{id:'time_stamp_s', title:'秒级时间戳', type:'date', format:'yyyy-MM-dd hh:mm:ss', otype:'time_stamp_s', columnClass:'text-center', hideType:'lg|md|sm|xs'},
		{id:'time_stamp_ms', title:'毫秒级时间戳', type:'date', format:'yyyy-MM-dd hh:mm:ss S', otype:'time_stamp_ms', columnClass:'text-center', hideType:'lg|md|sm|xs'},
		{id:'string_date', title:'日期格式字符串', type:'date', format:'yyyy-MM-dd', otype:'string', oformat:'yyyy-MM-dd', columnClass:'text-center', hideType:'lg|md|sm|xs'},
		{id:'string_time', title:'时间格式字符串', type:'date', format:'yyyy-MM-dd hh:mm:ss', otype:'string', oformat:'yyyy-MM-dd hh:mm:ss', columnClass:'text-center', hideType:'lg|md|sm|xs'}
		];
		var dtGridOption_2_1_2 = {
			lang : 'zh-cn',
			ajaxLoad : false,
			exportFileName : '用户列表',
			datas : datas,
			columns : dtGridColumns_2_1_2,
			gridContainer : 'dtGridContainer_2_1_2',
			toolbarContainer : 'dtGridToolBarContainer_2_1_2',
			tools : '',
			pageSize : 10,
			pageSizeLimit : [10, 20, 50]
		};
		var grid_2_1_2 = $.fn.DtGrid.init(dtGridOption_2_1_2);
		$(function(){
			grid_2_1_2.load();
		});
	</script>
	<p><code>演示</code>：</p>
	<div id="dtGridContainer_2_1_2" class="dt-grid-container"></div>
	<div id="dtGridToolBarContainer_2_1_2" class="dt-grid-toolbar-container"></div>
</body>
</html>