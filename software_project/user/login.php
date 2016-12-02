<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/29
 * Time: 9:28
 */
header("Content-type:text/html;charset=UTF-8");
require("configs/config.php");
$smarty->assign("title",'用户登录');
$smarty->display('login.html');