<?php

include 'db.class.php';

$db= new DATEBASE();

if (isset($_POST['edit_post']))
    $id = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['content'];
    if($_FILES['image']['tmp_name']){
        $handler = fopen($_FILES['image']['tmp_name'], 'r');
        $img = fread($handler, filesize($_FILES['image']['tmp_name']));
    } else {
        $post = $db->editPost($id);
        $img = $post['img'];
    }
    
    $db->updatePost($id, $title, $body, $img);

    header("location: /index.php?info=added");
?>