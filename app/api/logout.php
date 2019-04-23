<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
    session_start(); //to ensure you are using same session
    session_destroy();
    header("Location: ".WEB_DOMAIN_URL);
?>