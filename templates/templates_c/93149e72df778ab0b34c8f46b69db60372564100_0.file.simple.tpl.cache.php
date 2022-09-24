<?php
/* Smarty version 4.1.0, created on 2022-08-20 13:28:32
  from '/var/www/html/smarty/templates/clean-blog/simple.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63007f10df4ad3_40351450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93149e72df778ab0b34c8f46b69db60372564100' => 
    array (
      0 => '/var/www/html/smarty/templates/clean-blog/simple.tpl',
      1 => 1660976911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63007f10df4ad3_40351450 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'/var/www/html/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '32477284363007f10ddcb98_24358482';
?>
<html>
<head>
<title>Info</title>
</head>
<body>
Test Article:<br>
Title: <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<br>
Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
<br>
Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value,true);?>
<br>
Description: <?php echo $_smarty_tpl->tpl_vars['description']->value;?>
<br>
<p>
Pages List ( <?php echo count($_smarty_tpl->tpl_vars['pages']->value);?>
 ):
<p>
  <ul>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
      <li><strong><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</strong>:<?php echo $_smarty_tpl->tpl_vars['page']->value['description'];?>
</li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
</p>
Posts List ( <?php echo count($_smarty_tpl->tpl_vars['posts']->value);?>
 ):
<p>
  <ul>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
      <li><strong><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</strong>:<?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
</li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
</p>
Post Line
<p>
  <ul>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post_line']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
      <li><strong><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</strong>:<?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
</li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
</p>
<pre>
Users Information ( <?php echo count($_smarty_tpl->tpl_vars['users']->value);?>
 ):<br>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
Name: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['user']->value['user_fullname']);?>

Role: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['user_role'], ENT_QUOTES, 'UTF-8', true);?>

Email: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['user_email'], ENT_QUOTES, 'UTF-8', true);?>

Date: <?php echo smarty_modifier_date_format(time(),"%b %e, %Y");?>

</br>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</pre>
</body>
</html>
<?php }
}
