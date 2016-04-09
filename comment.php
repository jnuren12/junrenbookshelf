<?php
$booknumber = $_GET["booknumber"];
include("connection.php");
$sql = mysql_query("SELECT bookname from book where booknumber='$booknumber'");
$res=mysql_fetch_array($sql);
do{
    $bookname = $res["bookname"];
}while($res=mysql_fetch_array($sql));
if ($booknumber == "")
    $sql=mysql_query("SELECT * from comment");
else
    $sql=mysql_query("SELECT * from comment where booknumber='$booknumber'");
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
        <link rel="stylesheet" href="jss/trumbowyg/design/css/trumbowyg.css">
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
          <li><a href="login.html"><i class="menu-icon menu-icon-8"></i>管理员登录</a></li>
          <li><a href="#"><i class="menu-icon menu-icon-6"></i>联系我们</a></li>
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
<p><h4>读者评论：<h4></p>
<div id="dtGridContainer_2_1_2" class="dt-grid-container"></div>
<div id="dtGridToolBarContainer_2_1_2" class="dt-grid-toolbar-container"></div>
<div id="main" role="main">
    <form action="commentsave.php" method="post">
        <input type="hidden" name="booknumber" value="<?php echo $_GET["booknumber"];?>">
        <textarea id="form-content" class="editor" name="comment" cols="30" rows="10">
        </textarea>
        <input class="info" type="submit"/ value="提交">
    </form>
</div>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="jss/trumbowyg/trumbowyg.js"></script>
<script src="jss/trumbowyg/langs/fr.js"></script>
<script src="jss/trumbowyg/plugins/upload/trumbowyg.upload.js"></script>
<script src="jss/trumbowyg/plugins/base64/trumbowyg.base64.js"></script>
<script>
    /** Default editor configuration **/
    $('#simple-editor').trumbowyg();
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
             $('#customized-buttonpane').trumbowyg({
                lang: 'fr',
                closable: true,
                fixedBtnPane: true,
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
                btns: ['viewHTML',
                '|', 'formatting',
                '|', 'btnGrp-test',
                '|', 'align',
                '|', 'btnGrp-lists',
                '|', 'image']
            });
             /** Simple customization with current options **/
             $('#form-content').trumbowyg({
                lang: 'fr',
                closable: true,
                mobile: true,
                fixedBtnPane: true,
                fixedFullWidth: true,
                semantic: true,
                resetCss: true,
                autoAjustHeight: true,
                autogrow: true
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
