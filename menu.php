<?php
//取得目前檔案的名稱。透過$_SERVER['PHP_SELF']先取得路徑
$current_file = $_SERVER['PHP_SELF'];
//echo $current_file; //查看目前取得的檔案完整
//然後透過 basename 取得檔案名稱，加上第二個參數".php"，主要是將取得的檔案去掉 .php 這副檔名稱
$current_file = basename($current_file , ".php");
//echo $current_file; //查看目前取得後的檔名

switch ($current_file) {
	case 'news_list':
	case 'news':
		//為文章列表或完整文章頁
		$index = 1;
		break;
	case 'work_list':
	case 'work':
		//為作品列表或完整作品頁
		$index = 2;
		break;
	case 'about':
		//為關於我們頁
		$index = 3;
		break;
	
	default:
		//預設索引為 0
		$index = 0;
		break;
}
?>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

  <div class="container">
  
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12" >
        <!--網站標題<h1 class="text-center">作品網站</h1>-->
        
        <!-- 選單 -->

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active" <?php echo ($index == 0)?'class="active"':'';?>>
					<a class="nav-link" href="index.php" style="font-size:18px;font-weight:bold;" >Home 首頁 /</a>
				</li>
				<li class="nav-item active" <?php echo ($index == 1)?'class="active"':'';?>>
					<a class="nav-link" href="news_list.php" style="font-size:18px;font-weight:bold;" >Latest news 最新消息 /</a>
				</li>
				<li class="nav-item active" <?php echo ($index == 2)?'class="active"':'';?>>
					<a class="nav-link" href="work_list.php" style="font-size:18px;font-weight:bold;" >Health education 衛教教學 /</a>
				</li>
				<li class="nav-item active" <?php echo ($index == 3)?'class="active"':'';?>>
					<a class="nav-link" href="about.php" style="font-size:18px;font-weight:bold;" >About 關於我們</a>
				</li>
				</ul>
			</div>
		  </nav>
		
		
			</div>
			</div>
		</div>

  <hr>
  