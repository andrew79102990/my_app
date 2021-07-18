<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>about</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="css/style.css"/>-->
    <!--<link rel="shortcut icon" href="images/favicon.ico">-->
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
            <div class="row">
              <div class="col-md-4">
                <h1>Contact</h1>
                <p>
                   為了解決醫護人員交接班與即時掌控現況患者生命跡象數據，於是我們開發了健康日誌系統這個專案。
                </p>
              </div>
              <div class="col-md-4">
                <h1>hadiary</h1>
                <p>
                  信箱：andrew79102990@gmail.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
    
  </body>
</html>
