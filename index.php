<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome to WangSir.info</title>
</head>
<body>

  <div class="floor" style="background-color: rgba(0, 0, 0, .4); position: absolute; margin:0; left: 0; right: 0; top: 0; bottom: 0; text-align: center; display: none;z-index:1;">
    <form action="sign.php" method="post" id="sign_form">
      <div style="position: fixed; text-align: left; margin: 25% 40%; background-color: #DDD; line-height: 30px; min-width: 300px; " >
        <div style="background-color: #A7C5E2; padding-left:10px;"> What's Your Name?</div>
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
      <button class="sign"><span style="font-size: 20px; color: red">签到</span></button>
    </span>
  </div>

<pre style="padding-left: 25%; margin-top: 17%; color: #26709A;">
`7MMF'     A     `7MF' db      `7MN.   `7MF'  .g8"""bgd   .M"""bgd `7MMF' `7MM"""Mq.
  `MA     ,MA     ,V' ;MM:       MMN.    M  .dP'     `M  ,MI    "Y   MM     MM   `MM.
   VM:   ,VVM:   ,V' ,V^MM.      M YMb   M  dM'       `  `MMb.       MM     MM   ,M9'
    MM. ,M' MM. ,M' ,M  `MM      M  `MN. M  MM             `YMMNq.   MM     MMmmdM9
    `MM A'  `MM A'  AbmmmqMA     M   `MM.M  MM.    `7MMF'.     `MM   MM     MM  YM.
     :MM;    :MM;  A'     VML    M     YMM  `Mb.     MM  Mb     dM   MM     MM   `Mb.
      VF      VF .AMA.   .AMMA..JML.    YM    v"bmmmdPY  P"Ybmmd"  .JMML. .JMML. .JMM.
</pre>
<div style='position: fixed; bottom: 20px; right: 30px;' title='点击进入无良空间'>
    <a target="_blank" title="点击进入无良空间" href="http://553784858.qzone.qq.com/">无良杂种</a>  2012-03-31
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(function(){
    // 弹出控制
    $.fn.extend({
        togglepop: function() {
            if(this.css('display') == 'none') {
                this.data('overflowY', $(document.body).css('overflowY'));
                $(document.body).css('overflowY', 'hidden');
            }
            this.toggle();
            if(this.css('display') == 'none') {
                $(document.body).css('overflowY', this.data('overflowY'));
            }
        }
    });

    // 点击弹出
    $(".sign").click(function(){
        $(".floor").togglepop();
    });

    // Esc 弹出消失
    $(document).keydown(function(e){
        if(e.keyCode == 27) {
            $(".floor").is(":visible") && $(".floor").togglepop();
        }
    });

    // 签名提交
    $("#sign_form").submit(function(){
        $.post(this.action, $(this).serialize(), function(json){
            if(json.status == 0){
                alert("Sorry, 签到失败!");
            }
        }, 'json');
        $(".floor").togglepop();
        return false;
    });


});

</script>
</html>
