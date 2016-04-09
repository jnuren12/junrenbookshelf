<?php
header("Content-type: text/html; charset=utf-8");
include("inputfilter.php");
    	$username = _safe($_POST["username"]);
    	$password = _safe($_POST["password"]);
    	if($username == " " || $password == " ")
    	{  
    		echo "<script>alert('用户名或密码未输入！');history.go(-1);</script>";
    	}
    	else
    	{
    		include("connection.php");
    		$sql = "SELECT username,password from admin where username = '$username' and password = '$password'";
    		$result = mysql_query($sql);
    		$num =mysql_num_rows($result);
    		if ($num)
    		{     
                setcookie("username", $username);
                setcookie("password", $password);
    			header("Location: control.php");
    		}
    		else
    		{
    			echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
    		}
    	}

?>