<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once(APP. '/config/config.php');
    require_once(APP. '/config/database.php');
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
        $ids = str_replace(',,', ',', str_replace(' ', '', $ids));
        $accountIds = explode(',', $ids);
        $uniqueIds = array_unique($accountIds);
        foreach($uniqueIds as $key => $id) {
            $db = new DB();
            $result = $db->query('SELECT * FROM accounts a WHERE a.id='.$id);
            if(empty($result)) {
                $response['status'] = 'Error';
                $response['message'] = 'Id = '.$id.' is not valid';
                $response['code'] = 200;
                echo json_encode($response);
                http_response_code(200);
                exit();
            }
        };
        $jointHolderIds= $uniqueIds;
    };
    if($jointHolders) {
        checkAccountId($jointHolders);
    }
    $date=date_create($startDate);
    $start_date = date_format($date,"d/m/Y");
    $requestType = empty($jointHolderIds) ? 1 : 2;    
    $db = new DB();
    $result = $db->query(
        'INSERT INTO locker_request (accountId, sharedCustomerIds, duration, type)'.
        'VALUES ('.$accountId.', '.(empty($jointHolderIds) ? '0' : $jointHolderIds) .','.$duration.','.$requestType.')'
    );
    //if($db->insert_id>0)
        echo $db->insert_id;
    //else
    //    echo "Error: "  . $db->error;
    exit;



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