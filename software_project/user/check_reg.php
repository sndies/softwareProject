<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/28
 * Time: 11:01
 */
session_start();
header("Content-type:text/html;charset=UTF-8");
require("configs/init.php");
$name=$_POST['name'];
$password=$_POST['password'];
$sql="insert into user_table values('$name','$password')";
$rst=$admindb->ExecSQL($sql,$conn);//ExecSQL函数在public里
if($rst) {
    $_SESSION['member'] = $name;
    echo "<script>top.opener.location.reload();alert('注册成功');window.close();</script>";
}else {
    echo "<script>alert('注册失败');history.back();</script>";
}

