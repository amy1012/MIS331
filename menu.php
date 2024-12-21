<?php

include("php/db.php");

?>

<?php
//取得目前檔案的名稱。透過$_SERVER['PHP_SELF']先取得路徑
$current_file = $_SERVER['PHP_SELF'];
//echo $current_file; //查看目前取得的檔案完整
//然後透過 basename 取得檔案名稱，加上第二個參數".php"，主要是將取得的檔案去掉 .php 這副檔名稱
$current_file = basename($current_file , ".php");
//echo $current_file; //查看目前取得後的檔名

switch ($current_file) {
	case 'article_list':
	case 'article':
		//為文章列表或完整文章頁
		$index = 1;
		break;
	case 'work_list':
	case 'work':
		//為作品列表或完整作品頁
		$index = 2;
		break;
	case 'about':
		//為關於我們頁
		$index = 3;
		break;
	case 'register':
		//為註冊頁
		$index = 4;
		break;
	default:
		//預設索引為 0
		$index = 0;
		break;
}
?>

<!-- Image and text -->
<!-- Just an image -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NSBlog</title>
  <link rel="stylesheet" href="css/menu.css?v=<?php echo time(); ?>"/>
  
</head>
<body> 
  <div class="searchBoard"></div>
  <header class>
    <a href="index.php" class="logo">
      <img src="./images/NSBlog-logo.png" height="80px">
    </a>
    <div class="group">
      <ul class="navigation">
        <li <?php echo ($index == 0)?'class="active"':'';?>><a href="index.php">Home</a></li>
        <li <?php echo ($index == 2)?'class="active"':'';?>><a href="work_list.php">Posts</a></li>
        <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login']){ ?>
          <li <?php echo ($index == 4)?'class="active"':'';?>><a href="admin/login.php">Backend</a></li>
        <?php }else{ ?>
        <li <?php echo ($index == 4)?'class="active"':'';?>><a href="admin/login.php">Log in</a></li>
        <?php } ?>
      </ul>
      <div class="search">
        <span class="icon">
          <ion-icon name="search-outline" class="searchBtn"></ion-icon>
          <ion-icon name="close-outline" class="closeBtn"></ion-icon>
        </span>
      </div>
      <ion-icon name="menu-outline" class="menuToggle"></ion-icon>
    </div>
    <form action="search.php" method="GET" class="searchBox">
      <input type="text" placeholder="Search NSBlog..." class="searchHere" style="font-size: 16px;" id="SH" name="keyword">
      <input type="submit" value="Submit &rarr;" class="searchText" style="font-size: 16px;">
    </form>
  </header>
  <script>
    document.querySelector('.searchBox').onsubmit = function() {
      let searchHereInput = document.getElementById('SH');
      if (searchHereInput.value.trim() === '') {
        return false; // 阻止表单提交
      }
      return true; // 允许表单提交
    };
    let searchBtn = document.querySelector('.searchBtn');
    let closeBtn = document.querySelector('.closeBtn');
    let searchBox = document.querySelector('.searchBox');
    let navigation = document.querySelector('.navigation');
    let menuToggle = document.querySelector('.menuToggle');
    let header = document.querySelector('header');

    searchBtn.onclick = function(){
      searchBox.classList.add('active');
      closeBtn.classList.add('active');
      searchBtn.classList.add('active');
      menuToggle.classList.add('hide');
      header.classList.remove('open');
    }
    closeBtn.onclick = function(){
      searchBox.classList.remove('active');
      closeBtn.classList.remove('active');
      searchBtn.classList.remove('active');
      menuToggle.classList.remove('hide');
      clearInput();
      function clearInput() {
        document.getElementById('SH').value = '';
      }
    }
    menuToggle.onclick = function(){
      header.classList.toggle('open');
      searchBox.classList.remove('active');
      closeBtn.classList.remove('active');
      searchBtn.classList.remove('active');
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>