<?php
if($_POST){
    // 写入文件
    $recordData = unserialize(file_get_contents('viewRecord.php'));
    $data = array("name" => $_POST['name'], "desc" => $_POST['desc'], "time"=>time(), 'ip_addr' => $_SERVER['REMOTE_ADDR']);
    array_unshift($recordData, $data);

    $recordStr = serialize($recordData);
    file_put_contents('viewRecord.php', $recordStr);

    echo json_encode(array("status"=>1));

} else {
    echo "访问错误！{$a}";
}
