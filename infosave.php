<?php
    header("Content-type: text/html; charset=utf-8"); 
    include("inputfilter.php");
    if($_POST){
    	$name=_safe($_POST["studentname"]);
    	$sdu=_safe($_POST["studentnumber"]);
    	$dorm=_safe($_POST["roomnumber"]);
    	$tel=_safe($_POST["phonenumber"]);
        $book=_safe($_POST["booknumber"]);
    	if ($name == "" || $sdu == "" || $dorm== "" || $tel == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $n = 0;
            $sql = mysql_query("insert into people(studentname,studentnumber,roomnumber,phonenumber,booknumber,status) values('$name','$sdu','$dorm','$tel','$book','$n')");//执行插入语句
            $sql = mysql_query("UPDATE book SET status = '$n' WHERE booknumber = '$book'");
            if($sql){
                echo "<script>alert('登记成功');history.go(-1);</script>";
            }
        }
    }
?>