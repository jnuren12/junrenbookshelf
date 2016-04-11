<?php 
include("inputfilter.php");
$keyword=_safe($_GET["bookname"]);
include("connection.php");
if ($keyword == " ")
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
		<link href="css/menu.css" media="screen" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<!-- jQuery -->
		<script type="text/javascript" src="../../../js/jquery.min.js"></script>
			font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
		}
		a:hover, a:focus {
			color: #c9376e !important; 
			text-decoration: none;
		}
		.menu > li{
			width: 20%;
		}
	</style>
</head>
<body>
	<ul class="menu boxed clearfix">
		<li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
		<li><a href="search.php?bookname= &search=查找"><i class="menu-icon menu-icon-5"></i>书架</a></li>
		<li><a href="control.php"><i class="menu-icon menu-icon-4"></i>管理</a></li>
		<li><a href="login.html"><i class="menu-icon menu-icon-8"></i>登录</a></li>
		<li><a href="contact.php"><i class="menu-icon menu-icon-6"></i>联系我们</a></li>
	</ul>
	<script type="text/javascript">
	//映射内容
	var status1 = {0:'已借出', 1:'可借阅'};
	var type1 = {0:'考试复习资料书', 1:'技术干货类', 2:'教材及辅导书', 3:'社科类', 4:'其它'};
	var datas = new Array();
	<?php
	do{
		echo "var book = new Object();
		book.booknumber = '".$res['booknumber']."';
		book.bookname = '".$res['bookname']."';
		book.author = '".$res['author']."';
		book.status1 = ".$res['status'].";
		book.type1 = ".$res['type'].";
		datas.push(book);";
	}while($res=mysql_fetch_array($sql));
}
?>
var dtGridColumns_2_1_2 = [
{id:'booknumber', title:'书号', type:'string', columnClass:'text-center',hideType:'xs'},
{id:'bookname', title:'书名', type:'string', columnClass:'text-center'},
{id:'author', title:'作者', type:'string', columnClass:'text-center', hideType:'xs'},
{id:'type1', title:'类型', type:'string', codeTable:type1, columnClass:'text-center', hideType:'sm|xs'},
{id:'status1', title:'状态', type:'string', codeTable:status1, columnClass:'text-center',resolution:function(value, record, column, grid, dataNo, columnNo){
	var content = '';
	if(value==1){
		content += '<span style="background:#00a2ca;padding:2px 10px;color:white;">可借阅</span>';
	}else{
		content += '<span style="background:#c447ae;padding:2px 10px;color:white;">已借出</span>';
	}
	return content;
}},
{id:'operation', title:'操作', type:'string', columnClass:'text-center', resolution:function(value, record, column, grid, dataNo, columnNo){
	var content = '';
	content += '<button class="btn btn-xs btn-info" onClick="location.href=\''+record.booknumber+'.html\'"><i class="fa fa-comment-o"></i>&nbsp;查看简介和评论</button>';
	return content;
}}
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
<p><h4>搜索结果：<h4></p>
<div id="dtGridContainer_2_1_2" class="dt-grid-container"></div>
<div id="dtGridToolBarContainer_2_1_2" class="dt-grid-toolbar-container"></div>
</body>
</html>