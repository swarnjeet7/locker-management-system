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
    <form>
        <div class="form-group">
            <label for="startDate">Start Date</label>
            <input type="date" class="form-control" id="startDate" placeholder="Enter joint account holder ids , saprated">
        </div>
        <div class="form-group">
            <label for="time">Time of duration</label>
            <select class="form-control" id="time">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jointWith">Joint with</label>
            <input type="text" class="form-control" id="jointWith" placeholder="Enter joint account holder ids , saprated">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-2">Apply</button>
        </div>
    </form>
    </div>


    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>