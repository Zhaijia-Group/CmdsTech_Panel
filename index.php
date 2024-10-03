<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmds.tech - 开源脚本托管平台</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

    .hero {
    	position: relative; /* 为伪元素提供定位 */
    	color: white;
    	padding: 100px 0;
        overflow: hidden; /* 确保伪元素不超出父元素 */
    }

    .hero::before {
    	content: ""; /* 伪元素需要有内容 */
    	position: absolute; /* 绝对定位 */
    	top: 0;
    	left: 0;
    	right: 0;
    	bottom: 0;
        background: url(img/banner.jpg) no-repeat center center;
        background-size: cover;
        filter: blur(3px); /* 8px 为模糊程度，可以根据需要调整 */
        z-index: 1; /* 确保伪元素在背景下 */
    }

    .hero > * {
        position: relative; /* 使内容层在伪元素上方 */
        z-index: 2; /* 确保内容层在伪元素上方 */
    }


        .feature-icon {
            font-size: 40px;
            color: #007bff;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">cmds.tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="切换导航">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">主页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">特色功能</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">关于我们</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">联系我们</a>
                    </li>
		    <li class="nav-item">
                        <a class="nav-link" href="http://cmdhub.000.pe">托管</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero text-center">
        <div class="container">
            <h1 class="display-4">欢迎来到 cmds.tech</h1>
            <p class="lead">一个开源脚本托管平台，帮助您分享和管理您的脚本。</p>
            <a href="#features" class="btn btn-primary btn-lg">了解更多</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">我们的特色功能</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <h5 class="card-title">开源共享</h5>
                            <p class="card-text">轻松分享和访问各种开源脚本，让开发变得更简单。</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="bi bi-cloud-upload"></i>
                            </div>
                            <h5 class="card-title">简单上传</h5>
                            <p class="card-text">一键上传您的脚本，轻松管理您的项目。</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <h5 class="card-title">安全保障</h5>
                            <p class="card-text">我们重视安全，确保您的脚本和数据得到保护。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">关于我们</h2>
            <p>cmds.tech 是一个致力于为开发者提供便捷脚本托管服务的平台。我们相信开源的力量，并努力为开发者创造一个友好的环境。</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">联系我们</h2>
            <p>如有任何问题或建议，请随时与我们联系！</p>
            <a href="mailto:info@cmds.tech" class="btn btn-primary">发送邮件</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4">
        <p>&copy; 2024 cmds.tech. 版权所有.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
