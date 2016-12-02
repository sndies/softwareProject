<?php
/**
 * Created by PhpStorm.
 * User: 镇杰
 * Date: 2016/11/27
 * Time: 23:03
 */
define("BASE_PATH",$_SERVER['DOCUMENT_ROOT']);
include_once '../smarty/Smarty.class.php';
include_once '../smarty/SmartyBC.class.php';
$smarty=new Smarty();
$smarty->template_dir="./templates/";
$smarty->config_dir="./configs/";
$smarty->compile_dir="./templates_c/";
$smarty->cache_dir="./cache/";
$smarty->left_delimiter="{";
$smarty->right_delimiter="}";
