<?php
    $userId = $_POST['uuid'];

    require "userData/users.php";
    $result = deleteUser($userId);
    if ($result) {
        header('location: ./index.php');
    } else {
        die('Not deleted');
    }
?>