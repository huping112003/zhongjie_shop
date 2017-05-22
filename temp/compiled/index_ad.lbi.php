<div id="J_homeSlider" class="xm-slider" style="overflow:hidden;position:relative;">
	<div class="xm-slider-container" style="min-height:600px;">
    	<div class="xm-slider-control" style="text-align:center">
            <?php $_from = $this->_var['index_ad_w']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'index_ad_0_09864200_1495448327');if (count($_from)):
    foreach ($_from AS $this->_var['index_ad_0_09864200_1495448327']):
?>
            <div class="slide xm-slider-slide">
                <a target="_blank" href="<?php echo $this->_var['index_ad_0_09864200_1495448327']['url']; ?>" >
                    <img src="<?php echo $this->_var['index_ad_0_09864200_1495448327']['src']; ?>" />
                </a>
            </div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </div>
    <a class="xm-slider-previous xm-slider-navigation icon-slides icon-slides-prev prev" href="javascript:;" style="display:none;">上一张</a>
	<a class="xm-slider-next xm-slider-navigation icon-slides icon-slides-next next" href="javascript:;" style="display: none;">下一张</a>

</div>

<style>
    .xm-slider-control {
        position: relative;
    }
    .xm-slider-control img {
        position: absolute;
        left: 50%;
        width: 1920px;
        margin-left: -980px;
        min-width: 100%;
    }
</style>