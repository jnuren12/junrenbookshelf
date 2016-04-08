<?php
header("Content-type: text/html; charset=utf-8");
    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	if($username == " " || $password == " ")
    	{  
    		echo "<script>alert('用户名或密码未输入！');history.go(-1);</script>";
    	}
    	else
    	{
    		$conn=@mysql_connect("localhost","root","");
    		mysql_select_db("bookshelf",$conn);
    		$sql = "select username,password from admin where username = '$_POST[username]' and password = '$_POST[password]'";
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