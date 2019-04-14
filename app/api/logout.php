<?php
    require_once('../app/config/config.php');
    
    // remove username session variables
    session_start(); //to ensure you are using same session
    session_destroy();
    if(isset($_COOKIE['PHPSESSID'])) {
        unset($_COOKIE['PHPSESSID']);
    }

    header("Location: ".WEB_DOMAIN_URL);

?>