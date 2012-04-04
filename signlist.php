<!DOCTYPE HTML>
<html>
  <head>
    <title>Welcome to WangSir.info</title>
  </head>
  <body>
    <div style="position: fixed; top: 0px; right: 0px; left: 0px; padding-left: 10px; background-color: #F0F0F0; border: solid 1px #DDD;">
      <a href="index.php">WangSir</a>
      <a href="signlist.php">签到表</a>
      <span style="margin-left: 83%;">
      <button class="sign" ><span style="font-size: 20px; color: red">签到</span></button>
      </span>
    </div>
    <div style="margin-left: 10px; margin-top: 50px;">
        <?php
            $recordData = unserialize(require('viewRecord.php'));
            foreach($recordData as $record):
        ?>
        <div style=" border-bottom: solid 1px #DDD;">
          <p>来者：<span><?php echo $record['name']; ?></span></p>
          <p>意见：<span><?php echo $record['desc']; ?></span></p>
          <p>访问时间：<span><?php echo date('Y-m-d H:i', $record['time']); ?></span></p>
        </div>
      <?php endforeach; ?>
    </div>
        
    <div style='position: fixed; bottom: 20px; right: 30px;' title='点击进入无良空间'>
      <a target="_blank" title="点击进入无良空间" href="http://553784858.qzone.qq.com/">无良杂种</a>  2012-03-31
    </div>
  </body>
</html>
