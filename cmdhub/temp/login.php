<?php
session_start();

// 引入数据库连接
require 'pdo_db.php';

// 处理登录
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 使用预处理语句查询用户信息
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // 验证用户名和密码
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        $_SESSION['username'] = $user['username']; // 存储用户名
        $_SESSION['imgUrl'] = $user['imgurl'];
        $_SESSION['isLogin'] = true; // 设置登录状态
        header('Location: index.php');
        exit();
    } else {
        header('Location: member.php');
        exit();
    }
}
?>
