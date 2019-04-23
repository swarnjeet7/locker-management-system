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
    <div class="container-fluid mt30 mb50">
        <div class="header d-flex justify-content-between align-items-center">
            <h1>Welcome to PIGGI Bank Locker Service</h1>
            <?php if(isset($_SESSION['accId'])) {?>
                <a id="applyLocker" class="btn btn-primary" href="/apply-for-locker?userId=<?php echo $_SESSION['accId']; ?>">Apply for locker</a>
            <?php } else { ?>
                <a id="applyLocker" class="btn btn-primary" href="/">Login</a>
            <?php } ?>
        </div>
        <div class="h3 text-info mt30">Lockers</div>
        <p>Book our <strong>safe deposit lockers</strong> to keep your <strong>jewellery, important documents and other valuables protected</strong>.</p>

        <article class="locker-info">
            <div class="h3 text-info mt30">Features and benefits of safe deposit lockers:</div>
            <ul>
                <li>A locker can be held <strong>jointly by two or more customers also</strong>.</li>
                <li>The minimum period for renting out a locker is <strong>one year</strong></li>
                <li>Bank allows only a maximum of <strong>12 free operations</strong> of the locker in a year, subsequently it charges for the service from the customer.</li>
                <li>Bank also has a <strong>process for allocation and cancellation</strong> of a lockers.</li>
                <li><strong>Hassle-free payment options</strong> through your PIGGI Bank Account.</li>
                <li>For operating a locker, a customer can give a request through the website <strong>specifying date and time of operation</strong>.</li>
                <li><strong>Note: </strong>In general as the number of lockers are limited, therefore, bank maintains a queue of customer who have requested for the locker service.</li>
            </ul>
        </article>
        <article class="locker-info mt30">
            <div class="h3 text-info">Charges: </div>
            <ul>
                <li>Bank charges <strong>yearly rent Rs. 2400/- only</strong> for the locker from the customer which is directly deducted from the account of the customer.</li>
                <li>After 12 free operations, <strong>Rs. 100 per operation </strong> will be charged. This amount will be deducted from your account, in the end of the year.</li>
            </ul>
        </article>
    </div>
    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>