<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once(APP. '/config/config.php');
    require_once(APP. '/config/database.php');
    $db = new DB();
    $accountId = $_SESSION['accId'];

    $params = file_get_contents("php://input");
    $params = json_decode($params, true);

    $startDate = $params['startDate'];
    $duration = $params['duration'];
    $jointHolders = $params['jointHolders'];

    if(!$startDate || !$duration) {
        echo "Please update correct date and duration";
        exit();
    }
    function checkAccountId($ids) {
        $ids = str_replace(',,', ',', str_replace(' ', '', $ids));
        $accountIds = explode(',', $ids);
        $uniqueIds = array_unique($accountIds);
        foreach($uniqueIds as $key => $id) {
            $isValid = $db->query('SELECT * FROM accounts a WHERE a.id='.$id);
            var_dump($isValid);
            die;
        };
        // print_r($uniqueIds);
        // die;
    };
    if($jointHolders) {
        checkAccountId($jointHolders);
    }
    $start_date=date_create($startDate);
    date_format($date,"d/m/Y");
    










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