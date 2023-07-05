<?php

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Trans_name = $_REQUEST['Trans_name'];

        $res = $Config->insert_transaction_type($Trans_name);

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