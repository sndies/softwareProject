<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/28
 * Time: 9:40
 */
require("config.php");
require("public.php");
$connobj=new ConnDB("mysql","localhost","root","root","software");
$conn=$connobj->GetConnId();
$admindb=new AdminDB();
$seppage=new SepPage();
//$usefun=new UseFun();
$smarty=new Smarty();
function unhtml($params){
    extract($params);
    $text=$content;
    global $usefun;
    return $usefun->UnHtml($text);
}
//$smarty->register_function("","");