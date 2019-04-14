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
    if(!define("WEB_DOMAIN", "piggi.co.in")) {
        define("WEB_DOMAIN", "piggi.co.in");
    }
    if(!define("WEB_DOMAIN_URL", 'http://'.WEB_DOMAIN)) {
        define("WEB_DOMAIN_URL", 'http://'.WEB_DOMAIN);
    }


?>