<?php
                                        /* Database connection settings */
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
										$un =$_SESSION['login_user_id'];
                    $patientname =$_GET['i'];
                                        $data0 = '';
                                        $data1 = '';
                                        $data2 = '';
                                        $data3 = '';
                                        $data4 = '';
                                        $data5 = '';
                                        $data6 = '';
                                        $data7 = '';
                                        $data8 = '';
                                        $data9 = '';
                                        $data10 = '';
                                        $data11 = '';
                                        $data12 = '';
                                        //query to get data from the table
                                          $sql = "SELECT * FROM `big_patients` WHERE `CID` ='{$un}' AND `name`='{$patientname}'";
                                          $result = mysqli_query($_SESSION['link'],$sql);
                                          //var_dump($result);
                            //取回行數------------------------------------------------------------------
                                            $num = mysqli_num_rows($result);
                                            
                                        //loop through the returned data
                                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                            $data0 = $data0 . '"'. $row[3].'",';
                                            $data1 = $data1 . '"'. $row[8].'",';
                                            $data2 = $data2 . '"'. $row[9].'",';
                                            $data3 = $data3 . '"'. $row[10].'",';
                                            $data4 = $data4 . '"'. $row[11].'",';
                                            $data5 = $data5 . '"'. $row[12].'",';
                                            $data6 = $data6 . '"'. $row[13].'",';
                                            $data7 = $data7 . '"'. $row[14].'",';
                                            $data8 = $data8 . '"'. $row[15].'",';
                                            $data9 = $data9 . '"'. $row[16].'",';
                                            $data10 = $data10 . '"'. $row[17].'",';
                                            $data11 = $data11 . '"'. $row[18].'",';
                                            $data12 = $data12 . '"'. $row[19].'",';
                                            
                                          
                                        }
                                        mysqli_free_result($result);
                                        //var_dump($result);
                                        //print_r($result);
                                        $data0 = trim($data0,",");
                                        $data1 = trim($data1,",");
                                        $data2 = trim($data2,",");
                                        $data3 = trim($data3,",");
                                        $data4 = trim($data4,",");
                                        $data5 = trim($data5,",");
                                        $data6 = trim($data6,",");
                                        $data7 = trim($data7,",");
                                        $data8 = trim($data8,",");
                                        $data9 = trim($data9,",");
                                        $data10 = trim($data10,",");
                                        $data11 = trim($data11,","); 
                                        $data12 = trim($data12,",");                                 
                                       
                                      ?>

<!DOCTYPE html>
<html lang="zh-TW">
  <head>
  <title>chart</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <!--<link rel="stylesheet" href="../css/style.css"/>-->
    <!--<link rel="shortcut icon" href="../images/favicon.ico">-->

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
    
    
    <!-- 建立第1個 row 空間，裡面準備放格線系統 -->
    <br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                      
          <a href="caregiver.php" id="#textA" class="btn btn-primary">return 返回</a>
                  <div class="card">	
                     <canvas id="chart" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart").getContext('2d');
                            var myChart = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'BT體溫',
                                      data: [<?php echo $data1; ?>],
                                      backgroundColor: 'transparent',
                                      borderColor:'rgba(255,99,132)',
                                      borderWidth: 3
                                      
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
            </div>
          </div>
        </div> 
