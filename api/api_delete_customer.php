<?php

    header("Access-Control-Allow-Method: DELETE");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "DELETE")
    {
        
        $input = file_get_contents('php://input');

        parse_str($input, $_DELETE);

        $Id = $_DELETE['Customer_id'];

        $res = $Config->delete_customer($Id);

        if($res)
        {
            $arr['data'] = "Record Deleted successfully...";
        }
        else
        {
            $arr['data'] = "Record ideletion failed...";
        }
    }
    else
    {
        $arr['msg'] = "Only DELETE HTTP request method is allowed...";
    }

    echo json_encode($arr);

?>