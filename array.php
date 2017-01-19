<?php
    //Setting the MIME type for JSON output
    header("Content-Type: text/json");

    $fibArray = array();
    $fibNum = 0;
    $i = 0;
    $num = $_SERVER['QUERY_STRING'];

    //making the JSON record info
    $jsonInfo = array('status'   => 200,
                      'success'  => true,
                      'version'  => 'JSON-Array-0.1',
                      'Fibonacci'=> $num);

    //Making Assosiative array of Fibonacci numbers
    while($i <= $num) {
        if($i > 1) {
            $fibNum = $fibArray[$i-2] + $fibArray[$i-1];
        }
        else {
            $fibNum = $i;
        }
        $fibArray[$i] = $fibNum;
        $i++;
    }

    //adding Fibonacci array info the jsonInfo array
    $jsonInfo['numbers'] = $fibArray;

    //encoding JSON Record
    $jsondata = json_encode($jsonInfo, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);

    //print json record
    echo $jsondata . "\n";
    // echo "\n";
?>