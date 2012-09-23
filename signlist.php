<!DOCTYPE HTML>
<html>
    <head>
      <title>Welcome to WangSir.info</title>
    </head>
    <link href=”http://fonts.googleapis.com/css?family=Reenie+Beanie:regular” rel=”stylesheet” type=”text/css”>
    <link type="text/css" rel="stylesheet" href="./css/list.css">
    <body>
    <?php include "layer.php"; ?>

    <ul>
        <?php
             $recordData = unserialize(file_get_contents('data/viewRecord.php'));
             foreach($recordData as $key => $record):
        ?>
        <li>
            <a href="javascript:;">
                <h2><?php echo htmlspecialchars($record['name'])."："; ?></h2>
                <p>
                    <?php echo htmlspecialchars($record['desc'], ENT_QUOTES); ?>
                </p>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
  <?php include "bottom.php"; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="js/layer.js"></script>
</html>
