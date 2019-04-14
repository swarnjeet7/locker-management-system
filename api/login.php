<?php
    require_once('../app/config/config.php');
    
    require_once('database.php');

    $db = new DB();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postBody = file_get_contents("php://input");
        $postBody = json_decode($postBody, true);
        $username = $postBody['username'];
        $password = $postBody['password'];

        if($db->query('SELECT * FROM `credentials` c where c.customers_id='.$username)) {
            if($db->query('SELECT * FROM `credentials` c where c.customers_id='.$username.' AND c.password="'.$password.'"')) {
                $response = array (
                    "status" => "success",
                    "message" => "User loged in successfully",
                    "code" => 200
                );
                echo json_encode($response);
                session_start();
                $_SESSION['username']= $username;
                http_response_code(200);
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
                "message" => "Invalid User Id",
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