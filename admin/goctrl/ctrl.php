<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，另外後台都會用 session 判別暫存資料，所以要請求 db.php 因為該檔案最上方有啟動session_start()。
require_once '../../php/db.php';
require_once '../../php/functions.php';
//print_r($_SESSION); //查看目前session內容
//如過沒有 $_SESSION['login_ctrl'] 這個值，或者 $_SESSION['login_ctrl'] 為 false 都代表沒登入權限
if(!isset($_SESSION['login_ctrl']) || !$_SESSION['login_ctrl'])
{
	//直接轉跳到 index.php
	header("Location: ../index.php");
}
//echo md5("");
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>後台</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="shortcut icon" href="../../images/favicon.ico">
  </head>

  <body>
    <!-- 頁首 -->
		<?php include_once 'menu.php'; ?>
		
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-xs-12">
            <div class="alert alert-success text-center" role="alert">
              管理者您好，請點上方管理選單，進行管理。
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    
  </body>
</html>
