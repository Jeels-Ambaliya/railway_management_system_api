<?php

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Date_Start = $_REQUEST['Date_start'];
        $Date_End = $_REQUEST['Date_end'];
        $Destination = $_REQUEST['Destination'];
        $Time_pick = $_REQUEST['Time_pick'];
        $Time_land = $_REQUEST['Time_land'];

        $res = $Config->insert_train_ticket($Date_Start, $Date_End, $Destination, $Time_pick, $Time_land);

        if($res)
        {
            $arr['data'] = "Record inserted successfully...";
            http_response_code(201);
        }
        else
        {
            $arr['data'] = "Record insertion failed...";
        }
    }
    else
    {
        $arr['msg'] = "Only POST HTTP request method is allowed...";
    }

    echo json_encode($arr);

?>