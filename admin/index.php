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
if($_SESSION['login_user_name']==="Free trial user 免費試用"){
  //del_big_free($_SESSION['login_user_id']);

}elseif($_SESSION['login_user_name']==="Caregiver 照顧者"){
  echo "歡迎進入照顧系統後台";
  header("Location: caregiver.php");
}
elseif($_SESSION['login_ctrl']==="管理者"){
  echo "歡迎進入照顧系統後台";
  header("Location: goctrl/ctrl.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    <link rel="stylesheet" href="../css/style.css"/>
    <!--<link rel="shortcut icon" href="../images/favicon.ico">-->
  </head>
  <script>
function xxx()
{
   location.href='../php/logout.php';
}
</script>

<body onload="setTimeout('xxx()', 1440000)"><!--24分鐘內沒動作自動導入登出端，滑鼠移動就重新計算倒數登出秒數-->
  
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
            Dear user, please click the menu above to work today.<br>尊敬的用戶您好，請點上方選單，開始今日的工作吧。
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#8BC34A" data-apps="JTdCJTIyc2t5cGUlMjI6JTIyYW5kcmV3NzkxMDI5OTAlMjIsJTIyZW1haWwlMjI6JTIyYW5kcmV3NzkxMDI5OTBAZ21haWwuY29tJTIyJTdE"></script>
    <!-- 頁底 -->
<hr>
<div class="footer">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <p class="text-center">
        <?php echo "Copyright"?> &copy; <?php echo date("Y ") ;
          ?>
          Hadiary All rights reserved.
        </p>
      </div>
    </div>
  </div>
</div>    
  </body>
</html>
