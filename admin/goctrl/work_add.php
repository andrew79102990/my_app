<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once '../../php/db.php';

//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once '../../php/functions.php';
//取得所有文章
$works = get_all_work();
$datas = get_publish_works();


//如過沒有 $_SESSION['login_ctrl'] 這個值，或者 $_SESSION['login_ctrl'] 為 false 都代表沒登入權限
if(!isset($_SESSION['login_ctrl']) || !$_SESSION['login_ctrl'])
{
	//直接轉跳到 index.php
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>衛教管理後台</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css"/>
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
        
          
          <div class="col-md-12">
            <!-- 資料列表 -->
            <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>簡介</th>
                <th>圖片路徑</th>
                <th>影片路徑</th>
                <th>發佈狀況</th>
                <th>管理動作</th>
              </tr>
              </thead>
              <?php if($works):?>
                <?php foreach($works as $work):?>
                  <tr>
                    <td><?php echo $work['intro']; ?></td>
                    <td><?php echo $work['image_path']; ?></td>
                    <td><?php echo $work['video_path']; ?></td>
                    <td><?php echo($work['publish']) ? "發布" : "下架中"; ?></td>
                    <td>
                      <a href='javascript:void(0);' class='btn btn-danger del_work' data-id="<?php echo $work['id']; ?>">刪除</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5">無資料</td>
                </tr>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    <form id="add_article_form">
              <div class="form-group">
                <label for="title">簡介 </label>
                <textarea type="input" class="form-control" id="intro"></textarea>
              </div>
              <div class="form-group">
                <label for="category">圖片上傳</label>
                <input type="file" name="image_path" accept="image/gif, image/jpeg, image/png">
                <input type="hidden" id="image_path" value="">
                <div class="image"></div>
                <a href='javascript:void(0);' class="del_image btn btn-danger">刪除照片</a>
              </div>
              <div class="form-group">
                <label for="category">影片上傳</label>
                <input type="file" name="video_path" accept="video/mp4">
                <input type="hidden" id="video_path" value="">
                <div class="video"></div>
                <a href='javascript:void(0);' class="del_video btn btn-danger">刪除影片</a>
              </div>
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="publish" value="1" checked>
                  發布 </label>
                
              </div>
              <button type="submit" class="btn btn-success">
                儲存
              </button>
              <div class="loading text-center"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      $(document).on("ready", function() {

        //表單送出
        $("a.del_work").on("click", function() {
          //宣告變數
          var c = confirm("您確定要刪除嗎？"),
              this_tr = $(this).parent().parent();
          if (c) {
            $.ajax({
              type : "POST",
              url : "../../php/del_work.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
              data : {
                id : $(this).attr("data-id") //文章id
              },
              dataType : 'html' //設定該網頁回應的會是 html 格式
            }).done(function(data) {
              //成功的時候

              if (data == "yes") {
                //註冊新增成功，轉跳到登入頁面。
                alert("刪除成功，點擊確認從列表移除");
                this_tr.fadeOut();
              } else {
                alert("刪除錯誤:" + data);
              }

            }).fail(function(jqXHR, textStatus, errorThrown) {
              //失敗的時候
              alert("有錯誤產生，請看 console log");
              console.log(jqXHR.responseText);
            });
          }

          return false;
        });
      });
    </script>








    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-xs-12">
            

    <!-- 頁底 -->
    

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      $(document).on("ready", function() {
        /**
         * 圖片上傳
         */
        //上傳圖片的input更動的時候
        $("input[name='image_path']").on("change", function() {
          //產生 FormData 物件
          var file_data = new FormData(),
              file_name = $(this)[0].files[0]['name'],
              save_path = "files/images/";

          //在圖片區塊，顯示loading
          $("div.image").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          //FormData 新增剛剛選擇的檔案
          file_data.append("file", $(this)[0].files[0]);
          file_data.append("save_path", save_path);
          //透過ajax傳資料
          $.ajax({
            type : 'POST',
            url : '../../php/upload_file.php',
            data : file_data,
            cache : false, //因為只有上傳檔案，所以不要暫存
            processData : false, //因為只有上傳檔案，所以不要處理表單資訊
            contentType : false, //送過去的內容，由 FormData 產生了，所以設定false
            dataType : 'html'
          }).done(function(data) {
            console.log(data);
            //上傳成功
            if (data == "yes") {
              //將檔案插入
              $("div.image").html("<img src='../../" + save_path + file_name + "'>");
              //給予 #image_path 值，等等存檔時會用
              $("#image_path").val(save_path + file_name);
            } else {
              //警告回傳的訊息
              alert(data);
            }

          }).fail(function(data) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
          });
        });

        /**
         * 影片上傳
         */
        //上傳圖片的input更動的時候
        $("input[name='video_path']").on("change", function() {
          //產生 FormData 物件
          var file_data = new FormData(),
              file_name = $(this)[0].files[0]['name'],
              save_path = "files/videos/";

          //在影片區塊，顯示loading
          $("div.video").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          //FormData 新增剛剛選擇的檔案
          file_data.append("file", $(this)[0].files[0]);
          file_data.append("save_path", save_path);
          //透過ajax傳資料
          $.ajax({
            type : 'POST',
            url : '../../php/upload_file.php',
            data : file_data,
            cache : false, //因為只有上傳檔案，所以不要暫存
            processData : false, //因為只有上傳檔案，所以不要處理表單資訊
            contentType : false, //送過去的內容，由 FormData 產生了，所以設定false
            dataType : 'html'
          }).done(function(data) {
            console.log(data);
            //上傳成功
            if (data == "yes") {
              //將檔案插入
              $("div.video").html("<video src='../../" + save_path + file_name + "' controls>");
              //給予 #image_path 值，等等存檔時會用
              $("#video_path").val(save_path + file_name);
            } else {
              //警告回傳的訊息
              alert(data);
            }

          }).fail(function(data) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
          });
        });

        /**
         * 刪除照片
         */
        $("a.del_image").on("click", function() {
          //如果有圖片路徑，就刪除該檔案
          if ($("#image_path").val() != '') {
            //透過ajax刪除
            $.ajax({
              type : 'POST',
              url : '../../php/del_file.php',
              data : {
                "file" : $("#image_path").val()
              },
              dataType : 'html'
            }).done(function(data) {
              console.log(data);
              //上傳成功
              if (data == "yes") {
                //將圖片標籤移除，並清空目前設定路徑
                $("div.image").html("");
                //給予 #image_path 值，等等存檔時會用
                $("#image_path").val('');
              } else {
                //警告回傳的訊息
                alert(data);
              }

            }).fail(function(data) {
              //失敗的時候
              alert("有錯誤產生，請看 console log");
              console.log(jqXHR.responseText);
            });
          } else {
            alert("無檔案可以刪除");
          }
        });

        /**
         * 刪除影片
         */
        $("a.del_video").on("click", function() {
          //如果有影片路徑，就刪除該檔案
          //如果有圖片路徑，就刪除該檔案
          if ($("#video_path").val() != '') {
            //透過ajax刪除
            $.ajax({
              type : 'POST',
              url : '../../php/del_file.php',
              data : {
                "file" : $("#video_path").val()
              },
              dataType : 'html'
            }).done(function(data) {
              console.log(data);
              //上傳成功
              if (data == "yes") {
                //將影片標籤移除，並清空目前設定路徑
                $("div.video").html("");
                //給予 #image_path 值，等等存檔時會用
                $("#video_path").val('');
              } else {
                //警告回傳的訊息
                alert(data);
              }

            }).fail(function(data) {
              //失敗的時候
              alert("有錯誤產生，請看 console log");
              console.log(jqXHR.responseText);
            });
          } else {
            alert("無檔案可以刪除");
          }
        });







        //表單送出
        $("#add_article_form").on("submit", function() {
          //加入loading icon
          $("div.loading").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');

          if ($("#intro").val() == '') {
            alert("簡介未填寫");

            //清掉 loading icon
            $("div.loading").html('');
          } else {
            //使用 ajax 送出 帳密給 verify_user.php
            $.ajax({
              type : "POST",
              url : "../../php/add_work.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
              data : {
                intro : $("#intro").val(), //介紹
                image_path : $("#image_path").val(), //圖片路徑
                video_path : $("#video_path").val(), //影片路徑
                publish : $("input[name='publish']:checked").val() //發布狀況
              },
              dataType : 'html' //設定該網頁回應的會是 html 格式
            }).done(function(data) {

              //成功的時候
              if (data == "yes") {
                //註冊新增成功，轉跳到登入頁面。
                alert("新增成功，點擊確認回列表");
                window.location.href = "work_add.php";
              } else {
                alert("更新錯誤");
                console.log(data);
              }

            }).fail(function(jqXHR, textStatus, errorThrown) {
              //失敗的時候
              alert("有錯誤產生，請看 console log");
              console.log(jqXHR.responseText);
            });
          }
          return false;
        });
      });
    </script>
  </body>
</html>
