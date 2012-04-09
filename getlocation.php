<?php

function get_location($ip) {
    $services = array(
        array('url' => "http://ip138.com/ips.asp?action=2&ip=$ip", 'reg' => '/<li>本站主数据：([\x{4e00}-\x{9fa5}]+)/u'),
        array('url' => "http://ip.qq.com/cgi-bin/searchip?searchip1=$ip", 'reg' => '/IP所在地为：<span>([\x{4e00}-\x{9fa5}]+)/u')
    );
    $location = '';
    foreach($services as $service) {
        $html = @file_get_contents($service['url']);
        if($html && ($html = iconv('gb2312', 'utf-8', $html)) && preg_match($service['reg'], $html, $city)) { 
            $location = $city[1];
            break;
        }
    }
    return $location;
} 
$time = microtime(true);
echo get_location(isset($_GET['ip']) ? $_GET['ip'] : '220.231.140.74');
// echo "\n";
// echo "elapsed: " . sprintf('%.6f', microtime(true) - $time) . 's';
// header('Content-Type: text/plain');
