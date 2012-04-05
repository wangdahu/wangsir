<link type="text/css" rel="stylesheet" href="./css/style.css">
<div class="floor layer">
  <form action="sign.php" method="post" id="sign_form">
    <div style="position: fixed; text-align: left; margin: 25% 40%; background-color: #DDD; line-height: 30px; min-width: 300px; " >
      <div style="background-color: #A7C5E2; padding-left:10px;"> What's Your Name?<span class="js-close" style="cursor: pointer; float: right; margin-right:3px; padding:0 4px 0;">⨉</span></div>
      <div style="margin: 5px 10px;">
        <input type="search" name="name" required placeholder="您的大名" autofocus size="10" maxlength="10" /><span style="color: red;">*</span> 到此一游!<br />
        <textarea name="desc" rows="4" cols="30" placeholder="好空好空，您老人家给点好点子咯！拒绝灌水!!!"></textarea><br />
        <span style="float: right; margin-right: 10px;"><button type="submit">签名</button></span>
      </div>
    </div>
  </form>
</div>
<div class="header">
  <a href="index.php">WangSir</a>
  <a href="signlist.php">签到表</a>
  <span style="float: right;">
    <button class="sign" style="font-size: 20px; color: red">签到</button>
  </span>
</div>
