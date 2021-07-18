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
//---------------------POST資料接收----------------------------------------
@$ctrl_username = $_POST['username'];
@$ctrl_datetime1= $_POST['bdaytime1'];
@$ctrl_datetime2 = $_POST['bdaytime2'];
// 下查詢資料庫語法 --------------------------------------------------------
$sql = "SELECT * FROM `big` WHERE `username` ='{$ctrl_username}' AND `datetime` BETWEEN '{$ctrl_datetime1}' AND '{$ctrl_datetime2}'";// && day1 AND day2 BETWEEN $datetime1 AND $datetime2";// 條件1:username / 條件2:查詢最早日期至最近日期
//echo $sql;
//----------------設定UTF8------------------------------------------------
//mysqli_query("SET NAMES 'utf8'");
//把資料丟給$result變數陣列裡面
$result = mysqli_query($_SESSION['link'],$sql);

//取回行數------------------------------------------------------------------
$num = mysqli_num_rows($result);
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
  <style>
      body{
      margin:0px;
      padding:0px;
      background:#fff url() center center fixed no-repeat;　/*設定背景圖片的呈現方式*/
      background-size: cover;　/*設定背景圖片的填滿方式*/
      }
      img {
          max-width: 100%;
          height: auto;
          }    
      #Img0{
          opacity: 1.0; /*設為完全不透明*/
          filter: alpha(opacity=100); /* IE8 與更早的版本*/
      }
      #Img1{
          opacity: 0.3; /*透明度設為 0.3*/
          filter: alpha(opacity=50); /* IE8 與更早的版本*/
        }
</style>
  <body>
    <!-- 頁首 -->
<?php include_once 'menu.php'; ?>
    <!-- 頁首 row 空間，裡面準備放格線系統 -->
    <div class="row">
        <div class="col-md-12">
                    
                <nav>
                    <div class="col-md-10">
                            <form  action="search_list.php" method="POST">        
                            <input class="form-control form-control-dark w-100" type="text" name="username"  placeholder="請輸入您要查詢的案件編號" aria-label="Search">
                            <input type="date" name="bdaytime1"><a>至</a>
                            <input type="date" name="bdaytime2">
                            <button type="submit" class="btn btn-success">查詢</button>
                            </form>                            
                    </div>
               </nav>            
        </div>
    </div>

                <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                  <th width="10%" scope="col">日期</th>
                  <th width="10%" scope="col">帳號</th>
                  <th width="70%" scope="col">狀態</th>
                  <th width="10%" scope="col">執行</th>
                  
                  
                  
                </tr>
              </thead>
              <?php
                 while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
                 {                               
                 ?>
                          <tr>  
                               <td ><?php echo $row[3]; ?></td>
                               <td ><?php echo $row[1]; ?></td>
                               <td >病史/Medical history  :<?php echo $row[5]; ?><br>
                               過敏史/Allergy history:<?php echo $row[6]; ?><br>
                               開刀史/Open knife room history :<?php echo $row[7]; ?><br>
                               體溫BT/body temperature  :<?php echo $row[8]; ?><br>
                               脈搏HR/Heart rate  :<?php echo $row[9]; ?><br>
                               呼吸速率RR/Respiratory rate  :<?php echo $row[10]; ?><br>
                               血壓收縮壓SBP/Systolic blood pressure  :<?php echo $row[11]; ?><br>
                               血壓舒張壓DBP/Diastolic blood pressure :<?php echo $row[12]; ?><br>
                               血氧/SPO2:<?php echo $row[13]; ?><br>
                               血糖/bloodsuger :<?php echo $row[14]; ?><br>
                               E 睜眼反應(1-4)分/E, Eye opening :<?php echo $row[15]; ?><br>
                               V 說話反應(1-5)分/V, Verbal response :<?php echo $row[16]; ?><br>
                               M 運動反應(1-6)分/M, Motor response  :<?php echo $row[17]; ?><br>
                               GCS 昏迷指數總分/Glasgow Coma Scale  :<?php echo $row[18]; ?><br>
                               MP肌力測試(0-6)分/Muscle strength test (0-6) points  :<?php echo $row[19]; ?><br>
                               排泄物/Stool :<?php echo $row[20]; ?><br>
                               翻身/Help patients turn over (situation)   :<?php echo $row[21]; ?><br>
                               灌食/進食/Ifood (situation)  :<?php echo $row[22]; ?><br>
                               洗澡/Bathing (situation)   :<?php echo $row[23]; ?><br>
                               消化/digestion (situation)   :<?php echo $row[24]; ?><br>
                               皮膚發紅或紅腫/Redness or redness of the skin ?(situation)   :<?php echo $row[25]; ?><br>
                               藥物服用狀況/Taking medicine ?(situation)    :<?php echo $row[26]; ?><br>
                               特殊事項/Special matters ?(situation)    :<?php echo $row[27]; ?><br></td>  
                               <td ><a href='javascript:void(0);' class='btn btn-danger del_big' data-id="<?php echo $row[0];?>">刪除</a></td>
                               
                               
                                
                                
                          </tr>  
                      <?php       
                     }  
                     ?>
            </table>

            <?php//釋放資料庫查詢到的記憶體
            @mysqli_free_result($result);?>    
    <!-- 頁底 -->
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    	$(document).on("ready", function(){
    		
    		//表單送出
    		$("a.del_big").on("click", function(){
    			//宣告變數
    			var c = confirm("您確定要刪除嗎？"),
    					this_tr = $(this).parent().parent();
    			if(c){
    				$.ajax({
            type : "POST",
            url : "../../php/del_big.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入
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
