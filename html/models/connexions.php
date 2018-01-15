<?php
include_once('../utils/db.php');

function check_if_allowed($ip){
    $file_db = connect();
    
    $result = $file_db->prepare('SELECT COUNT(*) FROM connexion WHERE ip = ?');
    
    $result->execute(array($ip));
    $data = $result->fetchAll();
    if(!empty($data)){   
        foreach($data as $row){
          $count = $row['COUNT(*)'];
        }
    }
 
    if($count < 10){
        $result = $file_db->prepare("INSERT INTO connexion(ip) VALUES(?)");
        $result->execute(array($ip));

        return true;
    }
    else{
        return false;
    }
    
}



?>
