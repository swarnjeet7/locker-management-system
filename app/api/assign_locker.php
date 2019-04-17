<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once(MYAPP.'/config/database.php');
    $db = new DB();
    
    $params = file_get_contents("php://input");
    $params = json_decode($params, true);
    $accountId= $params['accountId'];
    $lockerId= $params['lockerId'];
    echo $startDate= $params['startDate'];

    echo $sql = 'INSERT INTO locker l where l.id = '.$lockerId ;
    $result = $db->query($sql);

}

?>