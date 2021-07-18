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
//取得所有留言
$msgs = get_all_msgs();
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
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          
          <div class="col-xs-12">
            <!-- 資料列表 -->            
            <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th width="5%" scope="col">帳號</th>
                <th width="5%" scope="col">類別</th>
                <th width="20%" scope="col">留言內容</th>
                <th width="10%" scope="col">留言時間</th>
                <th width="20%" scope="col">管理回覆</th>
                <th width="40%" scope="col">執行</th>
              </tr>
              </thead>
              <?php if($msgs):?>
                <?php foreach($msgs as $msgs):?>
                  <tr>
                    <td><?php echo $msgs['username'];?></td>
                    <td><?php echo $msgs['sel'];?></td>
                    <td><?php echo $msgs['msg'];?></td>
                    <td><?php echo $msgs['datetime3'];?></td>
                    <td><?php echo $msgs['msg_qa'];?></td>
                    <td>
                        <form method="POST" action="../../php/msg_qa.php">                                    
                            <div class="form-group" id='textA'>
                                  <h1>回覆</h1>
                                                <div class="form-group" id='textA'>
                                                  <label for="userid">userid</label>
                                                  <select class="form-control" id="userid" name="userid"  style="font-size:27px">
                                                    <option><?php echo $msgs['id'];?></option>                                                  
                                                  </select>
                                                </div>
                                  <textarea type="input" style="font-size:27px" class="form-control" id="msg_qa" name="msg_qa" placeholder="請輸入內容" required></textarea>
                                </div>
                                <button type="submit" style="font-size:27px" class="btn btn-success">
                                    送出
                                </button>
                        </form>
                    </td>
                  </tr>
                <?php endforeach;?>
              <?php else:?>
                <tr>
                  <td colspan="5">無資料</td>
                </tr>
              <?php endif;?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 頁底 -->
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    	$(document).on("ready", function(){
    		
    		//表單送出
    		$("a.del_news").on("click", function(){
    			//宣告變數
    			var c = confirm("您確定要刪除嗎？"),
    					this_tr = $(this).parent().parent();
    			if(c){
    				$.ajax({
            type : "POST",
            url : "../../php/del_news.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
            data : {
              id : $(this).attr("data-id") //文章id
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            //成功的時候
            
            if(data == "yes")
            {
              //註冊新增成功，轉跳到登入頁面。
              alert("刪除成功，點擊確認從列表移除");
              this_tr.fadeOut();
            }
            else
            {
              alert("刪除錯誤:"+data);
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
