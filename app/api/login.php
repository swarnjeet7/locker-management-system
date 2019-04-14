<?php
    require_once(APP. '/config/config.php');
    require_once(APP. '/config/database.php');

    $db = new DB();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postBody = file_get_contents("php://input");
        $postBody = json_decode($postBody, true);
        $accountId = $postBody['accId'];
        $password = $postBody['password'];
        $accountDetails = $db->query('SELECT * FROM `accounts` a where a.id='.$accountId)[0];
        if($accountDetails) {
            $customerId = $accountDetails['customerId'];
            if($db->query('SELECT * FROM customers c where c.id='.$customerId.' AND c.password="'.MD5($password).'"')) {
                $response = array (
                    "status" => "success",
                    "message" => "User loged in successfully",
                    "code" => 200
                );
                echo json_encode($response);
                $_SESSION['accId']= $accountId;
                $_SESSION['customerId']= $customerId;
                http_response_code(200);
                exit();
            } else {
                $response = array (
                    "status" => "error",
                    "message" => "Invalid Password",
                    "code" => 200
                );
                echo json_encode($response);
                http_response_code(200);
            }
        } else {
            $response = array (
                "status" => "error",
                "message" => "Invalid Account No",
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