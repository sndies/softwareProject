<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/29
 * Time: 9:38
 */
session_start();
header("Content-type:text/html;charset=UTF-8");
require("../configs/init.php");
$reback='0';
$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['authcode'];
$verify1 = $_SESSION['authcode'];
if (1) {
    $sql = "select * from user_table where name='{$username}'and password='{$password}'";
    $rst=$admindb->ExecSQL($sql,$conn);
    if ($rst) {
        $_SESSION['member']=$rst[0]['name'];
        $_SESSION['id']=$rst[0]['id'];
        $reback='2';//登陆成功
    }
    else
        $reback='1';//登陆失败，可能是用户名或密码错误
}