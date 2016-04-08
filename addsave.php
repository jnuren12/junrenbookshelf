<?php
    header("Content-type: text/html; charset=utf-8"); 
    if($_POST){
    	$bookname=$_POST["bookname"];
    	$booknumber=$_POST["booknumber"];
    	$author=$_POST["author"];
    	$type=$_POST["type"];
    	if ($bookname == "" || $booknumber == "" || $author== "" || $type == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $sql = mysql_query("INSERT into book(bookname,author,booknumber,type,status) values('$bookname','$author','$booknumber','$type','1')");//执行插入语句
            if($sql){
                echo "<script>alert('保存成功');history.go(-1);</script>";
            }
        }
    }
?>