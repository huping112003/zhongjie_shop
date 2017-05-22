<?php echo $this->smarty_insert_scripts(array('files'=>'transport_jquery.js,utils.js')); ?>
<div id="ECS_ORDERTOTAL" class="money-box">
<ul>
  <?php if (0): ?>
  <li class="clearfix">
    <label><?php echo $this->_var['lang']['complete_acquisition']; ?>：</label>
    <span class="val">
      <?php if ($this->_var['config']['use_integral']): ?>
      <font class="f4_b"><?php echo $this->_var['total']['will_get_integral']; ?></font> <?php echo $this->_var['points_name']; ?>
      <?php endif; ?>
      <?php if ($this->_var['config']['use_integral'] && $this->_var['config']['use_bonus']): ?>，<?php echo $this->_var['lang']['with_price']; ?>  <?php endif; ?>
      <?php if ($this->_var['config']['use_bonus']): ?>
       <font class="f4_b"><?php echo $this->_var['total']['will_get_bonus']; ?></font><?php echo $this->_var['lang']['de']; ?><?php echo $this->_var['lang']['bonus']; ?>。
      <?php endif; ?>
    </span>
  </li>
  <?php endif; ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['goods_all_price']; ?>：</label><span class="val"><?php echo $this->_var['total']['goods_price_formated']; ?></span>
  </li>
  <?php if (0): ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['discount']; ?>：</label> <span class="val"> - <?php echo $this->_var['total']['discount_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if (0): ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['tax']; ?>：</label><span class="val">+ <?php echo $this->_var['total']['tax_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if (0): ?>
  <li class="clearfix" style="display:none;">
      <label><?php echo $this->_var['lang']['shipping_fee']; ?>：</label><span class="val">+ <?php echo $this->_var['total']['shipping_fee_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if (0): ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['insure_fee']; ?>：</label><span class="val">+ <?php echo $this->_var['total']['shipping_insure_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if (0): ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['pay_fee']; ?>：</label><span class="val">+ <?php echo $this->_var['total']['pay_fee_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if (0): ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['pack_fee']; ?>：</label><span class="val">+ <?php echo $this->_var['total']['pack_fee_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if ($this->_var['total']['card_fee'] > 0): ?>
  <li class="clearfix">
      <label><?php echo $this->_var['lang']['card_fee']; ?>：</label><span class="val">+ <?php echo $this->_var['total']['card_fee_formated']; ?></span>
  </li>
  <?php endif; ?>
  <?php if ($this->_var['total']['surplus'] > 0 || $this->_var['total']['integral'] > 0 || $this->_var['total']['bonus'] > 0): ?>
      <?php if ($this->_var['total']['surplus'] > 0): ?>
      <li class="clearfix">
      <label><?php echo $this->_var['lang']['use_surplus']; ?>：</label><span class="val">- <?php echo $this->_var['total']['surplus_formated']; ?></span>
      </li>
      <?php endif; ?>
      <?php if ($this->_var['total']['integral'] > 0): ?>
      <li class="clearfix">
      <label><?php echo $this->_var['lang']['use_integral']; ?>：</label><span class="val">- <?php echo $this->_var['total']['integral_formated']; ?></span>
      </li>
      <?php endif; ?>
      <?php if ($this->_var['total']['bonus'] > 0): ?>
      <li class="clearfix">
      <label><?php echo $this->_var['lang']['use_bonus']; ?>：</label><span class="val">- <?php echo $this->_var['total']['bonus_formated']; ?></span>
      </li>
      <?php endif; ?>
  <?php endif; ?>
  <li class="clearfix total-price">
      <label><?php echo $this->_var['lang']['total_fee']; ?>：</label> <span class="val"><em><?php echo $this->_var['total']['amount_formated']; ?></em></span>
      <?php if ($this->_var['is_group_buy']): ?><br />
      <?php echo $this->_var['lang']['notice_gb_order_amount']; ?><?php endif; ?>
      <?php if ($this->_var['total']['exchange_integral']): ?><br />
        <?php echo $this->_var['lang']['notice_eg_integral']; ?><font class="f4_b"><?php echo $this->_var['total']['exchange_integral']; ?></font>
        <?php endif; ?>
	</li>
</ul>
</div>
