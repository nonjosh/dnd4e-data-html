<?php

header('Content-Type: application/json');

$json_response = array();
$json_response['request'] = $_GET;
$json_response['data'] = $final_output;

echo json_encode($json_response);