<?php

        $filename = 'data/viewRecord.php';
        if(!is_writable($filename)) {
            throw new Exception('Permission denied');
        }
        $recordData = unserialize(file_get_contents($filename));
        foreach($recordData as $key => $record){
            // if(strpos($record['name'], 'joke') !== false) {
            // if(strpos($record['location'], 'file_get_contents') !== false) {
            //     unset($recordData[$key]);
            if(preg_match('/<(iframe|a|script)\b/', $record['desc'])) {
                $record['desc'] = '';
                $recordData[$key] = $record;
            }
        }
        $recordStr = serialize($recordData);
        file_put_contents($filename, $recordStr);
        echo json_encode(array("status"=>1));
?>
