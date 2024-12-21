<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'php/db.php';

//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once 'php/functions.php';

$work = get_work($_GET['i']);
$site_title = strip_tags($work['intro']);
?>
<!DOCTYPE html>
<html lang="zh-TW">
 <head>
  <title><?php echo $site_title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 --> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
  <link rel="stylesheet" href="css/work_style.css?v=<?php echo time(); ?>"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"/>
  <link rel="shortcut icon" href="images/favicon.ico">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,500&display=swap" rel="stylesheet">
 </head>
 
 <body>
  <!-- 頁首 -->
  <?php include_once 'menu.php'; ?>
  <!--<div class="highspace"></div>-->
  <!-- 網站內容 -->
  <div class="content">
    <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
            <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
            <div class="col-xs-12">
                <?php if ($work): ?>
                    <div class="heading">
                        <div><?php echo $work['title'] ?></div>
                    </div>
                    <div class="text">
                        <div id="content1">
                            <img src='<?php echo $work['image_path']; ?>' class="img-fluid rounded float-left img-responsive mx-auto d-block">
                            <div class="par"><?php echo strip_tags(html_entity_decode($work['content'])); ?></div>
                            <br>
                            <h1>Travel tips</h1>
                            <ul>
                                <li><?php echo strip_tags(html_entity_decode($work['travel_tips1'])); ?></li>
                                <li style="margin-bottom: 20px;"><?php echo strip_tags(html_entity_decode($work['travel_tips2'])); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="more">
                        <div>More Photos</div>
                        <img src="./images/line1.jpg">
                        <div class="col-xs-6">
                            <img src='<?php echo $work['image_path_s1']; ?>' class="img-fluid rounded float-left">
                        </div>
                        <div class="col-xs-6">
                            <img src='<?php echo $work['image_path_s2']; ?>' class="img-fluid rounded float-left">
                        </div>
                    </div>
                    <hr><br>
                <?php else: ?>
                    <h3 class="text-center">No Such Work</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



  <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
 </body>
</html>