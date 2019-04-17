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
<body class="<?php echo isset($bodyClass) ? $bodyClass : ''; ?>">
    <div class="page-wrap">
    
        <?php 
            include_once($content_for_layout);
        ?>
        
    </div>

    <?php if(isset($stickyFooter) && $stickyFooter) { ?>
        <footer class="sticky-footer">
            <div class="container-fluid">
                <p>We recently started a new service for locker, there you can keep your valueable this in safe <a href="/about-locker">click here to know more</a></p>
            </div>
        </footer>
    <?php } ?>

    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>