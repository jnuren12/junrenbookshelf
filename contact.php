  <!DOCTYPE html>
  <html>
  <head>
    <meta name="viewport" content="width=device-width,initial=1.0" charset="utf-8" >
    <title>联系我们</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/menu.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" href="jss/dist/ui/trumbowyg.min.css">
    <script src="js/jquery-ui.min.js"></script>
    <link href="jss/dependents/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="jss/dependents/jquery/jquery.min.js"></script>
    <script src="jss/dependents/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            background-color: #F2F2F2;
            font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        }
        header {
            text-align: center;
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
      .input-group{
        margin:20px;
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
  <header>
  <h1>Some Ways to contact us</h1>

    <p style="font-size:20px">
        <br>
        phonenumber: <b>666666</b> <br>
        email: <b>1145833162@qq.com</b>
    </p>
</header>
<div id="main" role="main">
    <p style="font-size:20px;margin-left:20px;color:#7d7c7c">
    <br>
      Or you can fill the following form to show us your opinions: 
    </p>
    <form action="contactsave.php" method="post">
        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input name="username" type="text" class="form-control" placeholder="your name">
      </div>
      <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input name="email" type="text" class="form-control" placeholder="your email">
      </div>
      <textarea id="form-content" class="editor" name="comment" cols="30" rows="10"onfocus="if(value=='I want ot say ~'){value=''}" onblur="if (value ==''){value='I want ot say ~'}">I want to say ~</textarea>
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
