<?php
/* Smarty version 4.1.0, created on 2022-12-12 10:16:26
  from '/var/www/html/talif-blog/templates/simple/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63969d0a291568_96071537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b72b10bd52e7903d08a9f8b35b561332171a0308' => 
    array (
      0 => '/var/www/html/talif-blog/templates/simple/index.tpl',
      1 => 1670814984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63969d0a291568_96071537 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/talif-blog/smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->compiled->nocache_hash = '20243942363969d0a27baf0_56550902';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<PRE>
Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>

An example of section looped foreach:
</PRE>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
<p><fieldset>
    Login: <?php echo $_smarty_tpl->tpl_vars['user']->value['user_login'];?>

    <br>
    Fullname: <?php echo $_smarty_tpl->tpl_vars['user']->value['user_fullname'];?>

    <br>
    Email: <?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>

    <br>
</fieldset></p>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<p>&nbsp;</p>

An example of posts looped foreach:
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
<p><fieldset>
Title:<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
<br>
Body:<?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
<br>
Image:<img src="./images/<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" height="300px"><br><span align="center"><?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
</span><br>
Published:<?php echo $_smarty_tpl->tpl_vars['post']->value['published'];?>

</fieldset></p>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
