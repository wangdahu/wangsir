<?php

function get_location($ip) {
    $html = file_get_contents('http://ip138.com/ips.asp?action=2&ip=' . $ip);
    $html = iconv('gb2312', 'utf-8', $html);
    $location = '';
    if(preg_match('/<li>本站主数据：([\x{4e00}-\x{9fa5}]+)/u', $html, $city)) {
        $location = $city[1];
    }
    return $location;
}

function timelog($log) {
    file_put_contents('data/time.log', $log, FILE_APPEND);
}

try {
    if($_POST){
        $start = microtime(true);
        // 写入文件
        $filename = 'data/viewRecord.php';
        if(!is_writable($filename)) {
            throw new Exception('Permission denied');
        }
        $recordData = unserialize(file_get_contents($filename));
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $time_location = microtime(true);
        $location = get_location($ip_addr);
        $log_location = sprintf('get location: %.6fs', microtime(true) - $time_location);
        $data = array(
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'time'=>time(),
            'ip_addr' => $ip_addr,
            'location' => $location
        );
        array_unshift($recordData, $data);

        $recordStr = serialize($recordData);
        file_put_contents($filename, $recordStr);
        timelog(sprintf("get all: %.6f\t%s\n", microtime(true) - $start, $log_location));
        echo json_encode(array("status"=>1));
    } else {
        throw new Exception('访问错误！');
    }
} catch(Exception $e) {
    echo json_encode(array('status'=>0, 'msg' => $e->getMessage()));
}
