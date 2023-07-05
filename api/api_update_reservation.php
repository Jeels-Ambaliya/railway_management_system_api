<?php

    header("Access-Control-Allow-Method: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH")
    {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);


        $Customer_id = $_UPDATE['Customer_id'];
        $Admin_id = $_UPDATE['Admin_id'];
        $Ticket_id = $_UPDATE['Ticket_id'];
        $Date_Reserve = $_UPDATE['Date_Reserve'];
        $Id = $_UPDATE['Reservation_id'];

        $res = $Config->update_Reservation($Customer_id, $Admin_id, $Ticket_id, $Date_Reserve, $Id);

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