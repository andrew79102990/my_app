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
//取得所有會員
$users = get_all_user();
@$usersearch = $_POST['username'];
$user = search_user($usersearch);//送給方法去撈單筆會員查詢
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="shortcut icon" href="../../images/favicon.ico">
  </head>

  <body>
    <!-- 頁首 -->
		<?php include_once 'menu.php'; ?>
		
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第1個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          
          <div class="col-xs-12">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
                            <form  action="user_ctrl.php" method="POST">        
                            <input class="form-control form-control-dark w-100" type="text" name="username"  placeholder="請輸入您要查詢的案件編號" aria-label="Search">
                            <button type="submit" class="btn btn-success">查詢</button>
                            </form>
                            
                        </div>
                        <h1>單筆帳號資料查詢</h1>
                                    <!-- 單筆資料列表 -->            
            <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th width="5%" scope="col">註冊時間</th>
                <th width="5%" scope="col">帳號</th>
                <th width="5%" scope="col">身份</th>
                <th width="80%" scope="col">信箱</th>
                <th width="5%" scope="col">權限</th>                
              </tr>
              </thead>
              <?php if($user):?>
                <?php foreach($user as $user):?>
                  <tr>
                    <td><?php echo $user['datetime'];?></td>
                    <td><?php echo $user['username'];?></td>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['ctrl'];?></td>                    
                  </tr>
                <?php endforeach;?>
              <?php else:?>
                <tr>
                  <td colspan="5">無資料</td>
                </tr>
              <?php endif;?>
            </table>
            <hr>
            <h1>目前所有帳號資料</h1>
            <!-- 資料列表 -->            
            <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th width="5%" scope="col">註冊時間</th>
                <th width="5%" scope="col">帳號</th>
                <th width="5%" scope="col">身份</th>
                <th width="80%" scope="col">信箱</th>
                <th width="5%" scope="col">權限</th>                
              </tr>
              </thead>
              <?php if($users):?>
                <?php foreach($users as $users):?>
                  <tr>
                    <td><?php echo $users['datetime'];?></td>
                    <td><?php echo $users['username'];?></td>
                    <td><?php echo $users['name'];?></td>
                    <td><?php echo $users['email'];?></td>
                    <td><?php echo $users['ctrl'];?></td>                    
                  </tr>
                <?php endforeach;?>
              <?php else:?>
                <tr>
                  <td colspan="5">無資料</td>
                </tr>
              <?php endif;?>
            </table>
            <div class="col-md-1">
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    
  </body>
</html>
