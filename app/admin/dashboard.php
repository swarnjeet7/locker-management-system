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
        require_once(MYAPP.'/config/config.php');
        require_once(MYAPP.'/config/database.php');
        $lockerStatus = unserialize(LOCKER_STATUS);
        $requestStatus = unserialize(REQUEST_STATUS);

        $db = new DB();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $sql = 'SELECT * FROM `admin` a where a.username="'.$_SESSION['adminUsername'].'"';
            $admin = $db->query($sql)[0];
            
            if($admin) {
                $sql1 = "SELECT l.id as id, l.accountId as accountId, l.sharedCustomerIds as sharedCustomerIds, l.duration as duration, l.type as type, l.startDate as startDate, l.status as status, l.lockerId as lockerId, m.endDate as endDate, m.isActive as isActive FROM locker_request l LEFT JOIN locker_customer_map m ON l.lockerId = m.lockerId";
                $lockerReq = $db->query($sql1);
                // echo "<pre>";
                // print_r($lockerReq);
                // die;
                
                if($lockerReq) {
                    $sql2 = 'SELECT * FROM `locker` l WHERE l.isActive = 0';
                    $lockerList = $db->query($sql2);
                }
            }
        }
    ?>
        <div class="dashboard-header">
            <div class="container-fluid d-flex justify-content-between mb50">
                <div class="welcome-note">
                    Welcome <strong><?php echo $admin['fullname']; ?></strong> as Admin
                </div>
                <div class="">
                    <a class="btn btn-primary" href="/api/logout?admin">Logout</a>
                </div>
            </div>
            <?php if($lockerReq) { ?>
                <div class="container-fluid">
                    <h3>Pending Locker Request List</h3>
                    <table class="table clearfix">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Request No.</th>
                                <th scope="col">Prime Account Id</th>
                                <th scope="col">Joint Holders</th>
                                <th scope="col">Durations</th>
                                <th scope="col">Request Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Lockers</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lockerReq as $key=>$value) { ?>
                                <tr>
                                    <td scope="col"><?php echo $value['id']; ?></td>
                                    <td scope="col"><?php echo $value['accountId']; ?></td>
                                    <td scope="col"><?php echo strtolower($value['sharedCustomerIds']) == 'null' || strtolower($value['sharedCustomerIds'])=='' ? 'Not Applicable' : $value['sharedCustomerIds']; ?></td>
                                    <td scope="col"><?php echo $value['duration'].' '.($value['duration'] == 1 ? 'Year': 'Years'); ?></td>
                                    <td scope="col">
                                        <?php echo $requestStatus[$value['type']]; ?>
                                    </td>
                                    <td scope="col">
                                        <div class="status<?php echo $value['status']; ?>">
                                            <?php echo $lockerStatus[$value['status']]; ?>
                                        </div>
                                    </td>
                                    <td scope="col">
                                        <?php 
                                            $startDate = date("d M Y", strtotime($value['startDate']));
                                            echo $startDate;
                                        ?>
                                    </td>
                                    <td scope="col">
                                        <?php 
                                            $endDate = date("d M Y", strtotime($value['endDate']));
                                            echo $value['endDate'] ? $endDate : '-----';
                                        ?>
                                    </td>
                                    <td scope="col">
                                        <?php if($value['lockerId']) { 
                                        
                                            echo $value['lockerId'];
                                        
                                        } else { ?>
                                            <select class="form-control locker_menu" 
                                            data-btn="user_<?php echo $value['accountId']; ?>"
                                            data-date="<?php echo $value['startDate']; ?>"
                                            data-duration="<?php echo $value['duration']; ?>"
                                            data-reqId ="<?php echo $value['id']; ?>"
                                            <?php 
                                                $dt= date('d-m-Y');
                                                echo (strtotime($dt) >= strtotime($value['startDate'])) ? '' : 'disabled';
                                            ?>>
                                                <option value="0">Select Locker</option>
                                                <?php if($lockerList) {
                                                    foreach($lockerList as $key => $locker) {
                                                ?>
                                                    <option value="<?php echo $locker['id']; ?>"><?php echo $locker['id']; ?></option>
                                                <?php } } ?>
                                                <?php ?>
                                            </select>
                                        <?php } ?>
                                    </td>
                                    <td scope="col">
                                    <?php if($value['lockerId']) { ?>                                        
                                        <a href="javascript:void(0)" class="btn btn-danger" id="user_<?php echo $value['accountId']; ?>">CANCEL</a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-primary disabled assignLocker" id="user_<?php echo $value['accountId']; ?>">PROCEED</a>
                                    <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>

    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>