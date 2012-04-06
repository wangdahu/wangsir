<!DOCTYPE HTML>
<html>
  <head>
    <title>Welcome to WangSir.info</title>
  </head>
  <body>
    <div style="position: fixed; top: 0; right: 0px; left: 0px; padding:0 10px; line-height: 30px; background-color: #F0F0F0; border: solid 1px #DDD;">
      <a href="index.php">WangSir</a>
      <a href="signlist.php">签到表</a>
      <span style="float: right;">
        <button class="sign" style="font-size: 20px; color: red">签到</button>
      </span>
    </div>
    <form method="post">
      <div style=" margin-top: 50px;">
        <p>帐号: <input name="user" type="search" size="12" value="wangsir" /></p>
        <p>密码: <input type="password" name="password" /></p>
        <p><input type="submit" name="submit" value="登录"/></p>
      </div>
    </form>
  <?php include "bottom.php"; ?>
  </body>
</html>
<?php
     var_dump($_COOKIE);
     if($_POST){
         if($_POST['name'] != "wangsir" && $_POST['password'] != ".info"){
             echo "账户和密码错误!";
             setcookie("admin_user", true, time()-3600);
         }else{
             session_start();
             setcookie("admin_user", true, time()+3600);
         }
     }
?>
