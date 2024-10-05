<?php
//mysqli_db.php

function connectDatabase() {
    $host = '';
    $db = '';
    $user = '';
    $pass = '';
    
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throw new Exception("连接失败: " . $conn->connect_error);
    }
    return $conn;
}
?>
