<?php

  date_default_timezone_set('UTC');
 
  try {

    $file_db = new PDO('sqlite:/var/www/databases/database.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION); 

    $file_db->exec("DROP TABLE messages"); 
    $file_db->exec("DROP TABLE users"); 

    $file_db->exec("CREATE TABLE IF NOT EXISTS users (
		    id INTEGER PRIMARY KEY AUTOINCREMENT,
		    login TEXT UNIQUE,
		    password TEXT,
		    validity INTEGER,
		    role TEXT)");	

    $file_db->exec("CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY AUTOINCREMENT, 
                    title TEXT, 
                    message TEXT, 
                    time TEXT,
		    sender INTEGER,
		    receiver INTEGER,
 		    FOREIGN KEY(sender) REFERENCES users(id),
		    FOREIGN KEY(receiver) REFERENCES users(id) )");

    $admin = array('login' => 'admin',
                   'password' => crypt('admin'),
                   'validity' => 1,
		   'role' => 'admin');

    $file_db->exec("INSERT INTO users (login, role, validity, password) VALUES ('{$admin['login']}','{$admin['role']}','{$admin['validity']}','{$admin['password']}')");

 
    $file_db = null;
  }
  catch(PDOException $e) {

    echo $e->getMessage();
  }
 
?>
