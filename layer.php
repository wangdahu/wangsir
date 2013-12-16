<link type="text/css" rel="stylesheet" href="./css/style.css">
<div class="floor layer">
  <form action="sign.php" method="post" id="sign_form">
    <div style="position: fixed; background-color: #DDD; line-height: 30px; min-width: 300px; left: 50%; top: 37.2%; margin-left: -150px; margin-top: -100px;" >
      <div style="background-color: #A7C5E2; padding-left:10px;"> What's Your Name?<span class="js-close" style="cursor: pointer; float: right; text-align: center; height: 30px; width: 30px; font-size:18px;">×</span></div>
      <div style="margin: 5px 10px;">
        <input type="search" name="name" required placeholder="您的大名" autofocus size="10" maxlength="10" /><span style="color: red;">*</span> 到此一游!<br />
        <textarea name="desc" rows="4" cols="30" placeholder="好空好空，您老人家给点好点子咯！拒绝灌水!!!"></textarea><br />
        <input type="hidden" name="ip_addr" id="ip_addr" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" />
        <input type="hidden" name="location" id="location" value="未获取" />
        <span style="float: right; margin-right: 10px;"><button type="submit">签名</button></span>
      </div>
    </div>
  </form>
</div>
<div class="header">
  <span style="float: right;">
    <button class="sign" style="font-size: 20px; color: red">签到</button>
  </span>
  <a href="index.php">WangSir</a>
  <a href="signlist.php">签到表</a>
</div>
