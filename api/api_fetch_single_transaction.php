<?php

    header("Access-Control-Allow-Method: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $Config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Id = $_REQUEST['Transaction_id'];

        $res = $Config->fetch_single_transaction($Id);

        $record = mysqli_fetch_assoc($res);

        $arr['data'] = $record;
    }
    else
    {
        $arr['msg'] = "Only POST HTTP request method is allowed...";
    }

    echo json_encode($arr);

?>