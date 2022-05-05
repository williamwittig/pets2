<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create instance of the base class
$f3 = Base::instance();

session_start();

// Define a default route
// Home page rendering
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/pet-home.html');
});

$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

$f3->route('POST /order2', function() {
//    var_dump($_POST);

    $_SESSION['petType'] = $_POST['petType'];
    $_SESSION['inputColor'] = $_POST['inputColor'];

    $view = new Template();
    echo $view->render('views/pet-order2.html');
});
$f3->route('POST /order3', function() {
//    var_dump($_POST);

    $_SESSION['petName'] = $_POST['petName'];

    $view = new Template();
    echo $view->render('views/pet-order3.html');
});

$f3->route('POST /summary', function() {
//    var_dump($_POST);

    $_SESSION['petSize'] = $_POST['petSize'];

    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run fat free
$f3->run();