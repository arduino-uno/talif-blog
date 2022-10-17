<?php
/* Smarty version 4.1.0, created on 2022-08-19 13:58:48
  from '/var/www/html/smarty/templates/simple/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62ff34a8ac3f91_76799379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16a91cb77ece263bcecbd11c1784decc22dad4c4' => 
    array (
      0 => '/var/www/html/smarty/templates/simple/index.tpl',
      1 => 1660868428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62ff34a8ac3f91_76799379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '146378049962ff34a8ab8409_76166728';
?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - Bootsnipp.com</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <?php echo '<script'; ?>
 type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php echo '<script'; ?>
 src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
<div class="row"><div class="col-md-12 text-center"><h1>: <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 :</h1></div></div>
<div class="row">
	<div class="col-md-6">
		<div id="postlist">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
			<div class="panel">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="pull-left"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h3>
                            </div>
                            <div class="col-sm-3">
                                <h4 class="pull-right">
                                <small><em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['published'],"%b %e, %Y");?>
</em></small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="panel-body">
                <a href="#" class="thumbnail">
                    <img alt="Image" src="http://i.imgur.com/tAHVmXi.jpg">
                </a>
                <?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
 .. <a href="#">Read more</a>
            </div>

            <div class="panel-footer">
                <span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</span> <span class="label label-default">Updates</span> <span class="label label-default"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['published'],"%b");?>
</span>
            </div>
        </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
		<div class="text-center"><a href="#" id="loadmore" class="btn btn-primary">Older Posts...</a></div>
</div>
	<div class="col-md-1"></div>
	<div class="col-md-3">
	</div>
	<div class="col-md-1">
	</div>
</div>
</div>
</body></html>
<?php }
}
