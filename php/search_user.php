<?php
//載入資料庫與處理的方法
require_once 'db.php';
require_once 'functions.php';
//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
$search_user = search_user($_POST['username']);

if($add_result)
{
	//若為true 代表新增成功，印出yes
    header("Location: ../admin/goctrl/user_ctrl.php");
}
else
{
	//若為 null 或者 false 代表失敗
	echo 'no';	
}

?>