<?
// 获取页面的状态码
function GetHttpStatusCode($url){
    // echo @file_get_contents($url);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($curl);
    $rtn= curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return  $rtn;
}

$ip = "220.152.210.123";
$urls = array(  "http://www.ip138.com/ips1388.asp?ip=wangsir.info&action=2",
                "http://ip.qq.com/cgi-bin/searchip?searchip1=$ip",
                "http://www.baidu.com",
                "http://www.google.com");
// function flush(){
//     echo(str_repeat(' ',256));
//     // check that buffer is actually set before flushing
//     if (ob_get_length()){
//         @ob_flush();
//         @flush();
//         @ob_end_flush();
//     }
//     @ob_start();
// }
// ob_start();
foreach($urls as $url) {
    echo GetHttpStatusCode($url). ":  $url <br/>";
    echo(str_repeat(' ', 1024*1024));
    // ob_flush();
    flush();
}
?>
