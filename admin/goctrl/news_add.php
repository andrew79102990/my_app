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

?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>後台新增</title>
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
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-md-4">
            <form id="add_news_form">
              <div class="form-group">
                <label for="title">標題 </label>
                <input type="input" class="form-control" id="title">
              </div>
               <div class="form-group">
                <label for="category">分類</label>
                <select id="category" class="form-control">
                  <option value="最新消息">最新消息</option>
                  <option value="重要消息">重要消息</option>
                  <option value="一般消息">一般消息</option>
                  <option value="最新公告">最新公告</option>
                  <option value="重要公告">重要公告</option>
                </select>
              </div>
              <div class="form-group">
                <label for="content">內容</label>
                <textarea type="input" class="form-control" id="content"></textarea>
              </div>
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="publish" value="1" checked> 發布
                </label>
              </div>
              <button type="submit" class="btn btn-success">送出</button>
              <div class="loading text-center"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
		
    <!-- 頁底 -->
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    	$(document).on("ready", function(){
    		//表單送出
    		$("#add_news_form").on("submit", function(){
    			//加入loading icon
    			$("div.loading").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
    			
    			if($("#title").val() == '' || $("#content").val() == ''){
    				alert("請填入標題或內文");
    				
    				//清掉 loading icon
    				$("div.loading").html('');
    			}else{
					  //使用 ajax 送出 帳密給 php/add_news.php
						$.ajax({
	            type : "POST",
	            url : "../../php/add_news.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
	            data : {
	              title : $("#title").val(), //
	              category : $("#category").val(), //
	              content : $("#content").val(), //
	              publish : $("input[name='publish']:checked").val() //
	            },
	            dataType : 'html' //設定該網頁回應的會是 html 格式
	          }).done(function(data) {
	            //成功的時候
	            
	            if(data == "yes")
	            {
	              //註冊新增成功，轉跳到登入頁面。
	              alert("新增成功，點擊確認回列表");
	              window.location.href = "news_list.php";
	            }
	            else
	            {
	              alert("新增錯誤");
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
