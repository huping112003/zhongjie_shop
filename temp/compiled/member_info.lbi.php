<?php if ($this->_var['user_info']): ?>
    <div class="welcome floatleft">hi 欢迎来到中杰轮胎 &nbsp;&nbsp;&nbsp;  <a href="user.php" target="_blank"><?php echo $this->_var['user_info']['username']; ?></a>/<a href="user.php?act=logout" target="_blank">退出</a></div>
<?php else: ?>
    <div class="welcome floatleft">hi 欢迎来到中杰轮胎 &nbsp;&nbsp;&nbsp;  <a href="user.php" target="_blank">登录</a>/<a href="user.php?act=register" target="_blank">注册</a></div>
<?php endif; ?>
