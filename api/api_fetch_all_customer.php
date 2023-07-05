<?php

    header("Access-Control-Allow-Method: GET");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
       

        $res = $Config->fetch_all_customers();

        $all_records = [];

        while($record = mysqli_fetch_assoc($res))
        {
            array_push($all_records, $record);
        }

        $arr['data'] = $all_records;
    }
    else
    {
        $arr['msg'] = "Only GET HTTP request method is allowed...";
    }

    echo json_encode($arr);

?>