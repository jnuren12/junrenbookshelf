<?php
header("Content-type: text/html; charset=utf-8"); 
if($_POST){
    $booknumber=$_POST["booknumber"];
    include("connection.php");
    $sql = mysql_query("DELETE from book where booknumber='$booknumber'");
    if($sql){
         echo "<script>alert('删除成功');history.go(-1);</script>";
    }
    mysql_query("DELETE from comment where booknumber='$booknumber'");
}
 ?>