<?php

$host = '';
$db = '';
$user = '';
$pass = '';
$charset = 'utf8mb4';

// 建立PDO连接
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        
    PDO::ATTR_EMULATE_PREPARES   => false,                   
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// 处理登录
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

 
    if ($user && password_verify($password, $user['password'])) {
        echo "" . htmlspecialchars($user['username']) . "";
    } else {
        echo "";
    }
}
?>