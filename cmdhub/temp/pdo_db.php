<?php
// db.php

// 数据库连接配置
$host = getenv('DB_HOST') ?: '';
$db = getenv('DB_NAME') ?: '';
$user = getenv('DB_USER') ?: '';
$pass = getenv('DB_PASS') ?: '';
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
    // 记录错误到日志文件而不是直接输出
    error_log($e->getMessage(), 3, '/error_log/error.log'); // 替换为实际日志路径
    throw new \PDOException('Database connection error.', (int)$e->getCode());
}
?>
