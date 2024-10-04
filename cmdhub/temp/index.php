<?php

session_start();

// 检查用户是否已经登录
if (!isset($_SESSION['isLogin'])) {
    // 用户未登录，重定向到登录页面
    header('Location: member.php'); // 修改为登录页面
    exit;
}

require 'pdo_db.php';

try {
    // 执行查询
    $stmt = $pdo->query("SELECT * FROM cmds");
    $c_infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "查询失败: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dash - CmdsTech </title>
    <link rel="stylesheet" href="html/index/sidebar/style.css">
    <link rel="stylesheet" href="html/index/mian/style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-grid-alt'></i>
      <span class="logo_name">开始</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#main">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">主页</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">区块</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">区块</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">快捷方式</a></li>
          <li><a href="#main2">我的点赞</a></li>
          <li><a href="#">我的收藏</a></li>
          <li><a href="#">我的关注</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">工具</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">工具</a></li>
          <li><a href="workspace.php">编辑器</a></li>
          <li><a href="#">qwerty</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">探索</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">探索</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">历史</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">设置</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">设置</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
    <img src="<?= isset($_SESSION['imgUrl']) ? htmlspecialchars($_SESSION['imgUrl']) : 'html/index/sidebar/image/profile.jpg' ?>" alt="profile">
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $_SESSION['username']; ?></div>
        <div class="job">编号:[<?php echo $_SESSION['userId']; ?>]</div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out'></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text" style="display: inline-block; text-align: right; width: 100%; margin-right: 10px;">CmdsTech</span><br />
    </div>
    <div class="cmd_list_container">
      <div>
        <h1>作品列表</h1>
        <ul class="work-list">
            <?php foreach ($c_infos as $work): ?>
                <li class="work-item">
                    <h2><a href="show.php?workId=<?php echo htmlspecialchars($work['id']); ?>"><?php echo htmlspecialchars($work['title']); ?></a></h2>
                    <p>作者: <?php echo htmlspecialchars($work['author']); ?></p>
                    <p>版本: <?php echo htmlspecialchars($work['version']); ?></p>
                    <p>编号: <?php echo htmlspecialchars($work['id']); ?></p>
                    <p>描述: <?php echo htmlspecialchars($work['description']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>
  <script>

  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }

  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });

  // 获取所有的链接和内容
    const links = document.querySelectorAll('.toggle-link');
    const contents = document.querySelectorAll('.content');

    // 添加点击事件监听器
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            const targetId = this.getAttribute('href'); // 获取目标ID
            const targetContent = document.querySelector(targetId); // 获取目标内容

            // 隐藏所有内容
            contents.forEach(content => {
                if (content !== targetContent) {
                    content.style.display = 'none';
                }
            });

            // 切换目标内容的显示状态
            if (targetContent.style.display === 'none' || targetContent.style.display === '') {
                targetContent.style.display = 'block'; // 显示目标内容
            } else {
                targetContent.style.display = 'none'; // 隐藏目标内容
            }

            event.preventDefault(); // 阻止默认锚链接行为
        });
    });
  </script>

</body>
</html>