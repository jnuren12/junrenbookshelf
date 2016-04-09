<?php
    header("Content-type: text/html; charset=utf-8"); 
    include("inputfilter.php");
    if($_POST){
    	$bookname=_safe($_POST["bookname"]);
    	$booknumber=_safe($_POST["booknumber"]);
    	$author=_safe($_POST["author"]);
    	$type=_safe($_POST["type"]);
    	if ($bookname == "" || $booknumber == "" || $author== "" || $type == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $sql = mysql_query("INSERT into book(bookname,author,booknumber,type,status) values('$bookname','$author','$booknumber','$type','1')");//执行插入语句
            if($sql){
                echo "<script>alert('添加成功');history.go(-1);</script>";
            }
        }
    }
?>