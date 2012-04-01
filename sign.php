<?php
$db = sqlite_open('mysqlitedb', 0666, $sqliteerror);
if($db){
    echo "";
}else{
    die($sqliteerror);
}