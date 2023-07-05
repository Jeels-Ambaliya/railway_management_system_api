<?php

    header("Access-Control-Allow-Method: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH")
    {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);


        $Trans_name = $_UPDATE['Trans_name'];
        $Id = $_UPDATE['TransTy_id'];

        $res = $Config->update_transaction_type($Trans_name, $Id);

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