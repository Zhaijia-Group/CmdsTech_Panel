<?php
// show.php
session_start(); // 启动会话

require 'pdo_db.php'; // 引入数据库连接

// 检查用户是否已经登录
if (!isset($_SESSION['isLogin'])) {
    // 用户未登录，重定向到登录页面
    header('Location: member.php'); // 修改为登录页面
    exit();
}

// 检查 group_id 是否存在且不为空
if (empty($_GET['group_id'])) {
    // 如果为空，重定向到另一个页面
    header("Location: index.php");
    exit(); // 确保脚本停止执行
}

// 获取指令组ID
if (isset($_GET['group_id'])) {
    $group_id = $_GET['group_id'];

    // 获取该指令组的所有指令
    $commands = $pdo->prepare("SELECT * FROM Command WHERE group_id = :group_id");
    $commands->execute(['group_id' => $group_id]);
    $command_list = $commands->fetchAll(PDO::FETCH_ASSOC);
} else {
    $command_list = [];
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>指令组指令</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">指令组的全部指令</h1>

        <?php if (empty($command_list)): ?>
            <div class="alert alert-warning">该指令组暂无指令。</div>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>指令ID</th>
                        <th>指令文本</th>
                        <th>指令类型</th>
                        <th>命令方块类型</th>
                        <th>是否激活</th>
                        <th>是否有条件</th>
                        <th>描述</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($command_list as $command): ?>
                        <tr>
                            <td><?= htmlspecialchars($command['command_id']) ?></td>
                            <td><?= htmlspecialchars($command['command_text']) ?></td>
                            <td><?= htmlspecialchars($command['command_type']) ?></td>
                            <td><?= htmlspecialchars($command['block_type']) ?></td>
                            <td><?= $command['is_active'] ? '是' : '否' ?></td>
                            <td><?= $command['has_condition'] ? '是' : '否' ?></td>
                            <td><?= htmlspecialchars($command['description']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <a href="workspace.php?cmdGroupId=<?php echo htmlspecialchars($group_id); ?>" class="btn btn-primary mt-3">返回添加指令</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
