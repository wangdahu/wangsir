<?php
try {
    if($_POST){
        // 写入文件
        $filename = 'viewRecord.php';
        if(!is_writable($filename)) {
            throw new Exception('Permission denied');
        }
        $recordData = unserialize(file_get_contents($filename));
        $data = array("name" => $_POST['name'], "desc" => $_POST['desc'], "time"=>time(), 'ip_addr' => $_SERVER['REMOTE_ADDR']);
        array_unshift($recordData, $data);

        $recordStr = serialize($recordData);
        file_put_contents('viewRecord.php', $recordStr);

        echo json_encode(array("status"=>1));
    } else {
        throw new Exception('访问错误！');
    }
} catch(Exception $e) {
    echo json_encode(array('status'=>0, 'msg' => $e->getMessage()));
}
