<?php
// create_group.php
session_start(); // 启动会话

require 'pdo_db.php'; // 引入数据库连接

// 检查用户是否已经登录
if (!isset($_SESSION['isLogin'])) {
    // 用户未登录，重定向到登录页面
    header('Location: member.php'); // 修改为登录页面
    exit();
}

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $group_name = trim($_POST['group_name']);
    $user_id = $_SESSION['userId']; // 当前用户ID

    if (!empty($group_name)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO CommandGroup (user_id, group_name) VALUES (:user_id, :group_name)");
            $stmt->execute(['user_id' => $user_id, 'group_name' => $group_name]);
            echo "<div class='alert alert-success'>指令组创建成功！</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>创建失败: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>指令组名称不能为空。</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>创建指令组</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">创建指令组</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="group_name" class="form-label">指令组名称</label>
                <input type="text" name="group_name" id="group_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">创建指令组</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
