<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 12:59 PM
 */


$files = glob('./Controller/*Controller.php');

foreach ($files as $file) { require($file); }

require './helpers.php';
require './routes.php';
require './config.php';


$urlInfo = parse_url($_SERVER['REQUEST_URI']);

if(array_key_exists($urlInfo['path'], $routes)) {

    $con = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['database'], $dbConfig['port']);

    if (mysqli_connect_errno()) {

        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    $cmStr = $routes[$urlInfo['path']];

    $cmStr = explode('@', $cmStr, 2);

    $controller = '\Controller\\'.$cmStr[0];

    $ins    = new $controller;
    $method = $cmStr[1];

    $response = $ins->$method();

    if(is_array($response)) {

        echo json_encode($response);

        return;
    }

    echo $response;

    return;
}

header('HTTP/1.1 404 Not Found');
die('Redirecting to 404 page...... url not defined.');

