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
            foreach($recordData as $key => $record):
        ?>
        <div style=" border-bottom: solid 1px #DDD; <?php echo ($key%2) ? 'color: red; ' : ''?>" >
          <?php if(isset($_COOKIE['admin_user'])):?><span style="float: right; padding-right: 20px;">X</span><?php endif;?>
          <p>来者：<span><?php echo htmlspecialchars($record['name']); ?></span></p>
          <p>意见：<span><?php echo htmlspecialchars($record['desc'], ENT_QUOTES); ?></span></p>
          <p>访问时间：<span><?php echo date('Y-m-d H:i', $record['time']); ?></span></p>
          <p>访问地区：<span><?php echo isset($record['location']) ? $record['location'] : 'Unknown' ?></span></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php include "bottom.php"; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="js/layer.js"></script>
</html>
