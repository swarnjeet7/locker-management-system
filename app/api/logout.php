<?php
    require_once(MYAPP.'/config/config.php');
    if(isset($queryParams)) {
        if($queryParams === 'user'){
            $_SESSION['accId']= '';
            $_SESSION['customerId']= '';
            $_SESSION['lockerReqId']= '';
            header("Location: ".WEB_DOMAIN_URL);
        }
        if($queryParams === 'admin'){
            $_SESSION['adminUsername']= '';
            header("Location: ".WEB_DOMAIN_URL.'/admin/login');
        }
    } else {
        // session_start(); //to ensure you are using same session
        session_destroy();
        header("Location: ".WEB_DOMAIN_URL);
    }

?>