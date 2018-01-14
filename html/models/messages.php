<?php

include_once('../utils/db.php');

function get_messages($user){
    $file_db = connect();

    $result = $file_db->prepare('SELECT messages.id, title, time, send.login as sender FROM messages JOIN users AS recv ON recv.id = messages.receiver JOIN users AS send ON send.id = messages.sender WHERE recv.login = ? ORDER BY time DESC');
    $result->execute(array($user));
    $data = $result->fetchAll();

    close();
    return $data;
}

function get_message_detail($id){

    $file_db = connect();

    $result = $file_db->prepare('SELECT messages.id, title, time, message, send.login as sender, recv.login as receiver FROM messages JOIN users AS recv ON recv.id = messages.receiver JOIN users AS send ON send.id = messages.sender WHERE messages.id = ?');
    $result->execute(array($id));
    $data = $result->fetch();

    close();
    return $data;
}

function write_message($from, $to, $title, $message){
    $file_db = connect();
    date_default_timezone_set('UTC');
    $formatted_time = date('Y-m-d H:i:s', time());
    $result = $file_db->prepare('SELECT id FROM users WHERE login = ?');
    $result->execute(array($from));
    $sender = $result->fetch();
    $result->execute(array($to));
    $receiver = $result->fetch();
    if(empty($receiver)){
        return false;
    }
    $result2 = $file_db->prepare("INSERT INTO messages (title, time, message, sender, receiver) VALUES (?,?,?,?,?)");
    $result2->execute(array($title, $formatted_time, $message, $sender['id'], $receiver['id']));

    close();
    return true;
}

function get_message_receiver($id){
    $file_db = connect();
    $result = $file_db->prepare('SELECT users.login AS recv FROM messages JOIN users ON messages.receiver = users.id WHERE messages.id = ?');
    $result->execute(array($id));
    $receiver = $result->fetch();
    close();
    return $receiver['recv'];
}
function delete_message($id){
    $file_db = connect();

    $result = $file_db->prepare("DELETE FROM messages WHERE id = ?");
    $result->execute(array($id));

    close();

}
?>
