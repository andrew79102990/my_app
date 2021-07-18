<?php
//載入資料庫與處理的方法
require_once 'db.php';
require_once 'functions.php';
$id=$_SESSION['update_patientbyid'];
//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
	$update_result = update_patient($id,$_POST['MH'],$_POST['AH'],$_POST['OH'],$_POST['Stool'],$_POST['Totbody'],$_POST['Ifood'],$_POST['Bathing'],$_POST['digestion'],$_POST['DHRW'],$_POST['TM'],$_POST['CHA']);
	
	if($update_result)
	{
		//若為true 代表新增成功，印出yes
		echo '您已成功更新此個案資料';
	}
	else
	{
		//若為 null 或者 false 代表失敗
		echo '個案資料更新失敗';	
	}
}
else
{
	//若為 null 或者 false 代表失敗
	echo '個案資料更新失敗';	
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<br><br><br><a href="../admin/caregiver.php" id="#textA" class="btn btn-primary">返回</a>