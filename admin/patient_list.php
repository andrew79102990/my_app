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
//var_dump($_SESSION['login_user_id']);
$_SESSION['patientname']=$_GET['i'];
//-----------------------------------------------------------------------------------------------

//var_dump($un);
//var_dump($SBP);
//var_dump($datetime);*/
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>Add data</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../css/style.css"/>-->
    <!--<link rel="shortcut icon" href="../images/favicon.ico">-->
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
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
            <form  method="POST" action="../php/add_big_patients.php">

			  
  <div class="alert alert-primary">
                  <div class="form-group" id='textA'>
                          <label for="MH">病史/Medical history</label>
                          <textarea type="input" style="font-size:27px" class="form-control" id="MH" name="MH" placeholder="請輸入被照顧者相關病史" required></textarea>
                        </div>

                  <div class="form-group" id='textA'>
                          <label for="AH">過敏史/Allergy history</label>
                          <textarea type="input" style="font-size:27px" class="form-control" id="AH" name="AH" placeholder="請輸入被照顧者過敏病史" required></textarea>
                        </div>

                  <div class="form-group" id='textA'>
                          <label for="OH">開刀史/Open knife room history</label>
                          <textarea type="input" style="font-size:27px" class="form-control" id="OH" name="OH" placeholder="請輸入被照顧者開刀史" required></textarea>
                        </div>
  </div>

  <div class="alert alert-success">
                        <div class="form-group" id='textA'>
                                <label for="BT">體溫BT/body temperature</label>
                                <input type="text" style="font-size:27px" class="form-control" id="BT" name="BT" placeholder="請輸入被照顧者體溫" required>
                              </div>

                        <div class="form-group" id='textA'>
                                <label for="HR">脈搏HR/Heart rate</label>
                                <input type="text" style="font-size:27px" class="form-control" id="HR" name="HR" placeholder="請輸入被照顧者脈搏" required>
                              </div>

                        <div class="form-group" id='textA'>
                                <label for="RR">呼吸速率RR/Respiratory rate</label>
                                <input type="text" style="font-size:27px" class="form-control" id="RR" name="RR" placeholder="請輸入被照顧者呼吸速率" required>
                              </div>

                        <div class="form-group" id='textA'>
                                <label for="SBP">血壓收縮壓SBP/Systolic blood pressure</label>
                                <input type="text" style="font-size:27px" class="form-control" id="SBP" name="SBP" placeholder="請輸入被照顧者血壓之收縮壓" required>
                              </div>

                        <div class="form-group" id='textA'>
                                <label for="DBP">血壓舒張壓DBP/Diastolic blood pressure</label>
                                <input type="text" style="font-size:27px" class="form-control" id="DBP" name="DBP" placeholder="請輸入被照顧者血壓之舒張壓" required>
                              </div>
    
    
			  <div class="form-group" id='textA'>
                <label for="SPO2">血氧/SPO2</label>
                <input type="text" style="font-size:27px" class="form-control" id="SPO2" name="SPO2" placeholder="請輸入被照顧者血氧" required>
              </div>

              <div class="form-group" id='textA'>
                <label for="bloodsuger">血糖/blood suger</label>
                <input type="text" style="font-size:27px" class="form-control" id="bloodsuger" name="bloodsuger" placeholder="請輸入被照顧者血糖" required>
              </div>              
  <div class="form-group" id='textA'>
    <label for="E">E 睜眼反應(1-4)分/E, Eye opening<br>
								4分：主動地睜開眼晴（spontaneous）。<br>
								3分：聽到呼喚後會睜眼（to speech）。<br>
								2分：有刺激或痛楚會睜眼（to pain）。<br>
								1分：對於刺激無反應。<br></label>
    <select class="form-control" id="E" name="E"  style="font-size:27px" required>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
     
    </select>
  </div>
              
  <div class="form-group" id='textA'>
    <label for="V">V 說話反應(1-5)分/V, Verbal response<br>
								5分：說話有條理，會與人交談（oriented）。<br>
								4分：可應答，但說話沒有邏輯性（confused）。<br>
								3分：可說出單字或胡言亂語（inappropriate words）。<br>
								2分：可發出聲音（unintelligible sounds）。<br>
								1分：無任何反應（none）。<br></label>
    <select class="form-control" id="V" name="V"  style="font-size:27px" required>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="form-group" id='textA'>
    <label for="M">M 運動反應(1-6)分/M, Motor response<br>
								6分：可依指令做出各種動作（obey commands）。<br>
								5分：施以刺激時，可定位出疼痛位置（localize）。<br>
								4分：對疼痛刺激有反應，肢體會閃避（withdrawal）。<br>
								3分：對疼痛刺激有反應，肢體會彎曲，試圖迴避（decorticate flexion）。<br>
								2分：對疼痛刺激有反應，肢體反而會伸展開（decerebrate extension）。<br>
								1分：無任何反應（no response）。<br></label>
    <select class="form-control" id="M" name="M"  style="font-size:27px" required>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
    </select>
  </div>
			  
  <div class="form-group" id='textA'>
    <label for="MP">MP肌力測試(0-6)分/Muscle strength test (0-6) points<br>
								0級：肌肉無收縮<br>Level 0: no contraction of muscles<br><br>
								1級：肌肉有輕微收縮，但不能帶動關節產生動作<br>Level 1: Muscles have a slight contraction, but can not cause the joint to produce movements<br><br>
								2級:肌肉收縮可帶動關節水平方向運動，但不能夠對抗地心引力，肌體能在床上平行移動，但不能台離床面<br>Muscle contraction can move the joint horizontally, but it can't resist gravity. The body can move in parallel on the bed, but it can't stand off the bed<br><br>
								3級:能夠對抗地心引力移動關節，能抬離床面，但不能夠對抗阻力<br>Ability to move the joint against gravity, lift off the bed, but not against resistance<br><br>
								4級:能對抗地心引力運動肢體，且肌體能做對抗一定強度的外界阻力的運動，但不完全，比正常人弱<br> It can fight the gravity of the limbs, and the body can do the exercise against the external resistance of a certain intensity, but not completely, weaker than normal<br><br>
								5級:能抵抗強大的阻力運動肢體，可以正常行走活動<br>It can resist strong resistance to exercise limbs and can walk normally<br><br></label>
    <select class="form-control" id="MP" name="MP"  style="font-size:27px" required>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
    </select>
  </div>
			  
