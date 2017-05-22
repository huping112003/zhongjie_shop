<div class="containerone">
  <div class="main">
    
    <div class="login-header width1">
      <p><a href="#"><img src="themes/luntai/images/ico12.png"></a></p>
      <h3>中杰账号登录</h3>
    </div>
    
    <div class="login_body">
      <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
          <div class="loginbox">
             <label><input type="text" name="username" placeholder="请输入你的用户名"  class="logintxt"></label>
             <label><input type="password" name="password" placeholder="请输入密码" class="logintxt"></label>
             <?php if ($this->_var['enabled_captcha']): ?>
             <label>
                <input type="text" name="captcha" placeholder="图片验证" class="logintxt2">
                <span>
                    <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" class="code-img" onClick="this.src='captcha.php?is_login=1&'+Math.random()"  style="width:140px;height:50px;" />
                </span>
             </label>
             <?php endif; ?>
             <input type="hidden" name="act" value="act_login" />
             <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
             <label><input type="submit" name="submit" value="登录" class="loginbtn us_Submit"></label>
          </div>
      </form>
    </div>
    
    <div class="login_link width1" id="custom_display_64"><a href="user.php?act=register">注册中杰帐号</a><span>|</span><a href="">忘记密码？</a> </div>
  </div>
</div>
