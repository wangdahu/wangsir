<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome to wangsir</title>
</head>
<body>
  <div class="floor" style="background-color: rgba(0, 0, 0, .4); position: absolute; margin:0; left: 0; right: 0; top: 0; bottom: 0; text-align: center; display: none;z-index:1;">
    <form action="#">
      <div style="position: fixed; text-align: left; margin: 25% 40%; background-color: #DDD; line-height: 30px; min-width: 300px; " >
        <div style="background-color: #A7C5E2; padding-left:10px;"> What's Your Name?</div>
        <div style="margin: 5px 10px;">
          <input type="search" name="name" size="10"  />到此一游!<br />
          <textarea rows="5" cols="30"></textarea><br />
          <span style="float: right; margin-right: 10px;"><button type="submit">签名</button></span>
        </div>
      </div>
    </form>
  </div>
<div style="position: fixed; top: 10px; right: 20px; padding-right: 20px;">
  <button class="sign"><span style="font-size: 20px; color: red">签到</span></button>
</div>
<pre style="text-align: center; margin-top: 15%;">
`7MMF'     A     `7MF' db      `7MN.   `7MF' .g8"""bgd   .M"""bgd `7MMF'`7MM"""Mq.
  `MA     ,MA     ,V  ;MM:       MMN.    M .dP'     `M  ,MI    "Y   MM    MM   `MM.
   VM:   ,VVM:   ,V  ,V^MM.      M YMb   M dM'       `  `MMb.       MM    MM   ,M9
    MM.  M' MM.  M' ,M  `MM      M  `MN. M MM             `YMMNq.   MM    MMmmdM9
    `MM A'  `MM A'  AbmmmqMA     M   `MM.M MM.    `7MMF'.     `MM   MM    MM  YM.
     :MM;    :MM;  A'     VML    M     YMM `Mb.     MM  Mb     dM   MM    MM   `Mb.
      VF      VF .AMA.   .AMMA..JML.    YM   `"bmmmdPY  P"Ybmmd"  .JMML..JMML. .JMM.
</pre>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div style='position: fixed; bottom: 20px; right: 30px;'>无良杂种  2012-03-31</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    $(function(){
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
        $(".sign").click(function(){
            $(".floor").togglepop();
        });
        $(document).keydown(function(e){
            if(e.keyCode == 27) {
                $(".floor").is(":visible") && $(".floor").togglepop();
            }
        });
    });
</script>
</html>
