<?php
//載入資料庫與處理的方法
require_once '../php/db.php';
require_once '../php/functions.php';
//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	header("Location: ../admin/login.php");
}else{
		//執行檢查有無使用者的方法。
		$check = get_email($_POST['username'],$_POST['email']);
		
			if($check)
			{

				//若有使用者轉跳到update_pd.php
				header("Location:update_pd.php");
				
			}else
			{
				//若為 null 或者 false 代表沒有使用者轉跳到 login.php
				
				header("Location: ../admin/login.php");	
			}
		}
?>