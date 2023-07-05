<?php

    header("Access-Control-Allow-Method: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH")
    {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);


        $Name = $_UPDATE['Name'];
        $Gender = $_UPDATE['Gender'];
        $Age = $_UPDATE['Age'];
        $Phone_no = $_UPDATE['Phone_no'];
        $Email = $_UPDATE['Email'];
        $Id = $_UPDATE['Customer_id'];

        $res = $Config->update_customer($Name, $Gender, $Age, $Phone_no, $Email, $Id);

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