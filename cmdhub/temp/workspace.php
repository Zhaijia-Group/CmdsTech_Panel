<?php
//workspace.php





?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品信息管理</title>
    <!-- 引入 Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="html/index/wrokspace/index/styles.css">
</head>
<body>
    <div class="container-fluid d-flex vh-100 p-3">
        <div class="card me-3" style="width: 25%;">
            <div class="card-body">
                <h5 class="card-title">作品基本信息</h5>
                <form>
                    <div class="mb-3">
                        <label for="projectName" class="form-label">作品名称:</label>
                        <input type="text" class="form-control" id="projectName" placeholder="输入作品名称" required>
                    </div>
                    <div class="mb-3">
                        <label for="projectDetails" class="form-label">作品详情:</label>
                        <textarea class="form-control" id="projectDetails" placeholder="输入作品详情" required rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="minecraftVersion" class="form-label">适用的我的世界版本:</label>
                        <input type="text" class="form-control" id="minecraftVersion" placeholder="输入适用版本" required>
                    </div>
                    <div class="mb-3">
                        <label for="projectVersion" class="form-label">作品版本:</label>
                        <input type="text" class="form-control" id="projectVersion" placeholder="输入作品版本" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-success" id="publishButton">发表作品</button>
                        <button type="button" class="btn btn-warning" id="saveDraftButton">保存草稿</button>
                        <button type="button" class="btn btn-secondary" id="cancelButton">取消</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card flex-fill">
            <div class="card-body">
                <h5 class="card-title">内容展示区</h5>
                <p>在这里展示作品的内容或者生成的指令等信息...</p>
            </div>
        </div>

        <div class="toolbar">
            <button id="toggleButton" class="btn btn-primary rounded-circle">+</button>
        </div>
    </div>

    <!-- 引入 Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="html/index/wrokspace/index/index.js"></script>
</body>
</html>
