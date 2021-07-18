<?php
//啟動 session ，這樣才能夠取用 $_SESSION['link'] 的連線，做為資料庫的連線用
@session_start();
//---------------------------------------------------註冊區塊的方法------------------------------------------------------------------------
/**
 * 註冊方法-檢查資料庫有無該使用者名稱
 */
function check_has_username($username)
{
	//宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}';";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) >= 1)
    {
      //取得的量大於0代表有資料
      
      $result = true;
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
/**
 * 註冊方法-檢查資料庫有無該使用者信箱
 */
function check_has_email($email)
{
	
  $result = null;

  
  $sql = "SELECT * FROM `user` WHERE `email` = '{$email}';";

  
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) >= 1)
    {
      //取得的量大於0代表有資料
     
      $result = true;
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 註冊方法 - 新增user使用者帳號
 */
function add_user($datetime,$username,$password,$name,$email,$agree)
{
	//宣告要回傳的結果
  $result = null;
	//先把密碼用md5加密
	$password = md5($password);
  
  $sql = "INSERT INTO `user` (`datetime`,`username`, `password`,`name`,`email`,`agree`) VALUE ('{$datetime}','{$username}','{$password}','{$name}','{$email}','{$agree}');";

  
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

//-----------------------------------------------------最新消息的方法----------------------------------------------------------------------
/**
 * 取得所有已發布的文章 news_list用的
 */
function get_publish_news()
{
  //宣告空的陣列
  $datas = array();

  
  $sql = "SELECT * FROM `news` WHERE `publish` = 1;";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}
/**
 * 取得單篇公告 news用的
 */
function get_news($id)
{
  
  $result = null;

  
  $sql = "SELECT * FROM `news` WHERE `id` = {$id};";

  
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) == 1)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      $result = mysqli_fetch_assoc($query);
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}


/**
 * 取得所有已發布的衛教教學資源 work_list用的
 */
function get_publish_works()
{
  
  $datas = array();

  
  $sql = "SELECT * FROM `works` WHERE `publish` = 1;";

  
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

/**
 * 取得單篇作品 work 用的
 */
function get_work($id)
{
  
  $result = null;

  
  $sql = "SELECT * FROM `works` WHERE `publish` = 1 AND `id` = {$id};";

  
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) == 1)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      $result = mysqli_fetch_assoc($query);
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

//------------------------------------------------------以上7個方法是前台用的---------------------------------------------------------------
//前台跑馬公告文字訊息----------------------------------------------------------------------------------------------------------------------
/**
 * 客戶端留言或建議
 */
function home_msg($id,$A)
{
	
  $result = null;
	
  $sql = "UPDATE `user` SET `msg` = '{$A}' WHERE `id` = {$id};";

  
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 取得跑馬燈訊息
 */
function get_ctrl_msg($id)
{
 
  $result = null;

  
  $sql = "SELECT * FROM `user` WHERE `id` = {$id};";

  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) == 1)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      $result = mysqli_fetch_assoc($query);
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

//------------------------------------------------------以下是登入用的---------------------------------------------------------------------

/**
 * 檢查資料庫有無該使用者名稱
 */
function verify_user($username, $password)
{
  //宣告要回傳的結果
  $result = null;
  //先把密碼用md5加密
  $password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 回傳 $query 請求的結果數量有幾筆，為一筆代表找到會員且密碼正確。
    if(mysqli_num_rows($query) == 1)
    {
      //取得使用者資料
      $user = mysqli_fetch_assoc($query);

      //在session李設定 is_login 並給 true 值，代表已經登入
      $_SESSION['is_login'] = TRUE;
      //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
      $_SESSION['login_user_id'] = $user['id'];
      $_SESSION['login_username'] = $user['username'];
      $_SESSION['login_ctrl'] = $user['ctrl'];
      $_SESSION['login_user_name'] = $user['name'];

      //回傳的 $result 就給 true 代表驗證成功
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
//------------------------------------------------------以下是忘記密碼用的---------------------------------------------------------------------
/**
 * 檢查資料庫有無該使用者名稱
 */
function get_email($username,$email)
{
	
  $result = null;

  
  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `email` = '{$email}';";

  
  $query = mysqli_query($_SESSION['link'],$sql);

  //如果請求成功
  if ($query)
  {
  
   //使用 mysqli_num_rows 回傳 $query 請求的結果數量有幾筆，為一筆代表找到會員且密碼正確。
   if(mysqli_num_rows($query) == 1)
   {
     //取得使用者資料
     $user = mysqli_fetch_assoc($query);
     //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
     $_SESSION['get_id'] = $user['id'];
    //$_SESSION['password'] = $user['password'];
    //$_SESSION['get_email'] = $user['email'];
     //回傳的 $result 就給 true 代表驗證成功
     $result = true;
   
    //釋放資料庫查詢到的記憶體
    //mysqli_free_result($query);
  }else{
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
  }
}

/**
 * 更新密碼
 */
function update_pd($id,$pd)
{
	
  $result = null;
  //密碼加密
  $password = md5($pd);
  //更新密碼時間
	$updatetime = date("Y-m-d H:i:s",(time()+7*3600));
	//更新語法
  $sql = "UPDATE `user` SET `password` = '{$password}',`updatetime` = '{$updatetime}'
  				WHERE`id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
//--------------------------------------------------以下是一般使用者後台用的---------------------------------------------------------------------
/**
 * 新增紀錄
 */
function add_big($username,$datetime,$CID,$MH,$AH,$OH,$BT,$HR,$RR,$SBP,$DBP,$SPO2,$bloodsuger,$E,$V,$M,$GCS,$MP,$Stool,$Totbody,$Ifood,$Bathing,$digestion,$DHRW,$TM,$CHA)
{
	
  //內容處理html
	//$content = htmlspecialchars($content);

	//新增語法
  $sql = "INSERT INTO `big` (`id`,`username`,`datetime`,`CID`,`MH`,`AH`,`OH`,`BT`,`HR`,`RR`,`SBP`,`DBP`,`SPO2`,`bloodsuger`,`E`,`V`,`M`,`GCS`,`MP`,`STOOL`,`Totbody`,`Ifood`,`Bathing`,`Digestion`,`DHRW`,`TM`,`CHA`)
  				VALUE ('','{$username}','{$datetime}','{$CID}','{$MH}','{$AH}','{$OH}','{$BT}','{$HR}','{$RR}','{$SBP}','{$DBP}','{$SPO2}','{$bloodsuger}','{$E}','{$V}','{$M}','{$GCS}','{$MP}','{$Stool}','{$Totbody}','{$Ifood}','{$Bathing}','{$digestion}','{$DHRW}','{$TM}','{$CHA}');";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    
    //echo "錯誤訊息error";
  }

  //回傳結果
  return $result;
}

/**
 * 刪除日誌紀錄
 */
function del_big($id)
{
	//宣告要回傳的結果
  $result = null;
	//刪除語法
  $sql = "DELETE FROM `big` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
//--------------------------------------------------以下是照顧者後台用的---------------------------------------------------------------------

/**
 * 取得所有的個案
 */
function get_all_Patients()
{
  //宣告空的陣列
  $datas = array();

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `patients` ORDER BY `datetime` DESC;"; // ORDER BY `create_date` DESC 代表是排序，使用 `create_date` 這欄位， DESC 是從最大到最小(最新到最舊)

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

/**
 * 取得單筆個案的留言
 */
function get_msg($id)
{
  //宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) == 1)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      $result = mysqli_fetch_assoc($query);
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 刪除個案
 */
function del_Patient($id)
{
	//宣告要回傳的結果
  $result = null;
	//刪除語法
  $sql = "DELETE FROM `patients` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 客戶端留言或建議
 */
function msg_post($datetime,$A,$select,$msg)
{
	//宣告要回傳的結果
  $result = null;
	//新增語法
  $sql = "UPDATE `user` SET `sel` = '{$select}',`datetime3` = '{$datetime}',`msg` = '{$msg}' WHERE `id` = {$A};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 新增個案
 */
function add_patient($datetime,$caregiver,$patientname,$MH,$AH,$OH,$Stool,$Totbody,$Ifood,$Bathing,$digestion,$DHRW,$TM,$CHA)
{
	
  //內容處理html
	//$content = htmlspecialchars($content);

	//新增語法
  $sql = "INSERT INTO `patients` (`id`,`datetime`,`caregiver`,`patientname`,`MH`,`AH`,`OH`,`STOOL`,`Totbody`,`Ifood`,`Bathing`,`Digestion`,`DHRW`,`TM`,`CHA`)
  				VALUE ('','{$datetime}','{$caregiver}','{$patientname}','{$MH}','{$AH}','{$OH}','{$Stool}','{$Totbody}','{$Ifood}','{$Bathing}','{$digestion}','{$DHRW}','{$TM}','{$CHA}');";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "error，錯誤";
  }

  //回傳結果
  return $result;
}

/**
 * 刪除個案紀錄資料
 */
function del_big_patients($id)
{
	//宣告要回傳的結果
  $result = null;
	//刪除語法
  $sql = "DELETE FROM `big_patients` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 取得單筆個案資料庫基本資料
 */
function get_patient($id)
{
  //宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `patients` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) == 1)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      $result = mysqli_fetch_assoc($query);
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 更新個案基本資料
 */
function update_patient($id,$MH,$AH,$OH,$Stool,$Totbody,$Ifood,$Bathing,$digestion,$DHRW,$TM,$CHA)
{
	//宣告要回傳的結果
  $result = null;
	//更新語法
  $sql = "UPDATE `patients` SET `MH` = '{$MH}', `AH` = '{$AH}', `OH` = '{$OH}', `STOOL` = '{$Stool}', `Totbody` = '{$Totbody}', `Ifood` = '{$Ifood}', `Bathing` = '{$Bathing}', `Digestion` = '{$digestion}', `DHRW` = '{$DHRW}', `TM` = '{$TM}', `CHA` = '{$CHA}'
  				WHERE`id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 新增個案紀錄
 */
function add_big_patients($username,$name,$datetime,$CID,$MH,$AH,$OH,$BT,$HR,$RR,$SBP,$DBP,$SPO2,$bloodsuger,$E,$V,$M,$GCS,$MP,$Stool,$Totbody,$Ifood,$Bathing,$digestion,$DHRW,$TM,$CHA)
{
	
  //內容處理html
	//$content = htmlspecialchars($content);

	//新增語法
  $sql = "INSERT INTO `big_patients` (`id`,`username`,`name`,`datetime`,`CID`,`MH`,`AH`,`OH`,`BT`,`HR`,`RR`,`SBP`,`DBP`,`SPO2`,`bloodsuger`,`E`,`V`,`M`,`GCS`,`MP`,`STOOL`,`Totbody`,`Ifood`,`Bathing`,`Digestion`,`DHRW`,`TM`,`CHA`)
  				VALUE ('','{$username}','{$name}','{$datetime}','{$CID}','{$MH}','{$AH}','{$OH}','{$BT}','{$HR}','{$RR}','{$SBP}','{$DBP}','{$SPO2}','{$bloodsuger}','{$E}','{$V}','{$M}','{$GCS}','{$MP}','{$Stool}','{$Totbody}','{$Ifood}','{$Bathing}','{$digestion}','{$DHRW}','{$TM}','{$CHA}');";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 登入前先判別身分刪除幾天前的日誌數據
 */
function del_big_free($id)
{
	//宣告要回傳的結果
  $result = null;
	//刪除語法
  $sql = "DELETE FROM `big` WHERE `CID`='{$id}' AND datetime < subdate(now(),interval 30 day);";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']))
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

//----------------------------------------------------------以下是管理者後台----------------------------------------------------------------
/**
 * 新增公告
 */
function add_news($title, $category, $content, $publish)
{
	//宣告要回傳的結果
  $result = null;
  //建立現在的時間
  $create_date = date("Y-m-d H:i:s",(time()+7*3600));
	//內容處理html
	$content = htmlspecialchars($content);
	//取得登入者的id
	$creater_id = $_SESSION['login_user_id'];
	//新增語法
  $sql = "INSERT INTO `news` (`id`,`title`, `category`, `content`, `publish`, `create_date`, `creater_id`)
  				VALUE ('','{$title}','{$category}','{$content}','{$publish}','{$create_date}','{$creater_id}');";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 管理者回覆
 */
function msg_qa($a,$CID)
{
	//宣告要回傳的結果
  $result = null;
	//新增語法
  $sql = "UPDATE `user` SET `msg_qa` = '{$a}' WHERE `id` = {$CID};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}


/**
 * 新增衛教資源
 */
function add_work($intro,$image_path,$video_path,$publish)
{
	//宣告要回傳的結果
  $result = null;

	//內容處理html
	$intro = htmlspecialchars($intro);
	//建立者id
	$create_user_id = $_SESSION['login_user_id'];
	//上傳時間
	$upload_date = date("Y-m-d H:i:s",(time()+7*3600));

  //處理圖片路徑
	$image_path_value = "'{$image_path}'";
	if($image_path == '') $image_path_value = 'NULL';

	//處理影片路徑
	$video_path_value = "'{$video_path}'";
	if($video_path == '') $video_path_value = 'NULL';

	//新增語法
  $sql = "INSERT INTO `works` (`intro`, `image_path`, `video_path`, `publish`, `upload_date`, `create_user_id`)
  				VALUE ('{$intro}', {$image_path_value}, {$video_path_value}, {$publish}, '{$upload_date}', '{$create_user_id}');";


  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 刪除公告
 */
function del_news($id)
{
	//宣告要回傳的結果
  $result = null;
	//刪除語法
  $sql = "DELETE FROM `news` WHERE `id` = {$id};";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}


/**
 * 刪除文章
 */
function del_work($id)
{
	//宣告要回傳的結果
  $result = null;

	//先取得該作品資訊，作為之後要刪除檔案用，此用本檔案中的 get_work 方法來取得作品資訊。
	$work = get_work($id);

	if($work)
	{
		//有作品才進行刪除工作
		//若有圖檔資料，以及圖檔有存在，就刪除
		if($work['image_path'] && file_exists("../".$work['image_path']))
		{
			//unlink 為刪除檔案的方法，把上一層找到 files/ 裡面的檔案，做刪除
			unlink("../".$work['image_path']);
		}

		//若有影片檔資料，以及影片檔有存在，就刪除
		if($work['video_path'] && file_exists("../".$work['video_path']))
		{
			//unlink 為刪除檔案的方法，把上一層找到 files/ 裡面的檔案，做刪除
			unlink("../".$work['video_path']);
		}

		//刪除作品語法
	  $sql = "DELETE FROM `works` WHERE `id` = {$id};";

	  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
	  $query = mysqli_query($_SESSION['link'], $sql);

	  //如果請求成功
	  if ($query)
	  {
	    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
	    if(mysqli_affected_rows($_SESSION['link']) == 1)
	    {
	      //取得的量大於0代表有資料
	      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
	      $result = true;
	    }
	  }
	  else
	  {
	    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
	  }


	}

  //回傳結果
  return $result;
}

/**
 * 取得所有的會員
 */
function get_all_user()
{
  //宣告空的陣列
  $datas = array();

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user`;"; // ORDER BY `create_date` DESC 代表是排序，使用 `create_date` 這欄位， DESC 是從最大到最小(最新到最舊)

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}
/**
 * 取得單筆的會員資料
 */
function search_user($searchuser)
{
  //宣告空的陣列
  $datas = array();

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `username` = '{$searchuser}';"; // ORDER BY `create_date` DESC 代表是排序，使用 `create_date` 這欄位， DESC 是從最大到最小(最新到最舊)

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

/**
 * 取得所有的文章
 */
function get_all_news()
{
  //宣告空的陣列
  $datas = array();

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `news` ORDER BY `create_date` DESC;"; // ORDER BY `create_date` DESC 代表是排序，使用 `create_date` 這欄位， DESC 是從最大到最小(最新到最舊)

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

/**
 * 取得所有的衛教資源
 */
function get_all_work()
{
  //宣告空的陣列
  $datas = array();

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `works` ORDER BY `upload_date` DESC;"; // ORDER BY `create_date` DESC 代表是排序，使用 `create_date` 這欄位， DESC 是從最大到最小(最新到最舊)

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

/**
 * 取得所有的留言
 */
function get_all_msgs()
{
  //宣告空的陣列
  $datas = array();

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` ORDER BY `datetime3` DESC;"; // ORDER BY `create_date` DESC 代表是排序，使用 `create_date` 這欄位， DESC 是從最大到最小(最新到最舊)

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
    if (mysqli_num_rows($query) > 0)
    {
      //取得的量大於0代表有資料
      //while迴圈會根據查詢筆數，決定跑的次數
      //mysqli_fetch_assoc 方法取得 一筆值
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    //echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

?>
