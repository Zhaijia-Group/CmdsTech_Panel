<?php
//settings.php
session_start();
// 检查用户是否已经登录
if (!isset($_SESSION['isLogin'])) {
    // 用户未登录，重定向到登录页面
    header('Location: member.php'); // 修改为登录页面
    exit();
}

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>设置页面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>用户设置</h1>

        <!-- 提示消息 -->
        <?php if (isset($_GET['update'])): ?>
            <div class="alert alert-<?= $_GET['update'] === 'success' ? 'success' : ($_GET['update'] === 'failed' ? 'danger' : 'warning') ?>" role="alert">
                <?= $_GET['update'] === 'success' ? '头像更新成功！' : ($_GET['update'] === 'failed' ? '头像更新失败，请重试。' : '输入无效，请确保头像 URL 正确。') ?>
            </div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-header">
                <h2>头像设置</h2>
            </div>
            <div class="card-body text-center">
                <img src="<?= isset($_SESSION['imgUrl']) ? htmlspecialchars($_SESSION['imgUrl']) : 'html/index/sidebar/image/profile.jpg' ?>" alt="用户头像" class="img-thumbnail" style="width: 150px; height: 150px;">
                <form action="update_avatar.php" method="POST" class="mt-3">
                    <div class="mb-3">
                        <label for="avatarUrl" class="form-label">更改头像 URL</label>
                        <input type="url" class="form-control" id="avatarUrl" name="avatarUrl" value="<?= isset($_SESSION['imgUrl']) ? htmlspecialchars($_SESSION['imgUrl']) : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">更新头像</button>
                </form>
            </div>
        </div>
    </div>
    <iframe src="html/index/backbt/backbt.html"></iframe>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
