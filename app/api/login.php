<?php
    require_once(APP. '/config/config.php');
    require_once(APP. '/config/database.php');

    $db = new DB();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postBody = file_get_contents("php://input");
        $postBody = json_decode($postBody, true);
        $accountId = $postBody['accId'];
        $password = $postBody['password'];
        $accountDetails = $db->query('SELECT a.id as accountId, c.id as customerId, l.id as lockerReqId, l.status as lockerStatus FROM `accounts` a 
        inner join customers c on c.id=a.customerId 
        left join locker_request l on l.accountId=a.id
        where a.id='.$accountId.' and c.password="'.MD5($password).'"');
        
        if(!empty($accountDetails)) {
            $accountDetails = $accountDetails[0];
            $response = array (
                "status" => "success",
                "message" => "User loged in successfully",
                "code" => 200
            );
            echo json_encode($response);
            $_SESSION['accId']= $accountDetails['accountId'];
            $_SESSION['customerId']= $accountDetails['customerId'];
            $_SESSION['lockerReqId']= $accountDetails['lockerReqId'];
            $_SESSION['lockerStatus']= $accountDetails['lockerStatus'];
            
            http_response_code(200);
            exit();
        } else {
            $response = array (
                "status" => "error",
                "message" => "Invalid Account Number or Password",
                "code" => 200
            );
            echo json_encode($response);
            http_response_code(200);
        }
    } else {
        $response = array (
            "status" => "error",
            "message" => "Invalid Method type",
            "code" => 200
        );
        echo json_encode($response);
        http_response_code(405);
    }

?>