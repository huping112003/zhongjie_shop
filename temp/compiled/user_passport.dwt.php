<!doctype html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Page-Enter" content="revealTrans(Duration=1.0,Transition=23)">
<title><?php echo $this->_var['page_title']; ?></title>
<link href="themes/luntai/css/base.css" rel="stylesheet" type="text/css" >
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" >
<link href="themes/luntai/css/iconfont.css" rel="stylesheet" type="text/css" >
<link href="themes/luntai/css/member.css" rel="stylesheet" type="text/css" >
<?php echo $this->smarty_insert_scripts(array('files'=>'luntai/jquery-1.8.3.min.js,luntai/jquery.easing.1.3.js,luntai/pintuer.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'luntai/jquery.flexslider.js,luntai/flex-slider.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport_jquery.js,Utils.js')); ?>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<?php if ($this->_var['action'] == 'login'): ?>
<?php echo $this->fetch('library/user_login.lbi'); ?>
<?php endif; ?>

<?php if ($this->_var['action'] == 'register'): ?>
<?php echo $this->fetch('library/user_register.lbi'); ?>
<?php endif; ?>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</body>
</html>
