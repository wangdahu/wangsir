<?php

try {
    if($_POST){
        // 写入文件
        $filename = 'data/viewRecord.php';
        if(!is_writable($filename)) {
            throw new Exception('Permission denied');
        }
        $recordData = unserialize(file_get_contents($filename));
        $data = array(
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'time'=>time(),
            'ip_addr' => $_POST['ip_addr'],
            'location' => $_POST['location']
        );
        $first = $recordData['0'];
        if($_POST['ip_addr'] != $_SERVER['REMOTE_ADDR']){
            throw new Exception("同志们阿!不要乱搞阿!");
        } else  if($_POST['ip_addr'] == $first['ip_addr'] && time() - $first['time'] < 50){
            throw new Exception("不要灌水哦");
        }
        array_unshift($recordData, $data);

        $recordStr = serialize($recordData);
        file_put_contents($filename, $recordStr);
        echo json_encode(array("status"=>1));
    } else {
        throw new Exception('访问错误！');
    }
} catch(Exception $e) {
    echo json_encode(array('status'=>0, 'msg' => $e->getMessage()));
}
