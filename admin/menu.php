<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，另外後台都會用 session 判別暫存資料，所以要請求 db.php 因為該檔案最上方有啟動session_start()。
require_once '../php/db.php';
require_once '../php/functions.php';
//print_r($_SESSION); //查看目前session內容

//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	//直接轉跳到 login.php
	header("Location: login.php");
}

//取得目前檔案的名稱。透過$_SERVER['PHP_SELF']先取得路徑
$current_file = $_SERVER['PHP_SELF'];
//echo $current_file; //查看目前取得的檔案完整
//然後透過 basename 取得檔案名稱，加上第二個參數".php"，主要是將取得的檔案去掉 .php 這副檔名稱
$current_file = basename($current_file , ".php");
//echo $current_file; //查看目前取得後的檔名

switch ($current_file) {
	case 'big_list':
	
		//為工作日誌頁
		$index = 1;
		break;
	case 'big_search':
	
		//為作品列表或完整作品頁
		$index = 2;
		break;
	
	default:
		//預設索引為 0
		$index = 0;
		break;
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
    #textA{font-size:30px;font-weight:bold;}
</style>

  <div class="container">
  
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
       

        <!-- 選單-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active" class="active">
					<a class="nav-link" href="../" style="font-size:18px;font-weight:bold;" >Home / <br>回首頁</a>
				</li>
				<li class="nav-item active" <?php echo ($index == 0)?'class="active"':'';?>>
					<a class="nav-link" href="./" style="font-size:18px;font-weight:bold;" >Homepage / <br>後台主頁</a>
				</li>
				<li class="nav-item active" <?php echo ($index == 1)?'class="active"':'';?>>
					<a class="nav-link" href="big_list.php" style="font-size:18px;font-weight:bold;" >Health log / <br>健康日誌</a>
				</li>
				<li class="nav-item active" <?php echo ($index == 2)?'class="active"':'';?>>
					<a class="nav-link" href="big_search.php" style="font-size:18px;font-weight:bold;" >Historical data check / <br>資料查詢</a>
				</li>
				<li class="nav-item active" class="active">
					<a class="nav-link" href="../php/logout.php" style="font-size:18px;font-weight:bold;" >Logout<br>登出</a>
				</li>
				</ul>
			</div>
		  </nav>
        
      </div>
    </div>
  </div>

<hr>