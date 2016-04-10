<?php
header("Content-type: text/html; charset=utf-8"); 
include("inputfilter.php");
if($_POST){
    $comment=commentsafe($_POST["comment"]);
    $username=_safe($_POST["username"]);
    $email=_safe($_POST["email"]);
    if ($comment == ""||$username == ""||$email == ""){
        echo "<script>alert('请确保信息完整！');history.go(-1);</script>"; 
    }
    else{
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if ( preg_match( $pattern, $email) ){
            include("connection.php");
            $sql = mysql_query("INSERT into contact(username,email,comment) values('$username','$email','$comment')");//执行插入语句
            if($sql){
                echo "<script>alert('反馈成功');history.go(-1);</script>";
            }
        }
        else{
            echo "<script>alert('输入的邮箱地址不合法');history.go(-1);</script>";
        }
    }
}
?>