<!-- 建立第2個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart2" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart2").getContext('2d');
                            var myChart2 = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'HR脈搏',
                                      data: [<?php echo $data2; ?>],
                                      backgroundColor: 'transparent',
                                      borderColor:'rgba(100,100,255)',
                                      borderWidth: 3
                                      
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>    

        <!-- 建立第3個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart3" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart3").getContext('2d');
                            var myChart3 = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'RR呼吸速率',
                                      data: [<?php echo $data3; ?>],
                                      backgroundColor: 'transparent',
                                      borderColor:'rgba(22,200,200)',
                                      borderWidth: 3
                                      
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>
                <!-- 建立第4個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart4" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart4").getContext('2d');
                            var myChart4 = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'SBP血壓收縮壓',
                                      data: [<?php echo $data4; ?>],
                                      backgroundColor: 'transparent',
                                      borderColor:'rgba(255,100,100)',
                                      borderWidth: 3
                                      
                                  },
                                  {
                                    label: 'DBP血壓舒張壓',
                                      data: [<?php echo $data5; ?>],
                                      backgroundColor: 'transparent',
                                      borderColor:'rgba(100,100,255)',
                                      borderWidth: 3	
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>

<!-- 建立第5個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart5" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart5").getContext('2d');
                            var myChart5 = new Chart(ctx, {
                              type: 'bar',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'SPO2/血氧',
                                      data: [<?php echo $data6; ?>],
                                      backgroundColor: 'rgba(255,235,235)',
                                      borderColor:'rgba(255,100,100)',
                                      borderWidth: 3
                                      
                                  
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>


<!-- 建立第5個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart6" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart6").getContext('2d');
                            var myChart6 = new Chart(ctx, {
                              type: 'bar',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: '	bloodsuger/血糖',
                                      data: [<?php echo $data7; ?>],
                                      backgroundColor: 'rgba(255,235,235)',
                                      borderColor:'rgba(255,100,100)',
                                      borderWidth: 3
                                      
                                  
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>

        <!-- 建立第6個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart7" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart7").getContext('2d');
                            var myChart7 = new Chart(ctx, {
                              type: 'bar',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'E',
                                      data: [<?php echo $data8; ?>],
                                      backgroundColor: 'rgba(255,235,235)',
                                      borderColor:'rgba(255,100,100)',
                                      borderWidth: 3
                                      
                                  
                                  },
                                  {
                                      label: 'V',
                                      data: [<?php echo $data9; ?>],
                                      backgroundColor: 'rgba(235,255,235)',
                                      borderColor:'rgba(100,200,100)',
                                      borderWidth: 3
                                      
                                  
                                  },
                                  {
                                      label: 'M',
                                      data: [<?php echo $data10; ?>],
                                      backgroundColor: 'rgba(235,235,255)',
                                      borderColor:'rgba(100,100,200)',
                                      borderWidth: 3
                                      
                                  
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>
        <!-- 建立第7個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart8" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart8").getContext('2d');
                            var myChart8 = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: 'GCS',
                                      data: [<?php echo $data11; ?>],
                                      backgroundColor: 'rgba(200,235,255)',
                                      borderColor:'rgba(102,170,255)',
                                      borderWidth: 3
                                      
                                  
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>

<!-- 建立第8個 row 空間，裡面準備放格線系統 -->
<br><br>
    
    <br>
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-10">
                                  
                        <div class="card">	
                     <canvas id="chart9" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>

                        <script>
                          var ctx = document.getElementById("chart9").getContext('2d');
                            var myChart9 = new Chart(ctx, {
                              type: 'line',
                              data: {
                                  labels: [<?php echo $data0; ?>],
                                  datasets: 
                                  [{
                                      label: '肌力測試MP',
                                      data: [<?php echo $data12; ?>],
                                      backgroundColor: 'rgba(255,235,150)',
                                      borderColor:'rgba(250,220,100)',
                                      borderWidth: 3
                                      
                                  
                                  }]
                              },
                          
                              options: {
                                  scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                                  tooltips:{mode: 'index'},
                                  legend:{display: true, position: 'top', labels: {fontColor: 'rgb(000,000,000)', fontSize: 20}}
                              }
                          });
                        </script>
                        </div>
             </div>
          </div>
        </div>
    <!-- 頁底 -->
    
    <hr>
<div class="footer">
  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <p class="text-center">
        <?php echo "Copyright"?> &copy; <?php echo date("Y ") 
          ?>
          Hadiary All rights reserved.
        </p>
      </div>
    </div>
  </div>
</div>     
    </body>
</html>
