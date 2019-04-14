<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to PIGGI Bank</title>
    <link rel="shortcut icon" href="/app/assets/img/favicon.ico" />
    <link rel="stylesheet" href="/app/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="/app/assets/css/main.css" />
</head>
<body>
    <?php
        if($_SESSION['username']) {
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            require_once(APP.'/config/config.php');
            // print_r($queries); die;    
    ?>
        <div class="container-fluid mt30 mb50">
            <p>You have applied successfully for our locker Service</p>
        </div>
    <?php } ?>
    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>