<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/28
 * Time: 10:10
 */
header("Content-type:text/html;charset=UTF-8");
require("configs/config.php");
$smarty->assign("title",'新用户注册');
$smarty->display('register.html');