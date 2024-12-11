<?php
    $mydata = $_GET;
    
    $sum1 = $_GET['num1'];
    $sum2 = $_GET['num2'];
    $opt = $_GET['opt'];
    $ret = 0;
    switch($opt)
    {
        case '+':
            $ret = $sum1+$sum2;
            //echo "+";
            break;
        case '-':
            $ret = $sum1-$sum2;
            //echo "-";
            break;
        case '*':
            $ret = $sum1*$sum2;
            //echo "*";
            break;
        case '/':
            $ret = $sum1/$sum2;
            //echo "/";
            break;

    }
    $retData = [
        'sum1'=>$sum1,
        'opt'=>$_GET['opt'],
        'sum2'=>$sum2,
        'ret'=>$ret,
    ];
    /*
    echo "<pre>";
    print_r($mydata);
    print_r($retData);
    echo "</pre>";
    */
    //$rdata = json_encode($retData);
    echo json_encode($retData);