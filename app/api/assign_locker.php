<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once(MYAPP.'/config/database.php');
    $db = new DB();
    
    $params = file_get_contents("php://input");
    $params = json_decode($params, true);
    
    $accountId= $params['accountId'];
    $lockerId= $params['lockerId'];
    $startDate= $params['startDate'];
    $duration= $params['duration'];
    $reqId= $params['reqId'];
    $endDate = date('Y-m-d', strtotime('-1 day', strtotime('+'.$duration.' years', strtotime($startDate))));

    $sql = 'INSERT INTO locker_customer_map values(null,'. $lockerId .', '.$accountId.', "'. $startDate.'", "'. $endDate .'", 1)';
    $result = $db->query($sql);

    if($result) {
        $sql1 = 'UPDATE locker loc SET isActive = 1 where loc.id = '.$lockerId;
        $sql2 = 'UPDATE locker_request l SET l.status = 1, l.lockerId = '.$lockerId.' where l.id = '.$reqId;

        $db->query($sql1);
        $db->query($sql2);

        $response = array (
            "status" => "success",
            "message" => "Locker is Assigned successfully",
            "code" => 200
        );
        echo json_encode($response);
    }
}

?>