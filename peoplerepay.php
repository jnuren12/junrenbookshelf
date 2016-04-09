<?php
    header("Content-type: text/html; charset=utf-8");
    if($_POST){
        $booknumber=$_POST["booknumber"];
        $id=$_POST["id"];
        $status = 1;
        include("connection.php");
        $sql0 = mysql_query("UPDATE book SET status = '$status' WHERE booknumber = '$booknumber'");
        $sql = mysql_query("UPDATE people SET status = '$status' WHERE id = '$id'");
        if($sql && $sql0){
             echo "<script>alert('成功归还书本');history.go(-1);</script>";
        }
        echo "<script>history.go(-1);</script>";
    }
?>