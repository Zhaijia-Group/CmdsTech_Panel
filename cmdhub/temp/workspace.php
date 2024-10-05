<?php
// workspace.php
session_start(); // 启动会话

require 'pdo_db.php'; // 引入数据库连接

// 检查用户是否已经登录
if (!isset($_SESSION['isLogin'])) {
    // 用户未登录，重定向到登录页面
    header('Location: member.php'); // 修改为登录页面
    exit();
}

// 获取用户的指令组
$username = $_SESSION['username'];
$user_id = $_SESSION['userId'];
$groups = $pdo->prepare("SELECT * FROM CommandGroup WHERE user_id = :user_id");
$groups->execute(['user_id' => $user_id]);
$command_groups = $groups->fetchAll(PDO::FETCH_ASSOC);

// 检查 cmdGroupId 是否存在且不为空
if (empty($_GET['cmdGroupId'])) {
    // 如果为空，重定向到另一个页面
    header("Location: index.php");
    exit(); // 确保脚本停止执行
}

// 获取指令组ID
$group_id = $_GET['cmdGroupId'];

// 检查用户是否有权限访问该指令组
$check_group = $pdo->prepare("SELECT * FROM CommandGroup WHERE group_id = :group_id AND user_id = :user_id");
$check_group->execute(['group_id' => $group_id, 'user_id' => $user_id]);
$group_info = $check_group->fetch(PDO::FETCH_ASSOC);

if (!$group_info) {
    // 用户没有访问权限，重定向到另一个页面
    header("Location: index.php");
    exit();
}

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 添加指令
    if (isset($_POST['add_command'])) {
        
        $command_text = trim($_POST['command_text']);
        $command_type = trim($_POST['command_type']);
        $block_type = trim($_POST['block_type']);
        $is_active = isset($_POST['is_active']) ? 1 : 0; // checkbox
        $has_condition = isset($_POST['has_condition']) ? 1 : 0; // checkbox
        $description = trim($_POST['description']);

        if (!empty($command_text)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO Command (group_id, command_text, command_type, block_type, is_active, has_condition, description) 
                                        VALUES (:group_id, :command_text, :command_type, :block_type, :is_active, :has_condition, :description)");
                $stmt->execute([
                    'group_id' => $group_id,
                    'command_text' => $command_text,
                    'command_type' => $command_type,
                    'block_type' => $block_type,
                    'is_active' => $is_active,
                    'has_condition' => $has_condition,
                    'description' => $description
                ]);
                echo "<div class='alert alert-success'>指令添加成功！</div>";
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>添加失败: " . htmlspecialchars($e->getMessage()) . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>指令文本不能为空。</div>";
        }
    }

    // 删除指令
    if (isset($_POST['delete_command'])) {
        $command_id = $_POST['command_id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM Command WHERE command_id = :command_id AND group_id = :group_id");
            $stmt->execute(['command_id' => $command_id, 'group_id' => $group_id]); // 确保只删除该组下的指令
            echo "<div class='alert alert-success'>指令删除成功！</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>删除失败: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
}

// 获取该指令组的所有指令
$commands = $pdo->prepare("SELECT * FROM Command WHERE group_id = :group_id");
$commands->execute(['group_id' => $group_id]);
$command_list = $commands->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加指令</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">添加指令</h1>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="command_text" class="form-label">指令文本</label>
                <textarea name="command_text" id="command_text" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="command_type" class="form-label">指令类型</label>
                <input type="text" name="command_type" id="command_type" class="form-control">
            </div>

            <div class="mb-3">
                <label for="block_type" class="form-label">命令方块类型</label>
                <input type="text" name="block_type" id="block_type" class="form-control">
            </div>

            <div class="form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
                <label for="is_active" class="form-check-label">是否激活</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="has_condition" id="has_condition" class="form-check-input">
                <label for="has_condition" class="form-check-label">是否有条件</label>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">描述</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" name="add_command" class="btn btn-primary">添加指令</button>
        </form>

        <h2 class="mt-5">已添加指令</h2>
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
                        <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="command_id" value="<?= $command['command_id'] ?>">
                            <button type="submit" name="delete_command" class="btn btn-danger btn-sm">删除</button>
                        </form>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <iframe src="html/index/backbt/backbt.html"></iframe>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
