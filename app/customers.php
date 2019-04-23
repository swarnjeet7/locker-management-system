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
        require_once('config/config.php');
        require_once('config/database.php');
        $db = new DB();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $customer = $db->query('SELECT * FROM customers c where c.id='.$_SESSION['customerId'])[0];
            $balance = $db->query('SELECT * FROM accounts a where a.id='.$_SESSION['accId'])[0]['balance'];
        }
    ?>
        <div class="dashboard-header">
            <div class="container-fluid d-flex justify-content-between">
                <div class="welcome-note">
                    Welcome <strong><?php echo $customer['firstname'].' '.$customer['lastname']?></strong>
                </div>
                <div class="">
                    <a class="btn btn-primary" href="/api/logout">Logout</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <table class="table clearfix">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">A/c No.</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col"><?php echo $customer['id']; ?></td>
                        <td scope="col"><?php echo $customer['firstname']; ?></td>
                        <td scope="col"><?php echo $customer['lastname']; ?></td>
                        <td scope="col"><?php echo $customer['email']; ?></td>
                        <td scope="col"><?php echo $customer['mobile']; ?></td>
                        <td scope="col"><?php echo number_format((float)$balance, 2, '.', ''); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <footer class="sticky-footer">
            <div class="container-fluid">
                <p>We recently started a new service for locker, there you can keep your valueable this in safe <a href="/about-locker">click here to know more</a></p>
            </div>
        </footer>

    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>