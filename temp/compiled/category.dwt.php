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
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js,common.js,global.js,easydialog.min.js,compare.js')); ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'transport_jquery.js,utils.js,jquery.SuperSlide.js,xiaomi_common.js,xiaomi_category.js')); ?>
 <?php echo $this->fetch('library/page_header.lbi'); ?>
 
  <div class="containerone">
    <div class="main">
    <?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
        <table cellpadding="0" cellspacing="0" class="table-product width1">

            <?php if ($this->_var['brands']['1']): ?>
          <tr>
                <td class="branfont" width="90"><?php echo $this->_var['lang']['brand']; ?>：</td>
                <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
                <?php if ($this->_var['brand']['selected']): ?>
                <td class="ppall" width="100"><span><?php echo $this->_var['brand']['brand_name']; ?></span></td>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <td>
                    <div class="productlist2q">
                    <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
                    <?php if (! $this->_var['brand']['selected']): ?>
                        <a href="<?php echo $this->_var['brand']['url']; ?>"><?php echo $this->_var['brand']['brand_name']; ?></a></dd>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                </td>
            </tr>
            <?php endif; ?>

            <?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_22627200_1495448326');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_22627200_1495448326']):
?>
            <tr>
                <td class="branfont" width="90"><?php echo htmlspecialchars($this->_var['filter_attr_0_22627200_1495448326']['filter_attr_name']); ?>：</td>
                <?php $_from = $this->_var['filter_attr_0_22627200_1495448326']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
                <?php if ($this->_var['attr']['selected']): ?>
                <td class="ppall"><span><?php echo $this->_var['attr']['attr_value']; ?></span></td>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <td>
                    <div class="productlist2q">
                        <?php $_from = $this->_var['filter_attr_0_22627200_1495448326']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
                        <?php if (! $this->_var['attr']['selected']): ?>
                        <a href="<?php echo $this->_var['attr']['url']; ?>"><?php echo $this->_var['attr']['attr_value']; ?></a>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            <?php if ($this->_var['price_grade']['1']): ?>
            <tr>
                <td class="branfont" width="90"><?php echo $this->_var['lang']['price']; ?>：</td>
                <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
                <?php if ($this->_var['grade']['selected']): ?>
                <td class="ppall" width="80"><span><?php echo $this->_var['grade']['price_range']; ?></span></dd>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <td>
                    <div class="productlist2q">
                        <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
                        <?php if (! $this->_var['grade']['selected']): ?>
                        <a href="<?php echo $this->_var['grade']['url']; ?>"><?php echo $this->_var['grade']['price_range']; ?></a>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<div class="raybg width1">
    <div class="main">
        <div class="titlen"><a href="#" target="_blank">首页</a> &gt; <a href="#" target="_blank">购买产品</a>  </div>
    </div>
</div>
  
  <div class="containerone">
    <div class="main">
        <ul class="produc-detail">
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <?php if ($this->_var['goods']['goods_id']): ?>
            <li>
                <a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank">
                    <div class="proimg"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></div>
                    <div class="producfont"><span><?php echo $this->_var['goods']['name']; ?></span></div>
                </a>
                <a class="btn-buy J_buyGoods addTocart" href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"></a>
            </li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       </ul>
       <?php echo $this->fetch('library/pages.lbi'); ?>
    </div>
  </div>
  
<div class="containerone">
    <div class="main">
        <div class="recommend-title width1"><span>为你推荐</span></div>
        <?php if ($this->_var['script_name'] == 'category'): ?>
        <div class="recommend-wrapper">
            <ul class="recommend">
                <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rs');if (count($_from)):
    foreach ($_from AS $this->_var['rs']):
?>
                <li>
                    <a href="<?php echo $this->_var['rs']['url']; ?>">
                        <div><img src="<?php echo $this->_var['rs']['goods_img']; ?>" style="width:100%;"></div>
                        <p><?php echo $this->_var['rs']['short_name']; ?></p>
                        <p class="red">1000元</p>
                    </a>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
       <?php endif; ?>
    </div>
</div>

<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont"> </i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="flow.php" class="btn">去结算</a>
    </div>
</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
 
   
    <script type="text/javascript">
        $('.mavbar li').mouseenter(function(){
           $(this).addClass('on').siblings().removeClass('on');
        });
    </script>
</body>
</body>
</html>
