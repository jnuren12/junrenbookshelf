<?php
    header("Content-type: text/html; charset=utf-8"); 
    include("inputfilter.php");
    if($_POST['peoplesave']){
    	$studentname=_safe($_POST["studentname"]);
    	$studentnumber=_safe($_POST["studentnumber"]);
    	$roomnumber=_safe($_POST["roomnumber"]);
    	$phonenumber=_safe($_POST["phonenumber"]);
        $booknumber=_safe($_POST["booknumber"]);
        $status=$_POST["status"];
    	if ($studentname == "" || $studentnumber == "" || $roomnumber== "" || $booknumber == "" || $phonenumber == "" || $statusnumber == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $sql = mysql_query("UPDATE people SET studentname = '$studentname', studentnumber = '$studentnumber', roomnumber = '$roomnumber', phonenumber = '$phonenumber', booknumber = '$booknumber', status = '$status' WHERE booknumber = '$booknumber'");
            if($sql){
                echo "<script>alert('保存成功');history.go(-1);</script>";
            }
            mysql_query("UPDATE book SET status = '$status' WHERE booknumber = '$booknumber'");
            echo "<script>history.go(-1);</script>";
        }
    }
?>