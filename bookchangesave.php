<?php 
    header("Content-type: text/html; charset=utf-8"); 
    if($_POST['booksave']){
        $bookname=$_POST["bookname"];
        $booknumber=$_POST["booknumber"];
        $author=$_POST["author"];
        $type=$_POST["type"];
        $status=$_POST["status"];
        if ($bookname == "" || $booknumber == "" || $author== "" || $type == "" || $status == ""){
            echo "<script>alert('请确认信息完整！');history.go(-1);</script>"; 
        }
        else
        {
            include("connection.php");
            $rs = mysql_query("SELECT * from book WHERE booknumber = '$booknumber'");
            if (mysql_num_rows($rs) > 0){
                $sql = mysql_query("UPDATE book SET bookname = '$bookname',author = '$author',booknumber = '$booknumber', type = '$type', status = '$status' WHERE booknumber = '$booknumber'");
                if($sql)
                    echo "<script>alert('修改成功');history.go(-1);</script>";
                else
                    echo "<script>alert('修改失败');</script>";
            }
            else{
                $sql = mysql_query("INSERT into book(bookname,author,booknumber,type,status) values('$bookname','$author','$booknumber','$type','status')");
                if($sql)
                    echo "<script>alert('添加成功');history.go(-1);</script>";
                else
                    echo "<script>alert('添加失败');</script>";
            }
                echo "<script>history.go(-1);</script>";
        }
    }
?>