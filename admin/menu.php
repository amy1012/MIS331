<?php
//取得目前檔案的名稱。透過$_SERVER['PHP_SELF']先取得路徑
$current_file = $_SERVER['PHP_SELF'];
//echo $current_file; //查看目前取得的檔案完整
//然後透過 basename 取得檔案名稱，加上第二個參數".php"，主要是將取得的檔案去掉 .php 這副檔名稱
$current_file = basename($current_file , ".php");
//echo $current_file; //查看目前取得後的檔名

switch ($current_file) {
	case 'work_list':
	case 'work_edit':
  case 'work_add':
		//為作品列表或完整作品頁
		$index = 1;
		break;
	case 'member_list':
	case 'member_edit':
  case 'member_add':
		//為作品列表或完整作品頁
		$index = 2;
		break;
	default:
		//預設索引為 0
		$index = 0;
		break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NSBlog</title>
  <link rel="stylesheet" href="../css/backendMenu.css?v=<?php echo time(); ?>"/>
</head>
<body>
  <header>
    <a href="../index.php" class="logo">
      <img src="../images/NSBlog-logo.png" height="80px">
    </a>
    <div class="group">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <!--<div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <!--<div class="col-xs-12">
        <!--網站標題-->
        <!--<h1 class="text-center">NSBlog</h1>
        <div style="height: 40px;"></div>-->

        <!-- 選單 -->
      <ul class="navigation">
        <li role="presentation"><a href="../">Home</a></li>
        <li role="presentation" <?php echo ($index == 0)?'class="active"':'';?>><a href="./">Backend Home</a></li>
        <li role="presentation" <?php echo ($index == 1)?'class="active"':'';?>><a href="work_list.php">Post</a></li>
        <li role="presentation" <?php echo ($index == 2)?'class="active"':'';?>><a href="member_list.php">Account</a></li>
        <li role="presentation"><a href="../php/logout.php">Log out</a></li>
      </ul>
      <ion-icon name="menu-outline" class="menuToggle"></ion-icon>
      <!--</div>-->
    </div>
  </header>
  <script>
    let menuToggle = document.querySelector('.menuToggle');
    let header = document.querySelector('header');
    menuToggle.onclick = function(){
      header.classList.toggle('open');
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>