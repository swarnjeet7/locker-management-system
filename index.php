<?php
    require_once('app/config/config.php');
 
    session_start();
    $loginId = isset($_SESSION['accId']);
    

    $requestUri = $_SERVER['REQUEST_URI'];
    $URL = strtok($_SERVER["REQUEST_URI"], '?');

    if($URL === '/') {
        if($loginId) {
            header("Location: ".'/customers/'.$loginId);
        }
        include(APP.'/home.php');
        exit();
    } else if(preg_match('/\/customers\/\d+$/', $URL)) {
        if(!$loginId) {
            header("Location: ".WEB_DOMAIN_URL);
        }
        // $userId = $_SESSION['username'];
        include(APP.'/customers.php');
        exit();
    } else if($URL === '/api/login') {
        include(APP.'/api/login.php');
        exit();
    } else if($URL === '/api/logout') {
        include(APP.'/api/logout.php');
        exit();
    } else if($URL === '/apply-for-locker') {
        include(APP.'/locker.php');
        exit();
    } else if($URL === '/applied-locker') {
        include(APP.'/applied-locker.php');
        exit();
    } else {
        echo 'Sorry, This page not found';
        exit();
    }
    
?>
