<?php
$T = TRUE;
if(!isset($_COOKIE['username'])){
  $T = FALSE;
}
else{
  $username=$_COOKIE['username'];
  $password=$_COOKIE['password'];
  include("connection.php");
  $result=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'",$conn);
  if (mysql_num_rows($result) == 0)
    $T = FALSE;
}
$booknumber = $_GET["booknumber"];
include("connection.php");
$sql = mysql_query("SELECT bookname,status from book where booknumber='$booknumber'");
$res=mysql_fetch_array($sql);
do{
    $bookname = $res["bookname"];
    $status = $res["status"];
}while($res=mysql_fetch_array($sql));
if ($booknumber == "")
    $sql=mysql_query("SELECT * from comment ORDER BY id DESC");
else
    $sql=mysql_query("SELECT * from comment where booknumber='$booknumber' ORDER BY id DESC");
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
        <title>评论<?php echo $_GET["booknumber"];?></title>
        <link href="css/menu.css" media="screen" rel="stylesheet">
        <link rel="stylesheet" href="jss/dist/ui/trumbowyg.min.css">
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
        #main {
            max-width: 960px;
            margin: 20px auto;
        }
        .info{
          border: none;
          font-family: inherit;
          font-size: inherit;
          font-weight: inherit;
          line-height: inherit;
          -webkit-appearance: none;
          -webkit-border-radius: 0 0 20px 20px;
          -moz-border-radius: 0 0 20px 20px;
          border-radius: 0 0 20px 20px;
          background-color: rgb(51,136,255);
          font-size: 20px;
          color: #fff;
          display: block;
          padding: 4px 4px;
          width: 120px;
          height: 40px;
          float: right;
          margin: 10px 40px 40px 0;
          cursor:pointer;
          line-height: 1.5em;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
      }
      .info:hover{background-color:rgb(49,126,243); }
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
        comment.booknumber = '".$booknumber."';
        comment.bookname = '".$bookname."';
        comment.comment = '".$res['comment']."';
        comment.time = '".$res['time']."';
        comment.id1 = ".$res['id'].";
        datas.push(comment);
        ";
    }while($res=mysql_fetch_array($sql));
}
?>
var dtGridColumns_2_1_2 = [
{id:'booknumber', title:'书号', type:'string', columnClass:'text-center', hideType:'sm|xs'},
{id:'bookname', title:'书名', type:'string', columnClass:'text-center', hideType:'xs'},
{id:'comment', title:'评论', type:'string', columnClass:'text-center'},
{id:'time', title:'评论时间', type:'date', format:'yyyy-MM-dd hh:mm:ss', columnClass:'text-center',hideType:'xs'},
<?php
if($T){
    echo "{id:'id1', title:'ID', type:'int',columnClass:'text-center',hideType:'lg|md|sm|xs'},
    {id:'operation', title:'操作', type:'string', columnClass:'text-center', resolution:function(value, record, column, grid, dataNo, columnNo){
        var content = '';
        content += '<form class=\"formname\" action=\"commentdel.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"'+record.id1+'\"/><button class=\"btn btn-xs btn-danger\" type=\"submit\" onClick=\"delcfm()\"><i class=\"fa fa-trash-o\"></i>&nbsp;&nbsp;删除</button></form>';
        return content;
    }}";
}
?>
];
var dtGridOption_2_1_2 = {
    lang : 'zh-cn',
    ajaxLoad : false,
    exportFileName : '评论列表',
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
<p>
  <?php
  if($status==1)
      echo "<span style=\"background:#00a2ca;padding:2px 10px;margin:0 0 20px 0;color:white;\">可借阅</span>";
  else
      echo "<span style=\"background:#c447ae;padding:2px 10px;margin:0 0 20px 0;color:white;\">已借出</span>";
  ?>
  <h4>读者评论：<h4>
  </p>
  <div id="dtGridContainer_2_1_2" class="dt-grid-container"></div>
  <div id="dtGridToolBarContainer_2_1_2" class="dt-grid-toolbar-container"></div>
  <div id="main" role="main">
    <form action="commentsave.php" method="post">
        <input type="hidden" name="booknumber" value="<?php echo $_GET["booknumber"];?>">
        <textarea id="form-content" class="editor" name="comment" cols="30" rows="10" onfocus="if(value=='评价一下这本书吧 ~'){value=''}" onblur="if (value ==''){value='评价一下这本书吧 ~'}">评价一下这本书吧 ~</textarea>
        <input class="info" type="submit"/ value="提交">
    </form>
</div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><\/script>')</script>
<script src="jss/dist/trumbowyg.min.js"></script>
<script src="jss/dist/langs/zh_cn.min.js"></script>
<script src="jss/dist/plugins/upload/trumbowyg.upload.js"></script>
<script src="jss/dist/plugins/base64/trumbowyg.base64.js"></script>
<script>
    /** Default editor configuration **/
            /********************************************************
             * Customized button pane + buttons groups + dropdowns
             * Use upload plugin
             *******************************************************/
            /*
             * Add your own groups of button
             */
             $.trumbowyg.btnsGrps.test = ['bold', 'link'];

             /* Add new words for customs btnsDef just below */
             $.extend(true, $.trumbowyg.langs, {
                fr: {
                    align: 'Alignement',
                    image: 'Image'
                }
            });
             /** Simple customization with current options **/
             $('#form-content').trumbowyg({
                lang: 'fr',
                closable: false,
                mobile: true,
                fixedBtnPane: true,
                fixedFullWidth: true,
                semantic: true,
                resetCss: true,
                autoAjustHeight: true,
                autogrow: true,
                btnsDef: {
                    // Customizables dropdowns
                    align: {
                        dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                        ico: 'justifyLeft'
                    },
                    image: {
                        dropdown: ['insertImage', 'upload', 'base64'],
                        ico: 'insertImage'
                    }
                },
                btns: ['formatting',
                '|', 'btnGrp-test',
                '|', 'align',
                '|', 'btnGrp-lists',
                '|', 'image']
            });
             $('.editor').on('dblclick', function(e){
                $(this).trumbowyg({
                    lang: 'fr',
                    closable: true,
                    fixedBtnPane: true
                });
            });
         </script>
     </body>
     </html>
