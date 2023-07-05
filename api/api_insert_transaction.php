<?php

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $TransTy_id = $_REQUEST['TransTy_id'];
        $Reservation_id = $_REQUEST['Reservation_id'];
        $Admin_id = $_REQUEST['Admin_id'];
        $Customer_id = $_REQUEST['Customer_id'];
        $Transaction_date = $_REQUEST['Transaction_date'];

        $res = $Config->insert_transaction($TransTy_id, $Reservation_id, $Admin_id, $Customer_id, $Transaction_date);

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