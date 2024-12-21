
<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'php/db.php';

//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once 'php/functions.php';

$datas = get_publish_works();
?>


<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>NSBlog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"/>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap JS and Popper.js -->
    <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>

  </head>

  <body>
    
    <!-- 頁首 -->
		<?php include_once 'menu.php'; ?>
    <!-- 網站內容 -->
    <div class="highspace"></div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators" style="width: 100%; margin: 0px auto;">
        <?php foreach ($datas as $key => $item): ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $key; ?>" <?php echo ($key === 0) ? 'class="active"' : ''; ?> aria-label="Slide <?php echo $key + 1; ?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner" style="width: 100%; margin: 0px auto;">
        <?php foreach ($datas as $key => $item): ?>
            <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                <img src="<?php echo $item['image_path']; ?>" class="d-block w-100" alt="..." style="height: 600px; width: 100%; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 16px;"><?php echo $item['title']; ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>





<div style="height: 100px;"></div>
  <div class="start">
    <div class="start_in">
      <a href="work_list.php">
          <p class="Btn">Get Started!</p>
      </a>
    </div>
  </div>
<div style="height: 90px;"></div>
<div class="row" style="width: 80%; margin: 0px auto;">
  <img src="./images/line1.jpg" class="img-fluid" alt="Separator Image">
</div>
<div style="height: 50px;"></div>
<div class="content">
<div class="container">
  <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
  <div class="row">
    <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12 AUBox">
          <h1>About Us</h1>
          <p  class="AUCont">
            The following is the website builder of NSBlog. If you have any ideas about NSBlog, please let us know through the contact information below.
          </p>
        </div>
      </div>
      <!--<div class="row">
        <img src="./images/line1.jpg" class="img-fluid" alt="Separator Image">
      </div>-->
      <div style="height: 50px;"></div>
      <div class="allInformBox">
        <div class="row">
        <div class="col-md-6 col-lg-3 inform">
          <div class="in">
            <h1>Melody</h1>
            <p>
              Resbonsibility：
              <br>
              Student ID：B114020007
              <br>
              E-mail：<br><a href="mailto:melodywang117@gmail.com">melodywang117@gmail.com</a>
            </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 inform">
          <div class="in">
            <h1>Amy</h1>
            <p>
              Resbonsibility：
              <br>
              Student ID：B114020009
              <br>
              E-mail：<br><a href="mailto:amywang540917@gmail.com">amywang540917@gmail.com</a>
            </p>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3 inform">
          <div class="in">
            <h1>Hank</h1>
            <p>
              Resbonsibility：
              <br>
              Student ID：B114020008
              <br>
              E-mail：<br><a href="mailto:tnc100031015@gmail.com">tnc100031015@gmail.com</a>
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 inform">
          <div class="in">
            <h1>Yu-Cheng</h1>
            <p>
              Resbonsibility：
              <br>
              Student ID：B114020011
              <br>
              E-mail：<br><a href="mailto:bee19623@gmail.com">bee19623@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>
</div>


    <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
  </body>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'), {
      interval: 5000, // Set the desired interval in milliseconds
      wrap: true
    });
  });
</script>

</html>
