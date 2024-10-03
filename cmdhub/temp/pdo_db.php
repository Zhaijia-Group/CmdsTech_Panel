<?php
// db.php

// 数据库连接配置
$host = '';
$db = '';
$user = '';
$pass = '';
$charset = 'utf8mb4';

// 建立PDO连接
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // 启用异常处理
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // 设置默认的提取模式
    PDO::ATTR_EMULATE_PREPARES   => false,                   // 禁用模拟预处理
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
