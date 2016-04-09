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
include("inputfilter.php");
$keyword=_safe($_GET["booknumber"]);
include("connection.php");
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
	<script type="text/javascript" src="../../../jss/jquery.dtGrid.js"></script>
	<script type="text/javascript" src="../../../jss/i18n/en.js"></script>
	<script type="text/javascript" src="../../../jss/i18n/zh-cn.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../jss/jquery.dtGrid.css" />
	<!-- datePicker -->
	<script type="text/javascript" src="../../../jss/dependents/datePicker/WdatePicker.js" defer="defer"></script>
	<link rel="stylesheet" type="text/css" href="../../../jss/dependents/datePicker/skin/WdatePicker.css" />
	<link rel="stylesheet" type="text/css" href="../../../jss/dependents/datePicker/skin/default/datepicker.css" />
	<style type="text/css">
		html, body {
			margin: 0;
			padding: 0;
			background-color: #F2F2F2;
			font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
		}
		.menu > li{
			width: 25%;
		}
		a:hover, a:focus {
			color: #c9376e !important; 
			text-decoration: none;
		}
		.formname{
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
	<script type="text/javascript">
	//映射内容
	var status1 = {0:'未归还', 1:'已归还'};
	var datas = new Array();
	<?php
	do{
		echo "var people = new Object();
		people.booknumber = '".$res['booknumber']."';
		people.studentname = '".$res['studentname']."';
		people.studentnumber = '".$res['studentnumber']."';
		people.status1 = ".$res['status'].";
		people.phonenumber = '".$res['phonenumber']."';
		people.roomnumber = '".$res['roomnumber']."';
		people.time = '".$res['time']."';
		people.id1 = ".$res['id'].";
		datas.push(people);
		";
	}while($res=mysql_fetch_array($sql));
}
?>
var dtGridColumns_2_1_2 = [
{id:'studentname', title:'姓名', type:'string', columnClass:'text-center'},
{id:'booknumber', title:'书号', type:'string', columnClass:'text-center',hideType:'md|sm|xs'},
{id:'studentnumber', title:'学号', type:'string', columnClass:'text-center', hideType:'md|sm|xs'},
{id:'phonenumber', title:'电话号码', type:'string', columnClass:'text-center', hideType:'sm|xs'},
{id:'roomnumber', title:'宿舍', type:'string', columnClass:'text-center', hideType:'md|sm|xs'},
{id:'time', title:'借阅时间', type:'date', format:'yyyy-MM-dd hh:mm:ss', columnClass:'text-center',hideType:'xs'},
{id:'id1', title:'ID', type:'int',columnClass:'text-center',hideType:'lg|md|sm|xs'},
{id:'status1', title:'状态', type:'string', codeTable:status1, columnClass:'text-center',resolution:function(value, record, column, grid, dataNo, columnNo){
	var content = '';
	if(value==1){
		content += '<span style="background:#00a2ca;padding:2px 10px;color:white;">已归还</span>';
	}else{
		content += '<span style="background:#c447ae;padding:2px 10px;color:white;">未归还</span>';
	}
	return content;
}},
{id:'operation', title:'操作', type:'string', columnClass:'text-center', resolution:function(value, record, column, grid, dataNo, columnNo){
	var content = '';
	content += '<form class="formname" action="peoplechange.php" method="post"><input type="hidden" name="studentname" value="'+record.studentname+'"/><input type="hidden" name="booknumber" value="'+record.booknumber+'"/><input type="hidden" name="studentnumber" value="'+record.studentnumber+'"/><input type="hidden" name="phonenumber" value="'+record.phonenumber+'"/><input type="hidden" name="roomnumber" value="'+record.roomnumber+'"/><input type="hidden" name="status" value="'+record.status1+'"/><input type="hidden" name="id" value="'+record.id1+'"/><button class="btn btn-xs btn-default" type="submit"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</button></form>';
	content += '&nbsp;&nbsp;';
	content += '<form class="formname" action="peopledel.php" method="post"><input type="hidden" name="id" value="'+record.id1+'"/><button class="btn btn-xs btn-danger" type="submit" onClick="delcfm()"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;删除</button></form>';
	content += '&nbsp;&nbsp;';
	content += '<form class="formname" action="peoplerepay.php" method="post"><input type="hidden" name="booknumber" value="'+record.booknumber+'"/><input type="hidden" name="id" value="'+record.id1+'"/><button class="btn btn-xs btn-info" type="submit" onClick="delcfmrepay()"><i class="fa fa-book"></i>&nbsp;&nbsp;还书</button></form>';
	return content;
}}

];
var dtGridOption_2_1_2 = {
	lang : 'zh-cn',
	ajaxLoad : false,
	exportFileName : '借阅人列表',
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
<script language="javascript">
    function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
    function delcfmrepay() {
        if (!confirm("确认还书？")) {
            window.event.returnValue = false;
        }
    }
</script>
<p><h4>搜索结果：<h4></p>
<div id="dtGridContainer_2_1_2" class="dt-grid-container"></div>
<div id="dtGridToolBarContainer_2_1_2" class="dt-grid-toolbar-container"></div>
</body>
</html>