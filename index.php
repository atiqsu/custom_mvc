<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 12:59 PM
 */

session_start();

date_default_timezone_set('UTC');
//date_default_timezone_set('Asia/Dhaka');

require './config.php';
require './helpers.php';
require './routes.php';

$files = glob('./Core/*.php');

foreach ($files as $file) { require($file); }

$files = glob('./Controller/*Controller.php');

foreach ($files as $file) { require($file); }

$files = glob('./Model/*.php');

foreach ($files as $file) { require($file); }


$urlInfo = parse_url($_SERVER['REQUEST_URI']);

if(array_key_exists($urlInfo['path'], $routes)) {

    $con = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['database'], $dbConfig['port']);

    if (mysqli_connect_errno()) {

        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    $configObj = new \App\Core\Config();

    $configObj->setSalt($salt);
    $configObj->setDbConnection($con);

    $cmStr = $routes[$urlInfo['path']];

    $cmStr = explode('@', $cmStr, 2);

    $controller = '\Controller\\'.$cmStr[0];

    $ins    = new $controller($configObj);
    $method = $cmStr[1];

    $response = $ins->$method($_REQUEST);

    if(is_array($response)) {

        echo json_encode($response);

        return;
    }

    echo $response;

    return;
}

header('HTTP/1.1 404 Not Found');
die('Redirecting to 404 page...... url not defined.');

