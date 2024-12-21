<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，另外後台都會用 session 判別暫存資料，所以要請求 db.php 因為該檔案最上方有啟動session_start()。
require_once '../php/db.php';
require_once '../php/functions.php';
//print_r($_SESSION); //查看目前session內容

//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
if (!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
  //直接轉跳到 login.php
  header("Location: login.php");
}

//取得所有文章
$works = get_all_work();
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style2.css?v=<?php echo time(); ?>"/>
    <link rel="shortcut icon" href="../images/favicon.ico">
  </head>

  <body>
    <!-- 頁首 -->
		<?php
      include_once 'menu.php';?>
      <div style="height: 120px;"></div>
		
    <!-- 網站內容 -->
    <div class="head_out">
          <div class="head">Manage Post</div>
    </div>
    <div class="content" style="margin: 0px; width:100%;">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="addmem">
          <a href='work_add.php' class="btn btn-default addmembtn">+ New Post</a>
        </div>
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          
          <div class="col-xs-12">
          <div style="height: 20px;"></div>
            <!-- 資料列表 -->
            <table class="table table-hover table-striped tbf">
              <tr>
              <th style="vertical-align:middle; text-align:center;">Title</th>
              <th style="vertical-align:middle; text-align:center;">Intro</th>
              <th style="vertical-align:middle; text-align:center;">Content</th>
              <th style="vertical-align:middle; text-align:center;">Publication Status</th>
              <th style="vertical-align:middle; text-align:center;">Management Actions</th>

              </tr>
              <?php if($works):?>
                <?php foreach($works as $work):?>
                  <tr>
                    <td style="vertical-align:middle; text-align:center;"><?php echo $work['title']; ?></td>
                    <td style="vertical-align:middle; text-align:center;"><?php echo $work['intro']; ?></td>
                    <td style="vertical-align:middle; text-align: left;">
                        <?php
                        $content = strip_tags(html_entity_decode($work['content']));
                        $words = str_word_count($content, 1);
                        
                        if (count($words) > 30) {
                            $limitedContent = implode(' ', array_slice($words, 0, 30));
                            echo $limitedContent . '...';
                        } else {
                            echo $content;
                        }
                        ?>
                    </td>
                    <td style="vertical-align:middle; text-align:center;"><?php echo($work['publish']) ? "Published" : "Offline"; ?></td>
                    <td style="vertical-align:middle; text-align:center;">
                      <a href='work_edit.php?i=<?php echo $work['id']; ?>' class="btn btn-default" style="margin: 10px;">Edit</a>
                      <a href='javascript:void(0);' class='btn btn-default del_work' style="margin: 10px;" data-id="<?php echo $work['id']; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5">No data</td>
                </tr>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    <?php
      //include_once 'footer.php';
    ?>
    <div style="height: 50px;"></div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      $(document).on("ready", function() {

        //表單送出
        $("a.del_work").on("click", function() {
          //宣告變數
          var c = confirm("Are you sure you want to delete?"),
              this_tr = $(this).parent().parent();
          if (c) {
            $.ajax({
              type : "POST",
              url : "../php/del_work.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
              data : {
                id : $(this).attr("data-id") //文章id
              },
              dataType : 'html' //設定該網頁回應的會是 html 格式
            }).done(function(data) {
              //成功的時候

              if (data == "yes") {
                //註冊新增成功，轉跳到登入頁面。
                alert("Deletion successful. Click 'Confirm' to remove it from the list.");
                this_tr.fadeOut();
              } else {
                alert("Deletion Error:" + data);
              }

            }).fail(function(jqXHR, textStatus, errorThrown) {
              //失敗的時候
              alert("Error occurred, please check the console log.");
              console.log(jqXHR.responseText);
            });
          }

          return false;
        });
      });
    </script>
  </body>
</html>