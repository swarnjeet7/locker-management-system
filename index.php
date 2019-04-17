<?php
    require_once('app/config/config.php');

    if(!define("MYAPP", $_SERVER['DOCUMENT_ROOT'].'/app')) {
        define("MYAPP", $_SERVER['DOCUMENT_ROOT'].'/app');
    }
    session_start();
    $loginId = isset($_SESSION['accId'])? $_SESSION['accId']:'' ;
    
    $requestUri = $_SERVER['REQUEST_URI'];
    $URL = strtok($_SERVER["REQUEST_URI"], '?');
    $queryParams = parse_url($requestUri, PHP_URL_QUERY);;

    function checkLogoutNgo2Home($isLogin) {
        if(!$isLogin) {
            header("Location: ".WEB_DOMAIN_URL);
            exit();
        }
    };

    // echo $URL; die;
    
    if($URL === '/') {

        if($loginId) {
            header("Location: ".'/customers/'.$loginId);
            exit();
        }
        $bodyClass = 'home-body';
        $content_for_layout = APP. '/home.php';
        include(MYAPP.'/layout/simple_layout.php');
        exit();

    } else if(preg_match('/\/customers\/\d+$/', $URL)) {

        checkLogoutNgo2Home($loginId);
        $stickyFooter = true;
        $content_for_layout = APP.'/customers.php';
        include(MYAPP.'/layout/simple_layout.php');
        exit();

    } else if($URL === '/api/login') {

        include(APP.'/api/login.php');
        exit();

    } else if(in_array($URL, ['/api/logout', '/api/logout/admin', '/api/logout/user'])) {

        include(APP.'/api/logout.php');
        exit();

    } else if($URL === '/about-locker') {
        
        $content_for_layout = APP.'/locker.php';
        include(MYAPP.'/layout/simple_layout.php');
        exit();

    } else if($URL === '/apply-for-locker') {
        
        checkLogoutNgo2Home($loginId);
        if(isset($_SESSION['lockerReqId'])) {
            header("Location: ".WEB_DOMAIN_URL);
        }
        $content_for_layout = APP.'/apply-for-locker.php';
        include(MYAPP.'/layout/simple_layout.php');
        exit();

    } else if($URL === '/api/apply_locker') {

        checkLogoutNgo2Home($loginId);
        include(APP.'/api/apply_locker.php');
        exit();

    } else if($URL === '/admin/login') {

        if(isset($_SESSION['adminUsername'])) {
            header("Location: ".WEB_DOMAIN_URL.'/admin/dashboard');
            exit();
        }
        $content_for_layout = APP.'/admin/index.php';
        include(MYAPP.'/layout/simple_layout.php');
        exit();

    } else if($URL === '/api/admin/login') {

        include(APP.'/api/login_admin.php');
        exit();

    } else if($URL === '/admin/dashboard') {

        if(!isset($_SESSION['adminUsername'])) {
            header("Location: ".WEB_DOMAIN_URL.'/admin/login');
            exit();
        }
        $bodyClass = 'full-width';
        $content_for_layout = APP.'/admin/dashboard.php';
        include(MYAPP.'/layout/simple_layout.php');
        exit();

    } else if($URL === '/api/assign_locker') {

        if(!isset($_SESSION['adminUsername'])) {
            header("Location: ".WEB_DOMAIN_URL.'/admin/login');
            exit();
        }
        include(APP.'/api/assign_locker.php');
        exit();

    } else {

        echo 'Sorry, This page not found';
        exit();

    }
    
?>
