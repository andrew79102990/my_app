<?php
//載入資料庫與處理的方法
require_once 'db.php';
require_once 'functions.php';
$datetime =  date("Y-m-d H:i:s",(time()+7*3600));
$un = $_POST['un'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$email = $_POST['email'];
$agree = $_POST['agree'];
$add_result  = check_has_username($un);
//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。


if($add_result)//true就傳回no
{
	//若查到有重複帳號 代表失敗，印出no
	echo 'no';
}
else//null就執行新增會員
{
	$add_result2 = add_user($datetime,$un,$pw,$name,$email,$agree);
	if($add_result2)
	{
		//若為true 代表新增成功，印出yes
		echo 'yes';
	}
	else
	{//若為 null 或者 false 代表失敗
		echo 'no';	
	}
}

?>