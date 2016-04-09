<?php
header("Content-type: text/html; charset=utf-8"); 
if($_POST){
    $id=$_POST["id"];
    include("connection.php");
    $sql = mysql_query("DELETE from contact where id='$id'");//执行插入语句
    if($sql){
         echo "<script>alert('删除成功');history.go(-1);</script>";
    }
}
 ?>