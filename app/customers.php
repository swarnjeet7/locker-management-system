<?php
require_once('config/config.php');
require_once('config/database.php');
$db = new DB();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $customer = $db->query('SELECT * FROM customers c where c.id='.$_SESSION['customerId'])[0];
    $account = $db->query('SELECT * FROM accounts a where a.id='.$_SESSION['accId'])[0];
}
?>
<div class="dashboard-header">
    <div class="container-fluid d-flex justify-content-between">
        <div class="welcome-note">
            Welcome <strong><?php echo $customer['firstname'].' '.$customer['lastname']?></strong>
        </div>
        <div class="">
            <a class="btn btn-primary" href="/api/logout?user">Logout</a>
        </div>
    </div>
</div>
<div class="container-fluid mb100">
    <h3>Account Information</h3>
    <div class="overflow-auto">
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
                    <td scope="col"><?php echo $account['id']; ?></td>
                    <td scope="col"><?php echo $customer['firstname']; ?></td>
                    <td scope="col"><?php echo $customer['lastname']; ?></td>
                    <td scope="col"><?php echo $customer['email']; ?></td>
                    <td scope="col"><?php echo $customer['mobile']; ?></td>
                    <td scope="col"><?php echo number_format((float)$account['balance'], 2, '.', ''); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php if(isset($_SESSION['lockerReqId']) && isset($_SESSION['lockerStatus']) && $_SESSION['lockerStatus'] < 2 ) { ?>
<div class="container-fluid mb100">
    <h3>Locker Information</h3>
    <div class="alert alert-secondary" role="alert">
        Thank you for requesting for Locker Account in Piggi Bank. Your Locker <strong>requested id is <?php echo $_SESSION['lockerReqId']; ?> </strong>for your future reference. When locker is assigned, you can see the full information about locker. 
    </div>
</div>
<?php } else { 
    $sql = 'SELECT * FROM locker_customer_map l WHERE l.accountId ='.$_SESSION['accId'];
    $lockerInfo = $db->query($sql)[0];
?>
    <div class="container-fluid mb100">
        <h3>Locker Information</h3>

        <table class="table clearfix">
            <thead class="thead-light">
                <tr>
                    <th scope="col">A/c No.</th>
                    <th scope="col">Locker Id</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col"><?php echo $lockerInfo['accountId']; ?></td>
                    <td scope="col"><?php echo $lockerInfo['lockerId']; ?></td>
                    <td scope="col"><?php echo $lockerInfo['startDate']; ?></td>
                    <td scope="col"><?php echo $lockerInfo['endDate']; ?></td>
                    <td scope="col">
                        <?php 
                            if($lockerInfo['isActive'] == 1) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                Active
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                Deactivated
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php }?>