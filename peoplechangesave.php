<?php
    header("Content-type: text/html; charset=utf-8"); 
    include("inputfilter.php");
    if($_POST){
    	$studentname=_safe($_POST["studentname"]);
    	$studentnumber=_safe($_POST["studentnumber"]);
    	$roomnumber=_safe($_POST["roomnumber"]);
    	$phonenumber=_safe($_POST["phonenumber"]);
        $booknumber=_safe($_POST["booknumber"]);
        $status=$_POST["status"];
        $id=$_POST["id"];
    	if ($studentname == "" || $studentnumber == "" || $roomnumber== "" || $booknumber == "" || $phonenumber == "" || $status == ""|| $id == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
    	else
    	{
    		include("connection.php");
            $sql = mysql_query("SELECT * from people where id='$id'");
            $res=mysql_fetch_array($sql);
            do{
                $prebooknumber = $res["booknumber"];
                $prestatus = $res["status"];
            }while($res=mysql_fetch_array($sql));
            if($prebooknumber != $booknumber && $prestatus == 0){
                $sql = mysql_query("UPDATE book SET status = 1 WHERE booknumber = '$prebooknumber'");
                $sql = mysql_query("UPDATE book SET status = 0 WHERE booknumber = '$booknumber'");
            }
            $sql = mysql_query("UPDATE people SET studentname = '$studentname', studentnumber = '$studentnumber', roomnumber = '$roomnumber', phonenumber = '$phonenumber', booknumber = '$booknumber', status = '$status' WHERE id = '$id'");
            if($sql){
                echo "<script>alert('修改成功');history.go(-1);</script>";
            }
            echo "<script>history.go(-1);</script>";
        }
    }
?>