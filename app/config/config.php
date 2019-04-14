<?php

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

    // echo WEB_DOMAIN_URL; die;

?>