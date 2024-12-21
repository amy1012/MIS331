<?php
require_once '../php/db.php';

if (!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>NSBlog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style3.css"/>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>

<body>
<?php include_once 'menu.php'; ?>
<div style="height: 120px;"></div>
<div class="head_out">
          <div class="head">Add Post</div>
    </div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form id="add_article_form">
                    <div class="form-group">
                        <div class="awktitle" for="title">Title</div>
                        <textarea type="input" class="form-control" id="title"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="awktitle" for="intro">Introduction</div>
                        <textarea type="input" class="form-control" id="intro"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="awktitle" for="content">Content</div>
                        <textarea type="input" class="form-control" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="awktitle" for="travel_tips1">Travel Tips 1</div>
                        <textarea type="input" class="form-control" id="travel_tips1"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="awktitle" for="travel_tips2">Travel Tips 2</div>
                        <textarea type="input" class="form-control" id="travel_tips2"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="awktitle" for="category">Image Upload</label>
                        <div class="btns">
                          <input type="file" name="image_path" accept="image/gif, image/jpeg, image/png">
                          <input type="hidden" id="image_path" value="">
                          </div>
                        <div class="image"></div>
                        <a href='javascript:void(0);' class="del_image btn btn-default">Delete Photo</a>
                    </div>
                    <!-- 小圖片上傳一 -->
                    <div class="form-group">
                        <label  class="awktitle" for="category">Image Upload</label>
                        <div class="btns">
                          <input type="file" name="image_path_s1" accept="image/gif, image/jpeg, image/png">
                          <input type="hidden" id="image_path_s1" value="">
                        </div>
                        <div class="image_s1" style="max-width: 100%;height: auto;"></div>
                        <a href='javascript:void(0);' class="del_image_s1 btn btn-default">Delete Photo</a>
                    </div>

                    <!-- 小圖片上傳二 -->
                    <div class="form-group">
                        <label class="awktitle" for="category">Image Upload</label>
                        <div class="btns">
                          <input type="file" name="image_path_s2" accept="image/gif, image/jpeg, image/png">
                          <input type="hidden" id="image_path_s2" value="">
                        </div>
                        <div class="image_s2"></div>
                        <a href='javascript:void(0);' class="del_image_s2 btn btn-default">Delete Photo</a>
                    </div>
                    <div class="form-group Subway">
                        <div class="radio-inline">
                            <input type="radio" name="publish" value="1" checked> Publish
                        </div>
                        <div class="radio-inline">
                            <input type="radio" name="publish" value="0"> Do Not Publish
                        </div>
                        <div class="Subplace"></div>
                        <button type="submit" class="btn btn-default postSub" style="font-size: 14px;">submit</button>
                    </div>
                    
                    <div class="loading text-center"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

    <!--Ckeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
            ClassicEditor
            .create( document.querySelector( '#content'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
          ClassicEditor
            .create( document.querySelector( '#travel_tips1'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#travel_tips2'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
      $(document).on("ready", function() {
        /**
         * 圖片上傳
         */
        //上傳圖片的input更動的時候
        $("input[name='image_path']").on("change", function() {
          //產生 FormData 物件
          var file_data = new FormData(),
              file_name = $(this)[0].files[0]['name'],
              save_path = "files/images/";

          //在圖片區塊，顯示loading
          $("div.image").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          //FormData 新增剛剛選擇的檔案
          file_data.append("file", $(this)[0].files[0]);
          file_data.append("save_path", save_path);
          //透過ajax傳資料
          $.ajax({
            type : 'POST',
            url : '../php/upload_file.php',
            data : file_data,
            cache : false, //因為只有上傳檔案，所以不要暫存
            processData : false, //因為只有上傳檔案，所以不要處理表單資訊
            contentType : false, //送過去的內容，由 FormData 產生了，所以設定false
            dataType : 'html'
          }).done(function(data) {
            console.log(data);
            //上傳成功
            if (data == "yes") {
              //將檔案插入
              $("div.image").html("<img class='img-thumbnail' src='../" + save_path + file_name + "'>");
              //給予 #image_path 值，等等存檔時會用
              $("#image_path").val(save_path + file_name);
            } else {
              //警告回傳的訊息
              alert(data);
            }

          }).fail(function(data) {
            //失敗的時候
            alert("Error occurred, please check the console log.");
            console.log(jqXHR.responseText);
          });
        });
        /**
         * 小圖片上傳一
         */
        $("input[name='image_path_s1']").on("change", function() {
          //產生 FormData 物件
          var file_data = new FormData(),
              file_name = $(this)[0].files[0]['name'],
              save_path = "files/images/";

          //在圖片區塊，顯示loading
          $("div.image_s1").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          //FormData 新增剛剛選擇的檔案
          file_data.append("file", $(this)[0].files[0]);
          file_data.append("save_path", save_path);
          //透過ajax傳資料
          $.ajax({
            type : 'POST',
            url : '../php/upload_file.php',
            data : file_data,
            cache : false, //因為只有上傳檔案，所以不要暫存
            processData : false, //因為只有上傳檔案，所以不要處理表單資訊
            contentType : false, //送過去的內容，由 FormData 產生了，所以設定false
            dataType : 'html'
          }).done(function(data) {
            console.log(data);
            //上傳成功
            if (data == "yes") {
              //將檔案插入
              $("div.image_s1").html("<img style='max-width: 300px;' src='../" + save_path + file_name + "'>");
              //給予 #image_path 值，等等存檔時會用
              $("#image_path_s1").val(save_path + file_name);
            } else {
              //警告回傳的訊息
              alert(data);
            }

          }).fail(function(data) {
            //失敗的時候
            alert("Error occurred, please check the console log.");
            console.log(jqXHR.responseText);
          });
        });
        /**
         * 小圖片上傳二
         */
        $("input[name='image_path_s2']").on("change", function() {
          //產生 FormData 物件
          var file_data = new FormData(),
              file_name = $(this)[0].files[0]['name'],
              save_path = "files/images/";

          //在圖片區塊，顯示loading
          $("div.image_s2").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          //FormData 新增剛剛選擇的檔案
          file_data.append("file", $(this)[0].files[0]);
          file_data.append("save_path", save_path);
          //透過ajax傳資料
          $.ajax({
            type : 'POST',
            url : '../php/upload_file.php',
            data : file_data,
            cache : false, //因為只有上傳檔案，所以不要暫存
            processData : false, //因為只有上傳檔案，所以不要處理表單資訊
            contentType : false, //送過去的內容，由 FormData 產生了，所以設定false
            dataType : 'html'
          }).done(function(data) {
            console.log(data);
            //上傳成功
            if (data == "yes") {
              //將檔案插入
              $("div.image_s2").html("<img style='max-width: 300px;' src='../" + save_path + file_name + "'>");
              //給予 #image_path 值，等等存檔時會用
              $("#image_path_s2").val(save_path + file_name);
            } else {
              //警告回傳的訊息
              alert(data);
            }

          }).fail(function(data) {
            //失敗的時候
            alert("Error occurred, please check the console log.");
            console.log(jqXHR.responseText);
          });
        });
        /**
         * 刪除照片
         */
        $("a.del_image").on("click", function() {
          //如果有圖片路徑，就刪除該檔案
          if ($("#image_path").val() != '') {
            //透過ajax刪除
            $.ajax({
              type : 'POST',
              url : '../php/del_file.php',
              data : {
                "file" : $("#image_path").val()
              },
              dataType : 'html'
            }).done(function(data) {
              console.log(data);
              //上傳成功
              if (data == "yes") {
                //將圖片標籤移除，並清空目前設定路徑
                $("div.image").html("");
                //給予 #image_path 值，等等存檔時會用
                $("#image_path").val('');
              } else {
                //警告回傳的訊息
                alert(data);
              }

            }).fail(function(data) {
              //失敗的時候
              alert("Error occurred, please check the console log.");
              console.log(jqXHR.responseText);
            });
          } else {
            alert("No files to delete.");
          }
        });
        /**
         * 刪除小照片一
         */
        $("a.del_image_s1").on("click", function() {
          //如果有圖片路徑，就刪除該檔案
          if ($("#image_path_s1").val() != '') {
            //透過ajax刪除
            $.ajax({
              type : 'POST',
              url : '../php/del_file.php',
              data : {
                "file" : $("#image_path_s1").val()
              },
              dataType : 'html'
            }).done(function(data) {
              console.log(data);
              //上傳成功
              if (data == "yes") {
                //將圖片標籤移除，並清空目前設定路徑
                $("div.image_s1").html("");
                //給予 #image_path 值，等等存檔時會用
                $("#image_path_s1").val('');
              } else {
                //警告回傳的訊息
                alert(data);
              }

            }).fail(function(data) {
              //失敗的時候
              alert("Error occurred, please check the console log.");
              console.log(jqXHR.responseText);
            });
          } else {
            alert("No files to delete.");
          }
        });
        /**
         * 刪除小照片二
         */
        $("a.del_image_s2").on("click", function() {
          //如果有圖片路徑，就刪除該檔案
          if ($("#image_path_s2").val() != '') {
            //透過ajax刪除
            $.ajax({
              type : 'POST',
              url : '../php/del_file.php',
              data : {
                "file" : $("#image_path_s2").val()
              },
              dataType : 'html'
            }).done(function(data) {
              console.log(data);
              //上傳成功
              if (data == "yes") {
                //將圖片標籤移除，並清空目前設定路徑
                $("div.image_s2").html("");
                //給予 #image_path 值，等等存檔時會用
                $("#image_path_s2").val('');
              } else {
                //警告回傳的訊息
                alert(data);
              }

            }).fail(function(data) {
              //失敗的時候
              alert("Error occurred, please check the console log.");
              console.log(jqXHR.responseText);
            });
          } else {
            alert("No files to delete.");
          }
        });

        //表單送出
        $("#add_article_form").on("submit", function() {
          
          //加入loading icon
          $("div.loading").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          if ($("#title").val() == ''||$("#intro").val() == ''||$("#content").val() == ''||$("#travel_tips1").val() == ''||$("#travel_tips2").val() == '') {
            alert("Some content is still not filled in.");

            //清掉 loading icon
            $("div.loading").html('');
          } else {
            //使用 ajax 送出 帳密給 verify_user.php
            $.ajax({
              type : "POST",
              url : "../php/add_work.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
              data : {
                title : $("#title").val(), //標題
                intro : $("#intro").val(), //介紹
                content : $("#content").val(), //內容
                travel_tips1 : $("#travel_tips1").val(), //tips1
                travel_tips2 : $("#travel_tips2").val(), //tips2
                image_path : $("#image_path").val(), //圖片路徑
                image_path_s1 : $("#image_path_s1").val(), //小圖片路徑一
                image_path_s2 : $("#image_path_s2").val(), //小圖片路徑二
                publish : $("input[name='publish']:checked").val() //發布狀況
              },
              dataType : 'html' //設定該網頁回應的會是 html 格式
            }).done(function(data) {

              //成功的時候
              if (data == "yes") {
                //註冊新增成功，轉跳到登入頁面。
                alert("Addition successful, click 'Confirm' to return to the list.");
                window.location.href = "work_list.php";
              } else {
                alert("Update Error");
                console.log(data);
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
