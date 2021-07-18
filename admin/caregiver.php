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
	header("Location: index.php");
}

//取得所有被照顧者個案
$Patients = get_all_Patients();
//$id=$_SESSION['login_user_id'];
//$msg = get_msg($id);
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>Caregiver</title>
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
  <script>
function xxx()
{
   location.href='../php/logout.php';
}
</script>

<body onload="setTimeout('xxx()', 1440000)"><!--24分鐘內沒動作自動導入登出端，滑鼠移動就重新計算倒數登出秒數-->
    <!-- 頁首 -->
		
		<hr>
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          
          <div class="col-md-4 text-center" style="width: 18rem;" >
                <div class="card shadow p-3 mb-5 bg-white rounded-pill">
                <h1><a href="new_patients.php" class="">Add case<br>新增個案</a></h1>
                </div>
                <div class="card shadow p-3 mb-5 bg-white rounded-pill">
                <h1><a href="patient_all_search.php" class="">All cases<br>個案總表</a></h1>
                </div>
                <div class="card shadow p-3 mb-5 bg-white rounded-pill">
                <h1><a href="../work_list.php" class="">Health education<br>衛教知識</a></h1>
                </div>
                <div class="card shadow p-3 mb-5 bg-white rounded-pill">
                <h1><a href="../php/logout.php" class="">Logout<br>按此登出</a></h1>
                </div>
                        <!--<div class="card-body">          
                        <div class="alert alert-primary">
                              <h1>Make a suggestion<br>留言</h1>
                                <form method="POST" action="../php/msg_post.php">                                    
                                    <div class="form-group" id='textA'>                        
                                        <select class="form-control" id="select" name="select"  style="font-size:27px" required>
                                        <option>Evaluation content 評估內容</option>
                                        <option>Layout design 版面設計</option>
                                        <option>Content correction 內容修正</option>
                                        <option>Professional guidance 專業指導</option>
                                        <option>other suggestion 其他建議</option>                        
                                        </select>
                                    </div>
                                        <div class="form-group" id='textA'>
                                          <textarea type="input" style="font-size:27px" class="form-control" id="msg" name="msg" placeholder="Please enter content 請輸入內容" required></textarea>
                                        </div>
                                        <button type="submit" style="font-size:27px" class="btn btn-success">
                                        Submit 送出
                                        </button>
                                </form>
                        </div>
                        </div>-->
           </div>
          <div class="col-md-8 text-center" style="width: 18rem;" >
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                      <th width="50%" scope="col">Numbering / 編號</th>
                      <th width="50%" scope="col"> action / 執行</th>
                      
                    </tr>
                  </thead>
                  <?php if($Patients):?>
                    <?php foreach($Patients as $Patient):?>
                              <tr>  
                                  <td ><a href="" class="btn btn-primary">Case name個案名稱 :<br><?php echo $Patient['patientname'];?></a><br><br>
                                       <a href="patient_list.php?i=<?php echo $Patient['patientname'];?>" class="btn btn-primary">Add data<br>新增資料</a><br><br>
                                       <a href="patient_search.php?i=<?php echo $Patient['patientname'];?>" class="btn btn-primary">Historical information<br.>查詢資料</a></td>
                                  <td ><a href='patient_edit.php?i=<?php echo $Patient['id'];?>' class="btn btn-secondary">edit<br>修改</a><br><br>
                                        <a href='javascript:void(0);' class='btn btn-danger del_Patient' data-id="<?php echo $Patient['id'];?>">delete<br>刪除</a>
                                  </td>
                                  
                              </tr>  
                              <?php endforeach;?>
                            <?php else:?>
                          <tr>
                            <td colspan="2">無資料</td>
                          </tr>
                  <?php endif;?>
                </table>
            </div>
          </div>


        </div>
      </div>
    </div>
<!-- 建立第一個 row 空間，裡面準備放格線系統 
<div class="row">       
    <div class="col-md-1">
    </div>
    <div class="col-md-5 card" style="width: 18rem;" >    
        <div class="card-body">
          <h1>Status 狀態</h1>
          <p></p>
        </div>
    </div>
    <div class="col-md-5 card" style="width: 18rem;" >    
        <div class="card-body">
          <h1>Reply 回覆</h1>
          <p></p>
        </div>
    </div>
    <div class="col-md-1">
    </div>    
</div>-->
    <!-- 頁底 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    	$(document).on("ready", function(){
    		
    		//表單送出
    		$("a.del_Patient").on("click", function(){
    			//宣告變數
    			var c = confirm("Are you sure you want to delete it? 您確定要刪除嗎？"),
    					this_tr = $(this).parent().parent();
    			if(c){
    				$.ajax({
            type : "POST",
            url : "../php/del_Patient.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
            data : {
              id : $(this).attr("data-id") //文章id
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            //成功的時候
            
            if(data == "yes")
            {
              //註冊新增成功，轉跳到登入頁面。
              alert("successfully deleted，刪除成功");
              this_tr.fadeOut();
            }
            else
            {
              alert("There is an error，有錯誤產生");
            }
            
          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗的時候
            alert("There is an error，有錯誤產生");
            console.log(jqXHR.responseText);
          });
    			}
					
          
    			return false;
    		});
    	});
    </script>
    
<div class="footer">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <!--  Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#8BC34A" data-apps="JTdCJTIyc2t5cGUlMjI6JTIyYW5kcmV3NzkxMDI5OTAlMjIsJTIyZW1haWwlMjI6JTIyYW5kcmV3NzkxMDI5OTBAZ21haWwuY29tJTIyJTdE"></script>
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <p class="text-center">
        <?php echo "Copyright"?> &copy; <?php echo date("Y "); 
          ?>
          Hadiary All rights reserved.
        </p>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
