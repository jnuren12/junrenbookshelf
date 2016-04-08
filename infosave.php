<?php
    header("Content-type: text/html; charset=utf-8"); 
    if($_POST){
    	$name=$_POST["username"];
    	$sdu=$_POST["studentnumber"];
    	$dorm=$_POST["dormnumber"];
    	$tel=$_POST["phonenumber"];
        $book=$_POST["booknumber"];
    	if ($name == "" || $sdu == "" || $dorm== "" || $tel == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $sql = mysql_query("insert into people(studentame,studentnumber,roomnumber,phonenumber,booknumber,status) values('$name','$sdu','$dorm','$tel','$book','0')");//执行插入语句
            if($sql){
                echo "<script>alert('保存成功');history.go(-1);</script>";
            }
            $sql = mysql_query("UPDATE book SET status = '0' WHERE booknumber = '$book'");
        }
    }
?>