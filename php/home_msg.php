<?php
//載入資料庫與處理的方法
require_once 'db.php';
require_once 'functions.php';
$datetime = date("Y-m-d H:i:s",(time()+7*3600));
$id = $_SESSION['login_user_id'];
$A=$_POST['msg'];
//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
	$add_result = home_msg($id,$A);
	
	if($add_result)
	{
		//若為true 代表新增成功，印出yes
		header("Location: ../admin/login.php");
	}
	else
	{
		//若為 null 或者 false 代表失敗
		echo 'no';	
	}
}
else
{
	//若為 null 或者 false 代表失敗
	echo 'no';	
}

?>