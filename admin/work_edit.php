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

//取得文章資料，從網址上的 i 取得文章id
$data = get_work($_GET['i']);
if (is_null($data))
{
  //如果文章是null就轉回列表頁
  header("Location: work_list.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>Portfolio Website - Admin Panel: Add New Work</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style3.css?v=<?php echo time(); ?>"/>
    <link rel="shortcut icon" href="../images/favicon.ico">
  </head>

  <body>
    <!-- 頁首 -->
    <?php
      include_once 'menu.php';
 ?>
    <div style="height: 120px;"></div>
    <!-- 網站內容 -->
    <div class="head_out">
          <div class="head">Edit Post</div>
    </div>
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-xs-12">
            <form id="edit_work_form">
			  <input type="hidden" id="id" value="<?php echo $data['id']; ?>">
			  <div class="form-group">
                <div class="awktitle" for="title">Title </div>
                <textarea type="input" class="form-control" id="title"><?php echo $data['title']; ?></textarea>
              </div>
              <div class="form-group">
                <div class="awktitle" for="intro">Introduction</div>
                <textarea type="input" class="form-control" id="intro"><?php echo $data['intro']; ?></textarea>
              </div>
              <div class="form-group">
                <div class="awktitle" for="content">Content </div>
                <textarea type="input" class="form-control" id="content"><?php echo $data['content']; ?></textarea>
              </div>
			  <div class="form-group">
                <div class="awktitle" for="travel_tips1">Travel_tips1 </div>
                <textarea type="input" class="form-control" id="travel_tips1"><?php echo $data['travel_tips1']; ?></textarea>
              </div>
			  <div class="form-group">
                <div class="awktitle" for="travel_tips2">Travel_tips2</div>
                <textarea type="input" class="form-control" id="travel_tips2"><?php echo $data['travel_tips2']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="category">Image Upload</label>
                <input type="file" name="image_path" accept="image/gif, image/jpeg, image/png">
                <input type="hidden" id="image_path" value="<?php echo($data['image_path']) ? $data['image_path'] : ''; ?>">
                <div class="image">
                  <?php if($data['image_path'] && file_exists("../" . $data['image_path'])):?>
                  <img class='img-thumbnail' src='<?php echo "../" . $data['image_path']; ?>'>
                  <?php endif; ?>
                </div>
                <a href='javascript:void(0);' class="del_image btn btn-default">Delete Photo</a>
              </div>
              <div class="form-group">
                <label for="category">Image Upload</label>
                <input type="file" name="image_path_s1" accept="image/gif, image/jpeg, image/png">
                <input type="hidden" id="image_path_s1" value="<?php echo($data['image_path_s1']) ? $data['image_path_s1'] : ''; ?>">
                <div class="image_s1">
                  <?php if($data['image_path_s1'] && file_exists("../" . $data['image_path_s1'])):?>
                  <img style="max-width: 300px;" src='<?php echo "../" . $data['image_path_s1']; ?>'>
                  <?php endif; ?>
                </div>
                <a href='javascript:void(0);' class="del_image_s1 btn btn-default">Delete Photo</a>
              </div>
			  <div class="form-group">
                <label for="category">Image Upload</label>
                <input type="file" name="image_path_s2" accept="image/gif, image/jpeg, image/png">
                <input type="hidden" id="image_path_s2" value="<?php echo($data['image_path_s2']) ? $data['image_path_s2'] : ''; ?>">
                <div class="image_s2">
                  <?php if($data['image_path_s2'] && file_exists("../" . $data['image_path_s2'])):?>
                  <img style="max-width: 300px;" src='<?php echo "../" . $data['image_path_s2']; ?>'>
                  <?php endif; ?>
                </div>
                <a href='javascript:void(0);' class="del_image_s2 btn btn-default">Delete Photo</a>
              </div>
              <div class="form-group Subway">
                <div class="radio-inline">
                  <input type="radio" name="publish" value="1" <?php echo($data['publish'] == 1) ? "checked" : ""; ?>>
                  publish
                </div>
                <div class="radio-inline">
                  <input type="radio" name="publish" value="0" <?php echo($data['publish'] == 0) ? "checked" : ""; ?>>
                  Do Not Publish
                </div>
                <div class="Subplace"></div>
                <button type="submit" class="btn btn-default postSub" style="font-size: 14px;">
                  Save
                </button>
              </div>
              
              <div class="loading text-center"></div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    <?php
      include_once 'footer.php';
 ?>

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
      		$("input[name='image_path']").on("change", function(){
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
    					type: 'POST',
				  		url: '../php/upload_file.php',
				    data: file_data,
				    cache: false,       //因為只有上傳檔案，所以不要暫存
				    processData: false, //因為只有上傳檔案，所以不要處理表單資訊
				    contentType: false,  //送過去的內容，由 FormData 產生了，所以設定false
				    dataType : 'html'
					}).done(function(data) {
						console.log(data);
						//上傳成功
						if(data == "yes")
						{
							//將檔案插入
							$("div.image").html("<img class='img-thumbnail' src='../" + save_path + file_name + "'>");
							//給予 #image_path 值，等等存檔時會用
							$("#image_path").val(save_path + file_name);
						}
						else
						{
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
      		//上傳圖片的input更動的時候
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
      		$("a.del_image").on("click", function(){
      			//如果有圖片路徑，就刪除該檔案
      			if($("#image_path").val() != '')
      			{
      				//透過ajax刪除
	      			$.ajax({
	    					type: 'POST',
					  		url: '../php/del_file.php',
					    data: {
					    		"file" : $("#image_path").val()
					    },
					    dataType : 'html'
						}).done(function(data) {
							console.log(data);
							//上傳成功
							if(data == "yes")
							{
								//將圖片標籤移除，並清空目前設定路徑
								$("div.image").html("");
								//給予 #image_path 值，等等存檔時會用
								$("#image_path").val('');
							}
							else
							{
								//警告回傳的訊息
								alert(data);
							}
							
						}).fail(function(data) {
							//失敗的時候
	          		alert("Error occurred, please check the console log.");
	          		console.log(jqXHR.responseText);
						});
      			}
      			else
      			{
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
        $("#edit_work_form").on("submit", function() {
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
              url : "../php/update_work.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
              data : {
                id : $("#id").val(),
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
                alert("Update successful, click 'Confirm' to return to the list.");
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
