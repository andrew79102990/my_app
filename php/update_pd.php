<?php
//載入資料庫與處理的方法
require_once 'db.php';
require_once 'functions.php';
//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	header("Location: ../admin/login.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>updatepd</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="shortcut icon" href="../images/favicon.ico">-->
  </head>
<body>	   

	<div class="row">
    <div class="alert alert-primary">
            <h1>Change Password<br>修改密碼</h1>
            <form method="POST" action="post_pd.php">
			<div class="form-group">
                <label for="password">Please enter a new password<br>請輸入新密碼</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Please enter 7-12 alphanumeric password(請輸入7-12英數字密碼)" required pattern="[0-9a-zA-Z]{7,12}">
              </div>
              <button type="submit" class="btn btn-success">
              Update password 更新密碼
              </button>
            </form>

    </div>
    </div>

    <!-- 頁底 -->
    <div class="footer">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <p class="text-center">
        <?php echo "Copyright"?> &copy; <?php echo date("Y ") 
          ?>
          Hadiary All rights reserved.
        </p>
      </div>
    </div>
  </div>
</div>
</body>
</html>

