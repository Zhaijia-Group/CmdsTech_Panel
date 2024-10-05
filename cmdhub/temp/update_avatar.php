<?php
session_start();
require 'pdo_db.php'; // 引入数据库连接文件

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取用户输入的头像 URL
    $avatarUrl = filter_input(INPUT_POST, 'avatarUrl', FILTER_SANITIZE_URL);
    
    // 获取用户 ID
    $userId = $_SESSION['userId'];

    if ($userId && !empty($avatarUrl)) {
        try {
            // 准备 SQL 语句
            $stmt = $pdo->prepare("UPDATE users SET imgUrl = :imgUrl WHERE id = :id");
            $stmt->bindParam(':imgUrl', $avatarUrl);
            $stmt->bindParam(':id', $userId);
            
            // 执行 SQL 语句
            if ($stmt->execute()) {
                // 更新成功，重定向回设置页面，或显示成功消息
                $_SESSION['imgUrl'] = $avatarUrl; // 更新会话中的头像 URL
                header("Location: settings.php?update=success");
                exit;
            } else {
                // 更新失败
                header("Location: settings.php?update=failed");
                exit;
            }
        } catch (PDOException $e) {
            // 处理数据库错误
            echo "错误: " . $e->getMessage();
        }
    } else {
        // 如果没有 userId 或 avatarUrl 无效，返回错误
        header("Location: settings.php?update=invalid");
        exit;
    }
}
?>
