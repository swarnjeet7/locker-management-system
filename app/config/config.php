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
    if(!define('LOCKER_STATUS', serialize(array(LOCKER_PENDING => 'Pending', LOCKER_ACTIVE => 'Active', LOCKER_DEACTIVE => 'Deactive' )))) {
        define('LOCKER_STATUS', serialize(array(LOCKER_PENDING => 'Pending', LOCKER_ACTIVE => 'Active', LOCKER_DEACTIVE => 'Deactive' )));
    }
    
    if(!define('SELF', 1)) {
        define('SELF', 1);
    }
    if(!define('JOINT', 2)) {
        define('JOINT', 2);
    }
    if(!define('REQUEST_STATUS', serialize(array(SELF=> 'Self', JOINT=> 'Joint Account')))) {
        define('REQUEST_STATUS', serialize(array(SELF=> 'Self', JOINT=> 'Joint Account')));
    }

?>