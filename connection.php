<?php
	$dbname = 'MqkrurazoWbhCSQdbPdm';
	$host = 'sqld.duapp.com';
	$port = 4050;
	$user = '7a2f0aa875c94306b77ef58cd43fa88d';//用户AK
	$pwd = 'e4fdd5b5aef74b608462f1b8706e5a7d';//用户SK

	$conn = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
	if(!$conn) {
		die("Connect Server Failed: " . mysql_error());
	}
		/*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
	if(!mysql_select_db($dbname,$conn)) {
		die("Select Database Failed: " . mysql_error($conn));
	}
?>