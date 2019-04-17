<?php
    require_once(APP. '/config/config.php');
    require_once(APP. '/config/database.php');

    $db = new DB();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postBody = file_get_contents("php://input");
        $postBody = json_decode($postBody, true);
        $username = $postBody['username'];
        $password = $postBody['password'];

        $authenticate = $db->query('SELECT * FROM `admin` a where a.username = "'.$username.'" and a.password = "'.MD5($password).'"');
        if($authenticate) {

            $response = array (
                "status" => "success",
                "message" => "You are logged in Successfully",
                "code" => 200
            );
            echo json_encode($response);
            $_SESSION['adminUsername'] = $username;
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