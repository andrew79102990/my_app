<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once '../php/db.php';
require_once '../php/functions.php';
// 下查詢資料庫語法 --------------------------------------------------------
/*$sql = "SELECT * FROM `big`; ";
//檢查$conn有沒有連線資料庫，檢查$sql語法有沒有找到資料------------------------
if (mysqli_query($_SESSION['link'],$sql)) {
    //echo "連線成功<br>";
} else {
    echo "連線失敗: " . mysqli_error($_SESSION['link']) . "<br>";
}
//-------------------------------------------------------------------------
//設定連接資料庫名稱 'my_db'
$dbname = 'my_db';
mysqli_select_db ( $_SESSION['link'] , $dbname);//選擇連線資料庫-----------

if (!$_SESSION['link']) {
    die("無法選擇資料庫: " . mysqli_connect_error());
}*/
//---------------------POST資料接收----------------------------------------
//@$un = $_POST['username'];
//@$datetime1 = $_POST['bdaytime1'];
//@$datetime2 = $_POST['bdaytime2'];
//var_dump($un);-----------查有無值??---------------------------------------

//下檢查語法----------------------------------------------------------------

/*if($un == @$_POST['username'] && $datetime1 == @$_POST['bdaytime1'] && $datetime2 == @$_POST['bdaytime2']){
  $un =$_SESSION['login_user_id'];
  $datetime1 = ""."'".$datetime1."'";
  $datetime2 = ""."'".$datetime2."'";
}
  else{
    echo "un變數串接POST失敗 " ;
}*/
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
$un =$_SESSION['login_user_id'];
// 下查詢資料庫語法 --------------------------------------------------------
$sql = "SELECT * FROM `big` WHERE `CID` ={$un}";// && day1 AND day2 BETWEEN $datetime1 AND $datetime2";// 條件1:username / 條件2:查詢最早日期至最近日期
//echo $sql;
//----------------設定UTF8------------------------------------------------
//mysqli_query("SET NAMES 'utf8'");
//把資料丟給$result變數陣列裡面
$result = mysqli_query($_SESSION['link'],$sql);

//取回行數------------------------------------------------------------------
$num = mysqli_num_rows($result);
//取回資料------------------------------------------------------------------



//var_dump($result);//-----------------------------------------------------------
//print_r($result);
//var_dump($_SESSION['link']);
//var_dump($sql);


?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
  <title>Historical data check</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../css/style.css"/>-->
    <!--<link rel="shortcut icon" href="../images/favicon.ico">-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  </head>
  <style>
      #textA{font-size:30px;font-weight:bold;}
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
  <script>
function xxx()
{
   location.href='../php/logout.php';
}
</script>

<body onload="setTimeout('xxx()', 1440000)"><!--30秒內沒動作自動導入登出端，滑鼠移動就重新計算倒數登出秒數-->
    <!-- 頁首 -->
    <?php include_once 'menu.php'; ?>
    
    <!-- 建立第1個 row 空間，裡面準備放格線系統 -->
    <br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
        <h1>history record<br>卓越世代 - 歷程記錄</h1>
        <br>
        <br>
          <a href="big_search2.php"  id="#textA" class="btn btn-success">chart 查看圖表</a>
                <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                  <th width="10%" scope="col">date<br>日期</th>
                  <th width="10%" scope="col">username<br>帳號</th>
                  <th width="65%" scope="col">status<br>狀態</th>
                  <th width="10%" scope="col">action<br>執行</th>
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
            mysqli_free_result($result);?>
           
          </div>
        </div>    
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
            url : "../php/del_big.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
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
<hr>
<div class="footer">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <p class="text-center">
        <?php echo "Copyright"?> &copy; <?php echo date("Y");
          ?>
          Hadiary All rights reserved.
        </p>
      </div>
    </div>
  </div>
</div>    
  </body>
</html>
