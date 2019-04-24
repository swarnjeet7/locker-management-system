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
        // if($_SESSION['username']) {
            // $queries = array();
            // parse_str($_SERVER['QUERY_STRING'], $queries);
            // require_once(APP.'/config/config.php');
            // print_r($queries); die;    
    ?>
    <div class="container-fluid mt30 mb50">
        <form onsubmit="return false">
            <div class="form-group">
                <label for="startDate">Start Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="startDate" min="<?php 
                    $datetime = new DateTime('tomorrow');
                    echo $datetime->format('Y-m-d');
                ?>">
            </div>
            <div class="form-group">
                <label for="duration">Time of duration <span class="text-danger">*</span></label>
                <select class="form-control" id="duration">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jointWith">Joint Holders Account id's</label>
                <input type="text" class="form-control" id="jointWith" placeholder="Enter joint holders account ids with comma (,) saprated. Like: 110023, 110054, 110234">
            </div>
            <div class="form-group text-right">
                <button id="applyLocker" type="submit" class="btn btn-primary btn-lg">Apply</button>
            </div>
        </form>
    </div>

    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>