</div>
              <div class="alert alert-danger">
			  <div class="form-group" id='textA'>
                <label for="Stool">排泄物/Stool</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Stool" name="Stool" placeholder="請輸入被照顧者排泄物狀態" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="Totbody">翻身/Help patients turn over (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Totbody" name="Totbody" placeholder="請輸入被照顧者翻身狀況" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="Ifood">灌食/進食/Ifood (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Ifood" name="Ifood" placeholder="請輸入被照顧者灌食/進食狀況" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="Bathing">洗澡/Bathing (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="Bathing" name="Bathing" placeholder="請輸入被照顧者洗澡狀況" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="digestion">消化/digestion (situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="digestion" name="digestion" placeholder="請輸入被照顧者消化狀況" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="DHRW">皮膚發紅或紅腫/Redness or redness of the skin ?(situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="DHRW" name="DHRW" placeholder="請輸入被照顧者是否有皮膚發紅或紅腫" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="TM">藥物服用狀況/Taking medicine ?(situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="TM" name="TM" placeholder="請輸入被照顧者藥物服用狀況" required></textarea>
              </div>

			  <div class="form-group" id='textA'>
                <label for="CHA">特殊事項/Special matters ?(situation)</label>
                <textarea type="input" style="font-size:27px" class="form-control" id="CHA" name="CHA" placeholder="請輸入被照顧者特殊事項" required></textarea>
              </div>
</div>
              <button type="submit" style="font-size:27px" class="btn btn-success">
              submit 送出資料
              </button>
            </form>
          </div>
          <div class="col-md-1">
          </div>
        </div>
      </div>
    </div>
    <br><a href="caregiver.php" id="#textA" class="btn btn-primary">return 返回</a>


   
    <!-- 頁底-->
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
