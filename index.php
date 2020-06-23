<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'config/db_config.php';

$app = new \Slim\App;

$app->get('/', function() {
    $retVal=array('Name'=>'Vineet Mishra','Pwd'=>'ABCDEFGH','Login'=>'Success');
  return json_encode($retVal);
});

/*$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});*/

require_once('app/api/home/index.php');
require_once('app/api/users/index.php');


$app->run();
