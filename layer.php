<?php

$layer ='
  <div class="floor" style="background-color: rgba(0, 0, 0, .4); position: absolute; margin:0; left: 0; right: 0; top: 0; bottom: 0; text-align: center; display: none;z-index:1;">
    <form action="sign.php" method="post" id="sign_form">
      <div style="position: fixed; text-align: left; margin: 25% 40%; background-color: #DDD; line-height: 30px; min-width: 300px; " >
        <div style="background-color: #A7C5E2; padding-left:10px;"> What\'s Your Name?</div>
        <div style="margin: 5px 10px;">
          <input type="search" name="name" required placeholder="您的大名" autofocus size="10" maxlength="10" /><span style="color: red;">*</span> 到此一游!<br />
          <textarea name="desc" rows="4" cols="30" placeholder="好空好空，您老人家给点好点子咯！"></textarea><br />
          <span style="float: right; margin-right: 10px;"><button type="submit">签名</button></span>
        </div>
      </div>
    </form>
  </div>
<div style="position: fixed; top: 0px; right: 0px; left: 0px; padding-left: 10px; background-color: #F0F0F0; border: solid 1px #DDD;">
      <a href="index.php">WangSir</a>
      <a href="signlist.php">签到表</a>
      <span style="margin-left: 83%;">
      <button class="sign" ><span style="font-size: 20px; color: red">签到</span></button>
      </span>
    </div>';
return $layer;