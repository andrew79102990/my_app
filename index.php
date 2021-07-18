<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'php/db.php';
require_once 'php/functions.php';
require_once 'menu.php';
@$id=1;
@$msg = get_ctrl_msg($id);
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>Hadiary</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css"/>-->
    <!--<link rel="shortcut icon" href="images/favicon.ico">-->
    </head>
  <style>
      
</style>
  <body>
    <!-- 頁include_once 'menu.php';首 -->
    <?php include_once 'menu.php'; ?>
    <!-- 網站內容 -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>您好!</strong> 為提供良好的使用體驗，本站使用Cookies技術。若您繼續瀏覽本網站，表示您同意本網站使用Cookies。關於更多Cookies資訊，請閱讀本站的隱私權政策。<br>
  <strong>Hello there!</strong> In order to provide a good experience, this website uses cookie technology. By continuing to browse this website, you agree to the use of cookies on this website. For more information on cookies, please read our privacy policy.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<marquee onMouseOver="this.stop()" onMouseOut="this.start()"><?php echo $msg['msg']; ?></marquee>

<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
<div class="content">
  <div class="container">        
    <div class="row">
        
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          
        
          <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded-pill">
                  
                  <div class="card-body">
                    <h1 class="card-title">Register</h1>
                    <p class="card-text">You can register here and start using the trial version.<br>
                    您可透過此立即註冊，並開始使用試用版本。</p>
                    <a href="register.php" class="btn btn-success">Now try it  / 註冊開始試用</a>
                  </div>
                </div>
          </div>
          
          <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded-pill">
                  
                  <div class="card-body">
                    <h1 class="card-title">Welcome</h1>
                    
                    <p class="card-text">You can log in to the background to try out your health log<br>
                                         您可透過此登入後台，進行您今日健康日誌或工作</p>
                    <a href="admin/login.php" class="btn btn-success">Login / 登入</a>
                  </div>
                </div>
          </div>        
          
          <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded rounded-pill">
              <div class="card-body">                
              <h1 class="card-title">About hadiary</h1>
                    <p class="card-text">這裡要嵌入youtube影片</p>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
<hr>
<!-------------------------------------------------------------bootstrap幻燈片RWD套版----------------------------------------------------------

<div class="row">
      <div class="col-md-1">
      </div>
        <div class="col-md-10">
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active " data-interval="3000">
                            <img src="images/1.jpg" class="d-block w-100" width="100" height="300">
                                <div class="carousel-caption d-md-block">
                                <h1>卓越世代</h1>
                                </div>
                            </div>
                            <div class="carousel-item" data-interval="2000">
                            <img src="images/2.jpg" class="d-block w-100" width="100" height="300">
                                <div class="carousel-caption d-md-block">
                                <h1>您追求的</h1>
                                </div>
                            </div>
                            <div class="carousel-item">
                            <img src="images/3.jpg" class="d-block w-100" width="100" height="300">
                                <div class="carousel-caption d-md-block">
                                <h1>是什麼呢</h1>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
        </div>            
        <div class="col-md-1">
      </div>
</div>
   
<hr>-->

    <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
    
  </body>
</html>
