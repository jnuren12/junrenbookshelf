<?php
    header("Content-type: text/html; charset=utf-8");
    include("inputfilter.php"); 
    if($_POST){
    	$comment=commentsafe($_POST["comment"]);
    	$booknumber=$_POST["booknumber"];
    	if ($comment == ""){
            echo "<script>alert('请填写评论！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $sql = mysql_query("INSERT into comment(booknumber,comment) values('$booknumber','$comment')");//执行插入语句
            if($sql){
                echo "<script>alert('评论成功');history.go(-1);</script>";
            }
        }
    }
?>