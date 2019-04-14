<?php
    if(!define("ROOTPATH", dirname(__FILE__))) {
        define("ROOTPATH", dirname(__FILE__));
    }
    if(!define("ROOT", $_SERVER['DOCUMENT_ROOT'])) {
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    }
    if(!define("APP", ROOT.'/app')) {
        define("APP", ROOT.'/app');
    }
    
    $requestUri = $_SERVER['REQUEST_URI'];
    $URL = strtok($_SERVER["REQUEST_URI"], '?');
    if($URL === '/') {
        include(ROOT.'/app/home.php');
        exit();
    }
    echo $URL; die;
    if($URL === '/customers/125701') {
        include(ROOT.'/app/customers.php');
        exit();
    }
    if($URL === '/api/login') {
        include(ROOT.'/api/login.php');
        exit();
    }
    
?>
