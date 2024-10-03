<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>导航页面示例</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .hero {
            background-color: #343a40;
            color: white;
            padding: 60px 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- 导航栏 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">导航页面</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">关于我们</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">服务</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">联系我们</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 主页横幅 -->
    <div class="hero">
        <h1>欢迎来到我们的导航页面</h1>
        <p>探索我们的服务和功能</p>
        <a href="#" class="btn btn-primary">开始探索</a>
    </div>

    <!-- 页面内容 -->
    <div class="content container">
        <h2>我的世界指令<a href="temp/index.php">托管平台</a></h2>
    </div>

    <!-- 页脚 -->
    <div class="footer">
        <p>&copy; 2024 导航页面示例. 保留所有权利.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
