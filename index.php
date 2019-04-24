<?php
    require_once('app/config/config.php');
 
    session_start();
    $loginId = isset($_SESSION['accId'])? $_SESSION['accId']:'' ;
    
    $requestUri = $_SERVER['REQUEST_URI'];
    $URL = strtok($_SERVER["REQUEST_URI"], '?');
    
    function checkLogoutNgo2Home($isLogin) {
        if(!$isLogin) {
            header("Location: ".WEB_DOMAIN_URL);
            exit();
        }
    };

    if($URL === '/') {
        if($loginId) {
            header("Location: ".'/customers/'.$loginId);
            exit();
        }
        include(APP.'/home.php');
        exit();

    } else if(preg_match('/\/customers\/\d+$/', $URL)) {

        checkLogoutNgo2Home($loginId);
        include(APP.'/customers.php');
        exit();

    } else if($URL === '/api/login') {

        include(APP.'/api/login.php');
        exit();

    } else if($URL === '/api/logout') {
        
        include(APP.'/api/logout.php');
        exit();

    } else if($URL === '/about-locker') {
        
        include(APP.'/locker.php');
        exit();

    } else if($URL === '/apply-for-locker') {
        
        checkLogoutNgo2Home($loginId);
        include(APP.'/apply-for-locker.php');
        exit();

    } else if($URL === '/api/apply_locker') {

        checkLogoutNgo2Home($loginId);
        include(APP.'/api/apply_locker.php');
        exit();

    } else {
        
        echo 'Sorry, This page not found';
        exit();

    }
    
?>
