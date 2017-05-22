<!doctype html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Page-Enter" content="revealTrans(Duration=1.0,Transition=23)">
    <title>中杰轮胎销售有限公司</title>
    <link href="themes/luntai/css/base.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" >
    <link href="themes/luntai/css/iconfont.css" rel="stylesheet" type="text/css" >
</head>

<body>
 <?php echo $this->fetch('library/page_header.lbi'); ?>
 
  <div class="containerone">
    <div class="main">
      
       <div class="side_left">
         <h3><?php echo $this->_var['cat_name']; ?></h3>
         <ul class="side_leftlist">
          <?php $_from = $this->_var['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
           <li <?php if ($this->_var['id'] == $this->_var['val']['article_id']): ?>class="ona"<?php endif; ?>><a href="article.php?id=<?php echo $this->_var['val']['article_id']; ?>"><?php echo $this->_var['val']['title']; ?></a></li>
           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </ul>

       </div>
       
       <div class="content">
          <div class="titlener"><span><?php echo $this->_var['article']['title']; ?></span></div>
          <div class="content_main">
            <?php echo $this->_var['article']['content']; ?>
          </div>
          <!-- <div class="content_main">
            <img src="themes/luntai/images/img19.jpg">
          </div> -->
       </div>
    </div>
  </div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
 
   
    <script type="text/javascript" src="themes/luntai/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        $('.mavbar li').mouseenter(function(){
           $(this).addClass('on').siblings().removeClass('on');
        });
    </script>
    <script type="text/javascript">
        $('.side_leftlist li').mouseenter(function(){
           $(this).addClass('ona').siblings().removeClass('ona');
        });
    </script>
</body>
</body>
</html>
