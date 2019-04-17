<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once(APP. '/config/database.php');
    $LOCKER_REQUEST_STATUS = unserialize(LOCKER_STATUS);

    $accountId = $_SESSION['accId'];
    $params = file_get_contents("php://input");
    $params = json_decode($params, true);
    $startDate = $params['startDate'];
    $duration = $params['duration'];
    $jointHolders = $params['jointHolders'];
    $jointHolderIds = '';

    $response = array(
        "status" => "success",
        "message" => "You have applied for locker successfully",
        "code" => 200
    );

    if(!$startDate || !$duration) {
        $response['status'] = 'Error';
        $response['message'] = 'Please update correct date and duration time';
        $response['code'] = 200;
        echo json_encode($response);
        http_response_code(200);
        exit();
    }

    function checkAccountId($ids) {
        $j_ids = str_replace(',,', ',', str_replace(' ', '', $ids));
        $accountIds = explode(',', $j_ids);
        $uniqueIds = array_unique($accountIds);
        $jointIds = '';
        $db = new DB();
        foreach($uniqueIds as $key => $id) {
            $result = $db->query('SELECT * FROM accounts a WHERE a.id='.$id);
            if(empty($result)) {
                $response['status'] = 'Error';
                $response['message'] = 'Id = '.$id.' is not valid';
                $response['code'] = 200;
                echo json_encode($response);
                http_response_code(200);
                exit();
            }
            $jointIds .= $id;
        };
        return $jointIds;
    };
    if($jointHolders) {
        $jointHolderIds = checkAccountId($jointHolders);
    }
    $requestType = $jointHolderIds == '' ? 1 : 2;
    $sql = 'INSERT INTO locker_request (accountId, sharedCustomerIds, duration, type, reqDate)'.
    'VALUES ('.$accountId.', '.(empty($jointHolderIds) ? 'NULL' : $jointHolderIds) .','.$duration.','.$requestType.', "'.$startDate.'")';
    $db = new DB();
    $lockerReqId = $db->query($sql);
    $_SESSION['lockerReqId'] = $lockerReqId;
    echo $lockerReqId;
    exit();

} else {
    $response = array (
        "status" => "error",
        "message" => "Invalid Method type",
        "code" => 405
    );
    echo json_encode($response);
    http_response_code(405);
}
?>