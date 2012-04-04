<?php
if($_POST){
    // 写入文件
    $recordData = unserialize(require('viewRecord.php'));
    $data = array("name" => $_POST['name'], "desc" => $_POST['desc'], "time"=>time());
    array_unshift($recordData, $data);

    $recordStr = '<?php
    return \''.serialize($recordData).'\';';
    file_put_contents('viewRecord.php', $recordStr);

    echo json_encode(array("status"=>1));

} else {
    echo "访问错误！{$a}";
}