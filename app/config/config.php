<?php
    error_reporting(E_ALL);

    if(!define("ROOT", $_SERVER['DOCUMENT_ROOT'])) {
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    }

    if(!define("APP", ROOT.'/app')) {
        define("APP", ROOT.'/app');
    }
    
    if(!define("WEB_DOMAIN", "piggibank.com")) {
        define("WEB_DOMAIN", "piggibank.com");
    }
    
    if(!define("WEB_DOMAIN_URL", 'http://'.WEB_DOMAIN)) {
        define("WEB_DOMAIN_URL", 'http://'.WEB_DOMAIN);
    }

    if(!define('LOCKER_PENDING', 1)) {
        define('LOCKER_PENDING', 1);
    }

    if(!define('LOCKER_ACTIVE', 2)) {
        define('LOCKER_ACTIVE', 2);
    }

    if(!define('LOCKER_DEACTIVE', 3)) {
        define('LOCKER_DEACTIVE', 3);
    }

    if(!define('LOCKER_STATUS')) {
        define('LOCKER_STATUS', serialize(array('LOCKER_PENDING' => LOCKER_PENDING, 'LOCKER_ACTIVE' => LOCKER_ACTIVE, 'LOCKER_DEACTIVE' => LOCKER_DEACTIVE )));
    }
?>