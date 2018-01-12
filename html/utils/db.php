<?php
function connect(){
 try{
        $file_db = new PDO('sqlite:/var/www/databases/database.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $file_db;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
function close(){
   $file_db = null;
}
?>
