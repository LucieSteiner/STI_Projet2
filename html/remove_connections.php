<?php


try{
        $file_db = new PDO('sqlite:/var/www/databases/database.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $file_db->exec('DELETE FROM connexion');
	$file_db = null;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }




?>
