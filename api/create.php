<?php

//headers
header('Access-control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Requested-With');


//initializing our api
include_once('../core/initialize.php');

//instantiate post
$post= new Post($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

//create post
if($post->create()){
    echo json_encode(
        array('message' => 'Post created.')
    );
}else{
    echo json_encode(
        array('message' => 'Post NOT created.')
    );
}