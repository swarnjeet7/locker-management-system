<?php
    require_once('app/config/config.php');

    session_start();

    $requestUri = $_SERVER['REQUEST_URI'];
    $URL = strtok($_SERVER["REQUEST_URI"], '?');

    if($URL === '/') {
        if(isset($_SESSION['username'])) {
            header("Location: ".'/customers/'. $_SESSION['username']);
        }
        include(ROOT.'/app/home.php');
        exit();
    } else if(preg_match('/\/customers\/\d+$/', $URL)) {
        if(!isset($_SESSION['username'])) {
            header("Location: ".WEB_DOMAIN_URL);
        }
        $userId = $_SESSION['username'];
        include(ROOT.'/app/customers.php');
        exit();
    } else if($URL === '/api/login') {
        include(ROOT.'/api/login.php');
        exit();
    } else if($URL === '/api/logout') {
        include(ROOT.'/api/logout.php');
        exit();
    } else if($URL === '/apply-for-locker') {
        include(ROOT.'/app/locker.php');
        exit();
    } else if($URL === '/applied-locker') {
        include(APP.'/applied-locker.php');
        exit();
    } else {
        echo 'Sorry, This page not found';
        exit();
    }
    
?>
