<?php
/* Smarty version 3.1.30, created on 2016-11-27 15:48:12
  from "D:\phpStudy\WWW\software_project\templates\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583b003cdd10f4_89830522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb6b4a483c27eb2ac5ef01dcd82ddb7b0b6077fc' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\software_project\\templates\\index.html',
      1 => 1480261291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583b003cdd10f4_89830522 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
购书信息：<p>
    图书类别：<?php echo $_smarty_tpl->tpl_vars['array']->value[0];?>
<br/>
    图书名称：<?php echo $_smarty_tpl->tpl_vars['array']->value['name'];?>
<br/>
    图书单价：<?php echo $_smarty_tpl->tpl_vars['array']->value['unit_price']['price'];?>
/<?php echo $_smarty_tpl->tpl_vars['array']->value['unit_price']['unit'];?>
</p>
</body>
</html><?php }
}
