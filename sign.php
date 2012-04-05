<?php

function get_location($ip) {
    $html = file_get_contents('http://ip.qq.com/cgi-bin/searchip?searchip1=' . $ip);
    $html = iconv('gb2312', 'utf-8', $html);
    $location = '';
    if(preg_match('/IP所在地为：<span>([\x{4e00}-\x{9fa5}]+)/u', $html, $city)) {
        $location = $city[1];
    }
    return $location;
}

try {
    if($_POST){
        // 写入文件
        $filename = 'data/viewRecord.php';
        if(!is_writable($filename)) {
            throw new Exception('Permission denied');
        }
        $recordData = unserialize(file_get_contents($filename));
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $data = array(
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'time'=>time(),
            'ip_addr' => $ip_addr,
            'location' => get_location($ip_addr)
        );
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
