<?php

    header("Access-Control-Allow-Method: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH")
    {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);


        $TransTy_id = $_UPDATE['TransTy_id'];
        $Reservation_id = $_UPDATE['Reservation_id'];
        $Admin_id = $_UPDATE['Admin_id'];
        $Customer_id = $_UPDATE['Customer_id'];
        $Transaction_date = $_UPDATE['Transaction_date'];
        $Id = $_UPDATE['Transaction_id'];

        $res = $Config->update_transaction($TransTy_id, $Reservation_id, $Admin_id, $Customer_id, $Transaction_date, $Id);

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