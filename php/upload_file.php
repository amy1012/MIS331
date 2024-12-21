<?php

	//處理上傳的檔案 圖片
	//file_exists 方法，是判別該檔案是否存在 server 上
	if(file_exists($_FILES['file']['tmp_name']))
	{
		//先定義上傳的資料夾
		$img_folder = $_POST['save_path'];
		
		//取得圖檔原來的名稱
		$file_name = $_FILES['file']['name'];
		
		//如果存在就 搬移檔案 move_uploaded_file 方法是將上傳的檔案，移動到網站資料夾正確定義的位置
		//第一個變數，通常是上傳後暫存的檔案位置，第二個變數，是搬移的目標檔案及位置
		// $img_folder . $file_name 其實是 files/images/圖檔檔名.jpg
		// 由於 work_save.php 這隻檔案在 php 資料夾中，但圖檔是要上傳到「上一層裡找到 files資料夾」，所以搬移的上傳位置要加上 ../ 
		if(move_uploaded_file($_FILES['file']['tmp_name'], "../" . $img_folder . $file_name))
		{
			echo "yes";
		}
		else
		{
			echo "File move failed. Please ensure that the '{$_POST['save_path']}' directory is writable.";
		}
		
		//由於有上傳圖檔，所以要存到資料庫的 post 資訊 要加上 image_path 欄位，其內容是搬移到的新位置，不用加上 ../ 唷
		$_POST["image_path"] = $img_folder . $file_name;
	}
	else
	{
		echo "Temporary file does not exist. Upload failed.";
	}
	
	
?>