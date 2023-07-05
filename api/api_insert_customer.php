<?php

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Name = $_REQUEST['Name'];
        $Gender = $_REQUEST['Gender'];
        $Age = $_REQUEST['Age'];
        $Phone_no = $_REQUEST['Phone_no'];
        $Email = $_REQUEST['Email'];

        $res = $Config->insert_customer($Name, $Gender, $Age, $Phone_no, $Email);

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