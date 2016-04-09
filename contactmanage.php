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
include("connection.php");
$sql=mysql_query("SELECT * from contact ORDER BY id DESC");
if($sql==false){
    echo "<script>alert('亲……臣妾找不到啊……');history.go(-1);</script>";
} 
else{
    $res=mysql_fetch_array($sql);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width,initial=1.0" charset="utf-8" >
        <title>反馈管理</title>
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
            width: 20%;
        }
        a:hover, a:focus {
            color: #c9376e !important; 
            text-decoration: none;
        }
  </style>
</head>
<body>
    <div class="header">
        <ul class="menu boxed clearfix">
          <li><a href="index.php"><i class="menu-icon menu-icon-1"></i>首页</a></li>
          <li><a href="search.php?bookname= &search=查找"><i class="menu-icon menu-icon-5"></i>书架</a></li>
          <li><a href="control.php"><i class="menu-icon menu-icon-4"></i>管理</a></li>
          <li><a href="login.html"><i class="menu-icon menu-icon-8"></i>登录</a></li>
          <li><a href="contact.php"><i class="menu-icon menu-icon-6"></i>联系我们</a></li>
      </ul>
  </div>
  <script type="text/javascript">
    var datas = new Array();
    <?php
    do{
        echo "var comment = new Object();
        comment.username = '".$res['username']."';
        comment.email = '".$res['email']."';
        comment.comment = '".$res['comment']."';
        comment.time = '".$res['time']."';
        comment.id1 = ".$res['id'].";
        datas.push(comment);
        ";
    }while($res=mysql_fetch_array($sql));
}
?>
var dtGridColumns_2_1_2 = [
{id:'username', title:'姓名', type:'string', columnClass:'text-center', hideType:'xs'},
{id:'email', title:'邮箱', type:'string', columnClass:'text-center', hideType:'md|sm|xs'},
{id:'comment', title:'评论', type:'string', columnClass:'text-center'},
{id:'time', title:'反馈时间', type:'date', format:'yyyy-MM-dd hh:mm:ss', columnClass:'text-center',hideType:'sm|xs'},
{id:'id1', title:'ID', type:'int',columnClass:'text-center',hideType:'lg|md|sm|xs'},
{id:'operation', title:'操作', type:'string', columnClass:'text-center', resolution:function(value, record, column, grid, dataNo, columnNo){
    var content = '';
    content += '<form class="formname" action="contactdel.php" method="post"><input type="hidden" name="id" value="'+record.id1+'"/><button class="btn btn-xs btn-danger" type="submit" onClick="delcfm()"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;删除</button></form>';
    return content;
}}
];
var dtGridOption_2_1_2 = {
    lang : 'zh-cn',
    ajaxLoad : false,
    exportFileName : '反馈列表',
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
</script>
<p><h4>用户反馈：<h4></p>
<div id="dtGridContainer_2_1_2" class="dt-grid-container"></div>
<div id="dtGridToolBarContainer_2_1_2" class="dt-grid-toolbar-container"></div>
</body>
</html>
