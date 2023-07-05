<?php

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Customer_id = $_REQUEST['Customer_id'];
        $Admin_id = $_REQUEST['Admin_id'];
        $Ticket_id = $_REQUEST['Ticket_id'];
        $Date_Reserve = $_REQUEST['Date_Reserve'];

        $res = $Config->insert_Reservation($Customer_id, $Admin_id, $Ticket_id, $Date_Reserve);

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