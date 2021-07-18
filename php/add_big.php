<?php
//載入資料庫與處理的方法
require_once 'db.php';
require_once 'functions.php';
@$datetime = date("Y-m-d H:i:s",(time()+7*3600));
@$A=$_SESSION['login_user_id'];
@$GCS=$_POST['E']+$_POST['V']+$_POST['M'];
@$username = $_SESSION['login_username'];
//var_dump($GCS);//判斷是否為空的值
//print_r($GCS);
//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	
	
	if($GCS!==0)
	{
		//執行新增使用者的方法，直接把整個 $_POST個別的照順序變數丟給方法。
		@$add_result = add_big($username,$datetime,$A,$_POST['MH'],$_POST['AH'],$_POST['OH'],$_POST['BT'],$_POST['HR'],$_POST['RR'],$_POST['SBP'],$_POST['DBP'],$_POST['SPO2'],$_POST['bloodsuger'],$_POST['E'],$_POST['V'],$_POST['M'],$GCS,$_POST['MP'],$_POST['Stool'],$_POST['Totbody'],$_POST['Ifood'],$_POST['Bathing'],$_POST['digestion'],$_POST['DHRW'],$_POST['TM'],$_POST['CHA']);
		
		if($add_result)
		{
			//若為true 代表新增成功，印出yes
			echo '您已成功新增了一筆工作日誌';
		}
		else
		{
			//若為 null 或者 false 代表失敗
			echo '新增工作日誌失敗';
		}
	}else
	{
		//若為 null 或者 false 代表失敗
		echo '新增失敗';
	}
}
else
{
	//若為 null 或者 false 代表失敗
	echo '系統新增資料有誤';
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<br><br><br><a href="../admin/big_list.php" id="#textA" class="btn btn-primary">return 返回</a>