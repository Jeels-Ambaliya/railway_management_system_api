<?php

    header("Access-Control-Allow-Method: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH")
    {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);


        $Date_start = $_UPDATE['Date_start'];
        $Date_end = $_UPDATE['Date_end'];
        $Destination = $_UPDATE['Destination'];
        $Time_pick = $_UPDATE['Time_pick'];
        $Time_land = $_UPDATE['Time_land'];
        $Id = $_UPDATE['Ticket_id'];

        $res = $Config->update_train_ticket($Date_start, $Date_end, $Destination, $Time_pick, $Time_land, $Id);

        if($res)
        {
            $arr['data'] = "Record updated successfully...";
        }
        else
        {
            $arr['data'] = "Record updation failed...";
        }
    }
    else
    {
        $arr['msg'] = "Only PUT and PATCH HTTP request method is allowed...";
    }

    echo json_encode($arr);

?>