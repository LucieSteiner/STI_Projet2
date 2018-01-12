<?php


include_once('../utils/db.php');

function authentify_user($login, $password){
    $file_db = connect();
    $result = $file_db->prepare('SELECT login, password, validity, role FROM users WHERE login = ?');  
    $result->execute(array($login));
   
    $data = $result->fetchAll();
    if(!empty($data)){   
        foreach($data as $row){
            $password_hash = $row['password'];
	    $validity = $row['validity'];
	    $role = $row['role'];
        }
	if($validity == 1){
            if($password_hash == crypt($password, $password_hash)){
                return $role;
            }
        }
    }    
    close();
    return null;
}

function change_user_password($user, $old, $new){

    $file_db = connect();
    
        if(!is_null(authentify_user($user, $old))){
	    $password = crypt($new);
	    
	    $result = $file_db->prepare("UPDATE users SET password = ?  WHERE login = ?");
	    $result->execute(array($password, $user));
            return true;
	}
    close();
    return false;
}

//admin functions
function get_all_users(){
    $file_db = connect();
    $result = $file_db->query("SELECT id, login FROM users ORDER BY login ASC");
    close();
    return $result;
}
function get_user_id($user){
    $file_db = connect();
    $result = $file_db->prepare("SELECT id FROM users WHERE login = ?");
    $result->execute(array($user));
    $data = $result->fetch();
    close();
    return $data['id'];
}
function get_user_detail($user){
    $file_db = connect();
    $result = $file_db->prepare("SELECT login, validity, role, password FROM users WHERE id = ?");
    $result->execute(array($user));
    $data = $result->fetch();
    close();
    return $data;
}
function delete_user($id){
    $file_db = connect();
    $result = $file_db->prepare("DELETE FROM users WHERE id = ?");
    $result->execute(array($id));
    close();

}
function edit_user($id, $user,$role,$validity,$password){
    $file_db = connect();
    $command = $file_db->prepare("UPDATE users SET login = ?, role = ?, validity = ?, password = ? WHERE id = ?");
    $command->execute(array($user, $role, $validity, $password, $id));
    close();
}

function create_user($user, $role, $validity, $password){
    try{
        $file_db = connect();
        $command = $file_db->prepare("INSERT INTO users (login, role, validity, password) VALUES (?,?,?,?)");
        $command->execute(array($user, $role, $validity, $password));
        close;
    }
    catch(PDOException $e){
        return false;
    }
    return true;

}
?>
