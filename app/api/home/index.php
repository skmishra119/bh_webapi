<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods:  *");
header("Content-Type: application/json");

$app->get('/api/home', function(){
	$data['message'] = array('type'=>'success', 'msg'=>'Success');
	$data['data'] = 'Sample Data';
	echo json_encode($data);
});