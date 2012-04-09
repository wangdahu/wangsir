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

/* function get_location($ip) { */
/*     $html = file_get_contents('http://ip138.com/ips.asp?action=2&ip=' . $ip); */
/*     $html = iconv('gb2312', 'utf-8', $html); */
/*     $location = ''; */
/*     if(preg_match('/<li>本站主数据：([\x{4e00}-\x{9fa5}]+)/u', $html, $city)) { */
/*         $location = $city[1]; */
/*     } */
/*     return $location; */
/* } */
$time = microtime(true);
echo get_location(isset($_GET['ip']) ? $_GET['ip'] : '220.231.140.74');
// echo "\n";
// echo "elapsed: " . sprintf('%.6f', microtime(true) - $time) . 's';
// header('Content-Type: text/plain');


