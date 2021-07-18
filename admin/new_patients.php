<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once '../php/db.php';
require_once '../php/functions.php';
//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	//直接轉跳到 login.php
	header("Location: login.php");
}
if($_SESSION['login_user_name']==="Free trial user 免費試用"){
	header("Location: index.php");
}
 

?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>Add case</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css"/>-->
    <!--<link rel="shortcut icon" href="images/favicon.ico">-->
  </head>
  <style type="text/css">
    #textA{font-size:30px}
</style>
  <script>
function xxx()
{
   location.href='../php/logout.php';
}
</script>

<body onload="setTimeout('xxx()', 1440000)"><!--24分鐘內沒動作自動導入登出端，滑鼠移動就重新計算倒數登出秒數-->
  
    <!-- 頁首 -->
    
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
		
          <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
          <div class="col-xs-12 card text-center" style="width: 40rem;" >
		  
          <form  method="POST" action="../php/add_patients.php">
              <div class="card-body" id='textA'>
                <label for="patientname">patientname 個案名稱</label>
                <input type="text" class="form-control" id="patientname" name="patientname" placeholder="請輸入個案名稱" required>
				<label for="MH">病史/Medical history</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="MH" name="MH" placeholder="請輸入被照顧者相關病史" required></textarea>
				<label for="AH">過敏史/Allergy history</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="AH" name="AH" placeholder="請輸入被照顧者過敏病史" required></textarea>
				<label for="OH">開刀史/Open knife room history</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="OH" name="OH" placeholder="請輸入被照顧者開刀史" required></textarea>
				<label for="Stool">排泄物/Stool</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Stool" name="Stool" placeholder="請輸入被照顧者排泄物狀態" required></textarea>
				<label for="Totbody">翻身/Help patients turn over (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Totbody" name="Totbody" placeholder="請輸入被照顧者翻身狀況" required></textarea>
				<label for="Ifood">灌食/進食/Ifood (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Ifood" name="Ifood" placeholder="請輸入被照顧者灌食/進食狀況" required></textarea>
				<label for="Bathing">洗澡/Bathing (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Bathing" name="Bathing" placeholder="請輸入被照顧者洗澡狀況" required></textarea>
				<label for="digestion">消化/digestion (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="digestion" name="digestion" placeholder="請輸入被照顧者消化狀況" required></textarea>
				<label for="DHRW">皮膚發紅或紅腫/Redness or redness of the skin ?(situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="DHRW" name="DHRW" placeholder="請輸入被照顧者是否有皮膚發紅或紅腫" required></textarea>
				<label for="TM">藥物服用狀況/Taking medicine ?(situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="TM" name="TM" placeholder="請輸入被照顧者藥物服用狀況" required></textarea>
				<label for="CHA">特殊事項/Special matters ?(situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="CHA" name="CHA" placeholder="請輸入被照顧者特殊事項" required></textarea>
			  </div>
              <button type="submit" style="font-size:27px" class="btn btn-success">
                Add case 新增個案
              </button>
            </form>
		  </div>
		  
        </div>
      </div>
    </div>
    <br><a href="caregiver.php" id="#textA" class="btn btn-primary">return 返回</a>
    <!-- 頁底 -->
    <div class="footer">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
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
