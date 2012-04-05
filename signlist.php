<!DOCTYPE HTML>
<html>
  <head>
    <title>Welcome to WangSir.info</title>
  </head>
  <body>
    <?php include "layer.php"; ?>
    
    <div style="margin-left: 10px; margin-top: 50px;">
        <?php
            $recordData = unserialize(file_get_contents('data/viewRecord.php'));
            foreach($recordData as $record):
        ?>
        <div style=" border-bottom: solid 1px #DDD;">
          <p>来者：<span><?php echo $record['name']; ?></span></p>
          <p>意见：<span><?php echo $record['desc']; ?></span></p>
          <p>访问时间：<span><?php echo date('Y-m-d H:i', $record['time']); ?></span>&nbsp;From: <?php echo isset($record['location']) ? $record['location'] : 'Unknown' ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php include "bottom.php"; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="js/layer.js"></script>
</html>
