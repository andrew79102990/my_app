<?php
//載入 db.php 檔案，連接資料庫
require_once 'php/db.php';
//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	header("Location: php/logout.php");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>register</title>
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

  <body>
    <!-- 頁首 -->
    <?php
      include_once 'menu.php';
    ?>
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
			<div class="col-md-1">
			</div>
          <!-- 在 xs 尺寸，佔12格，參考 http://getbootstrap.com/css/#grid -->
          <div class="col-md-10">
		  
            <form class="register"><!-- 沒有設定  method 跟 action 交給之後的 ajax 處理-->
			<div class="form-group shadow-lg p-3 mb-5 bg-white rounded-pill">
                <label for="email">Email 信箱</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="請輸入email" required><br>
              </div>
						<div class="form-group shadow-lg p-3 mb-5 bg-white rounded-pill" id='textA'>
								<label for="name">Identity 身份<br></label>
								<select class="form-control" id="name" name="name"  style="font-size:27px" required>
								<option>Free trial user 免費試用</option>
								<option>Caregiver 照顧者</option>	
								</select><br>
							</div>
              <div class="form-group shadow-lg p-3 mb-5 bg-white rounded-pill">
                <label for="username">Username 帳號</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Please enter a 7-12 alphanumeric account(請輸入7-12個英數字的帳號)" required pattern="[0-9a-zA-Z]{7,12}">
				<br>
				</div>
              <div class="form-group shadow-lg p-3 mb-5 bg-white rounded-pill">
                <label for="password">Password 密碼</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Please enter 7-12 alphanumeric password(請輸入7-12英數字密碼)" required pattern="[0-9a-zA-Z]{7,12}">
				<br>
				</div>
              <div class="form-group shadow-lg p-3 mb-5 bg-white rounded-pill">
                <label for="confirm_password">Confirm password確認密碼</label>
                <input type="password" class="form-control" id="confirm_password" name="password" placeholder="Confirm password(請再次輸入密碼)" required pattern="[0-9a-zA-Z]{7,12}">
				<br>
				</div>
			  
			  <p>
			  By clicking Register, you have read and agree to abide by Hadiary's membership terms and customer privacy terms.<br>
			  點擊註冊代表您已閱讀並同意遵守hadiary之 <!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
								Member Terms and Customer Privacy Terms 會員條款及客戶隱私權條款<br>
			  
								</button>，hadiary不會以任何理由要求您轉帳匯款，嚴防詐騙</p>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-scrollable" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h2 class="modal-title" id="exampleModalScrollableTitle">hadiary's membership terms and customer privacy terms.會員條款及客戶隱私權條款</h2>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Hadiary會員服務使用條款
歡迎你加入成為Hadiary的會員，並使用包括Hadiary相關會員服務(以下稱會員服務)。所有使用Hadiary各項會員服務的使用者(以下稱會員)，都應該詳細閱讀下列約定條款。這些約定條款訂立的目的，是為了保護Hadiary各會員服務的提供者以及所有會員的利益，並構成會員與Hadiary各會員服務提供者之間的契約。當使用者完成註冊手續、或已開始使用Hadiary所提供的各項會員服務時，就視為已閱讀、知悉、並完全同意本使用條款的所有約定：

一、 會員服務
Hadiary於完成並確認會員申請後，將依系統當時所建置的服務、項目、內容、狀態及功能，對會員提供服務；Hadiary保留隨時新增、減少或變更各該服務、項目、內容及功能之全部或一部之權利，且不另行個別通知。
部分服務、項目、內容或功能，可能係由Hadiary之合作夥伴所建置或提供、或需由會員進行個別申請或登錄程序、或需由會員付費使用，會員應遵循當時及隨後所修改的各該服務、項目、內容或功能之使用說明及相關約定。
Hadiary保留隨時變更本使用條款、各服務或項目個別使用條款、將免費服務改為收費服務、以及變更收費標準之權利，變更後之內容，除公佈於各該服務網頁外，不另行個別通知。會員若於前該修改或變更後繼續使用該服務，視為已閱讀、瞭解並同意接受該等修改或變更，會員所進行之相關活動(包括繼續使用服務)，均將適用修改或變更後之使用條款。如果無法遵守本服務條款內容、無法遵守各服務或項目個別使用條款，或不同意本服務條款內容時，請立即停止使用Hadiary所提供的會員服務。
部分會員服務可能另訂有相關使用規範或約定，會員應同時遵守各該服務或項目之使用規範及相關約定。該等使用規範或約定之效力將優先於本使用條款之適用。

未滿二十歲者，應於加入會員前將本服務條款請法定代理人(家長)或監護人閱讀、並得到其同意，才可以註冊及使用Hadiary所提供之會員服務。當使用者完成註冊程序、或開始使用Hadiary所提供之會員服務時，則視為家長(或監護人)已經閱讀、瞭解並同意本服務條款之所有內容及其後之修改變更。

二、 帳號、密碼註冊、登入與安全性
會員應完成註冊程序、提供會員註冊、登入或交易流程中所要求會員填寫的資料，應擔保所提供的所有資料都是正確且即時的資料。如果會員未即時提供資料、未按指定方式提供資料、或所提供之資料不正確或與事實不符造成無法登入或無法使用會員服務，Hadiary保留不經事先通知，隨時拒絕或暫停對該會員提供相關會員服務之全部或一部之權利。
Hadiary亦提供使用者得使用已於Hadiary所屬各平台服務註冊之帳號。當使用者選擇以前述方式申請註冊、登入及使用會員服務時，即代表使用者同意並授權Hadiary得與該等服務之提供者聯繫，並得自該等服務提供者處取得使用者之會員帳號，並存取或處理使用者所儲存於該等服務之會員資料之權利。使用者同意並瞭解，若日後Hadiary終止與前該服務提供者之合作時，為使會員得繼續使用Hadiary會員服務，Hadiary或各會員服務之提供者可能會另行通知會員重新註冊會員帳號、更新登入資訊或以當時其他Hadiary所得接受之登入方式進行登入。
會員可以自行選擇會員帳號和密碼，但對於會員帳號和密碼，會員有妥善自行保管和保密的義務，不得透漏或提供予第三人使用，對於使用特定會員帳號和密碼使用會員服務之行為、以及登入系統後之所有行為，均應由持有該會員帳號和密碼之會員負責。
會員如果發現或懷疑其會員帳號和密碼被第三人冒用或不當使用，會員應立即通知Hadiary，以利Hadiary及時採取適當的因應措施；但上述因應措施不得解釋為Hadiary及其各會員服務之提供者因此而明示或默示對會員負有任何形式之賠償或補償義務。
三、 個人資料保護
Hadiary會保護每一位會員的個人資料，對於會員所提供的個人資料，除了會員可能涉及違法、侵權、違反本使用條款或各該會員服務之使用規範或約定、或經網路Email通知該會員並取得會員回覆同意外，Hadiary不會將會員個人資料提供給第三人。
部分會員服務是由Hadiary之合作夥伴所經營或提供服務，為對會員提供該等服務，可能必須將會員的個人資料提供給該等合作夥伴，如果會員不願意將個人資料揭露給該等合作夥伴，可以選擇不使用各該特定服務，但如會員選擇使用該等特定服務，Hadiary會在適當頁面告知會員後，將會員個人資料揭露給該等特定服務的合作夥伴。
在下列的情況下，Hadiary有可能會查看或提供會員的個人資料或相關通訊資料給相關政府機關、或主張其權利受侵害並提出適當證明之第三人：
依法令規定、或依司法機關或其他相關政府機關的命令；
會員涉及違反法令、侵害第三人權益、或違反本使用條款或各該使用規範或約定；
為協助辦理保險事故出險而提供給保險人；
為保護會員服務系統之安全或經營者之合法權益；
為保護其他會員或其他第三人的合法權益；
為維護本系統的正常運作。
會員同意並瞭解，當會員申請註冊或使用會員服務時所提供或由伺服器自動蒐集之相關資訊，Hadiary將依據「個人資料保護法」及「Hadiary隱私權聲明」進行蒐集、處理及利用，包括跨國間的傳輸與儲存。關於Hadiary對於隱私權之保護及相關說明，會員可隨時瀏覽「Hadiary隱私權聲明」以進行了解。
四、 資料儲存
會員應自行備份其所上傳、刊載或儲存於各會員服務系統內的所有資料。Hadiary或各會員服務之提供者將依當時各該會員服務系統所設定之方式及處理能量，定期備份會員所儲存的資料，但不擔保會員所儲存的資料將全部被完整備份；會員同意，Hadiary及各會員服務之提供者不需對未備份、已刪除的資料或備份儲存失敗的資料負責。
Hadiary各會員服務之系統不擔保會員所上載的資料將被正常顯示、亦不擔保資料傳輸的正確性；如果會員發現系統有錯誤或疏失，請立即透過Email通知Hadiary或各會員服務之管理者。
五、 會員服務之提供及使用
Hadiary各會員服務之提供者或合作夥伴為提供會員服務或特定服務所提供之所有相關網域名稱及網路位址，仍屬Hadiary、Hadiary各會員服務之提供者或其他合法權利人所有，會員僅得於保有會員資格之期間內，依本使用條款及各該會員服務或特定服務之使用規範或相關約定所約定之方式加以使用。且會員同意並瞭解，會員不得將其會員資格或會員權益移轉、出租或出借予任何第三人。
會員服務內所提供之搜尋、檢索、紀錄之服務或功能，係電腦程式系統所提供之自動化服務及軟體工具，由會員自行依照所選定或設定之條件或內容，進行搜尋或檢索；因此所得之搜尋、檢索、紀錄之結果、相關連結及其內容，均係由各該來源網站或相關第三人所提供，並應分別由各該來源網站或相關第三人自行對會員負責。
針對特定會員服務，Hadiary可能會接洽合作夥伴或其他廠商提供相關圖檔、圖片或其他著作或資料，供會員瀏覽、檢索或使用，但會員需遵守相關授權約定或限制。該等圖檔、圖片及其他著作或資料之合法性，均由提供各該圖檔、圖片及其他著作或資料之合作夥伴或廠商自行對會員負責。
會員如在Hadiary各會員服務系統所提供的伺服器空間上建置個人網站、相簿、新聞台、刊登商品、開設賣場或其他類似之使用空間或頁面，其伺服器空間之相關所有權及廣告版面經營權，均仍歸Hadiary或各會員服務之提供者所有，除另行取得該會員服務提供者之事前同意外，不論是否有償，會員均不得自行經由第三人以任何方式於該等伺服器空間銷售、經營、或提供網路廣告或類似業務。
所有於會員服務出現之廣告資訊(包括且不限於文字、圖片、動畫、聲音或影像)，均係Hadiary依廣告主、廣告代理商或贊助廠商之委託而刊載，對於廣告資訊之內容，Hadiary基於尊重廣告主、廣告代理商及贊助廠商之權利，不會事先對廣告之內容進行審查，會員應自行判斷該廣告的正確性及可信度，並由個別廣告主、廣告代理商或贊助廠商自行就廣告內容對會員負責。
對於會員使用Hadiary各會員服務或經由各會員服務連結至其他網站而取得之資訊、廣告或內容建議(包括但不限於商務、投資理財、醫療、法律等資訊)，Hadiary除不擔保其完整性與正確性外，並應由該等網站之經營者自行依其服務使用規範或約定，對網站內之資訊、廣告或內容建議負責。
當會員於Hadiary各會員服務內進行消費、使用第三方金流代收付服務時，即代表會員已知悉並同意各該會員服務將會蒐集會員所購買之產品或所使用服務之內容(如品名、數量或交易金額等)、購買人資料(如姓名、聯絡電話、地址、電子郵件等)及付款資料(如信用卡號碼、信用卡有效期限、授權碼或銀行帳戶資料等)等相關資訊。會員並同意為利於Hadiary及各會員服務提供者依約提供上該購買商品之服務、平台服務、金流代收付服務等，Hadiary及各會員服務提供者可能將會員提供的前揭資料於合法、必要之範圍內提供予合作廠商，以履行Hadiary及各會員服務提供者之義務。
六、會員行為
會員不得於Hadiary各會員服務內從事任何未經事前授權的商業招攬行為或張貼廣告。
會員自行上傳或刊載於Hadiary各會員服務內的資訊(包括且不限於文字、圖片、影片、檔案或其他資料)，均由電腦系統自動依會員之指令，上傳、刊載或儲存於各會員服務相關網頁及位置，Hadiary及各會員服務提供者不負責審查、核對或編輯。
會員必須遵守相關法令規範，且不得從事下列行為：
傳送任何違反中華民國技術資料輸出等相關法令之郵件、檔案或資料；
刊載、傳輸、發送或儲存任何誹謗或妨害他人名譽或商譽、詐欺、暴力、猥褻、色情、賭博、具歧視性、煽惑他人從事犯罪、違反公序良俗或其他違反法令之郵件、圖片、影片、檔案或其他任何形式之不當內容；
刊載、傳輸、發送或儲存任何侵害他人智慧財產權或其他權益的著作或資料；
刊載、傳輸、發送或儲存任何違反兒童及少年福利與權益保障法規定有害兒童及少年身心健康之內容；
刊載、傳輸、發送或儲存任何有可能使其他會員或第三人混淆誤認為Hadiary或各會員服務提供者公告之標題、副標題、及各種可能令人誤會內容；
未經同意收集他人電子郵件位址、聯絡電話以及其他個人資料；
未經同意擅自摘錄或使用會員服務內任何資料庫內容之全部或一部；
刊載、傳輸、發送、儲存惡意系統(包括病毒程式、能癱瘓系統平台服務之程式或破壞伺服器之相關運作之惡意程式)、或其他任何足以破壞或干擾電腦系統或資料的程式或訊息；
破壞或干擾會員服務的系統運作或違反一般網路禮節之行為；
在未經授權下進入Hadiary會員服務系統或是與各該系統有關之網路，或冒用他人會員帳號或偽造寄件人辨識資料傳送郵件，企圖誤導收件人之判斷；
任何妨礙或干擾其他使用者使用會員服務之行為；
傳送幸運連鎖信、垃圾郵件、廣告信或其他漫無目的之郵件或訊息；
任何透過不正當管道竊取、更改、破壞各會員服務之會員帳號、密碼或存取權限之行為；
其他不符合各該會員服務所提供的使用目的之行為及經Hadiary或各會員服務提供者認定不適當之行為。
如果會員或第三人所上傳、刊載、傳輸、發送或儲存之任何文字、圖片、影片、檔案或其他著作或資料，有任何違反法令或侵害第三人權益之虞、或違反本使用條款或各會員服務之使用規範或約定、或經第三人主張涉及侵權或其他合法性爭議，Hadiary及各會員服務提供者有權得隨時不經通知，直接加以刪除、移動或停止存取，或對各該會員停止提供會員服務之全部或一部；為該等行為之會員，除須自負因此所生之法律責任外，對於Hadiary及各會員服務提供者因此所受之損害及所支出之費用，並應負賠償及償還之責任。
七、 權利歸屬及會員對Hadiary及各會員服務之提供者的授權
會員服務所提供的所有網頁設計、介面、URL、商標或標識、電腦程式、資料庫等，其商標、著作權、其他智慧財產權及資料所有權等，均屬於Hadiary或各會員服務之提供者或授權Hadiary及各會員服務之提供者使用之合法權利人所有。
Hadiary提供之各項會員服務，僅提供相關伺服器空間及系統供會員使用，會員不因此而取得Hadiary及各會員服務之提供者及個別會員服務的相關商標、著作權或其他智慧財產權之授權。
會員自行上傳、刊載及儲存於會員服務內之所有著作及資料等「內容」，其著作權或其他智慧財產權仍然歸會員或授權會員使用之合法權利人所有；但會員除必須擔保該等著作或資料等「內容」絕無違反法令或侵害第三人權益外，並同意於該等著作權或其他智慧財產權之法定存續期間，不限地區性、非排他性及無償授權Hadiary及各會員服務之提供者得儲存、刊載於包括且不限於網站、APP、社群媒體、平面媒體、數位媒體上，並得配合前開媒體之型態，以Hadiary及各會員服務之提供者所認為適當之方式，包括為配合不同軟體或硬體設備所製作或轉換之各種不同版本或格式，例如適合於網路線上閱讀之版本、以及可供下載於各種不同電腦設備(包括桌機、筆電、平板、行動電話、各類智慧行動裝置、以及將來市場上所開發之類似設備)之不同版本或格式等，進行重製、不變更原意之編輯、改作後，以公開口述、公開播送、公開上映、公開演出、公開傳輸、公開展示、公開發表等方式發行、散布或提供予特定或不特定之人於線上瀏覽、查詢、檢索、離線閱讀或接收。會員並同意授權Hadiary及各會員服務之提供者得自行挑選會員已上傳、刊載及儲存於各項會員服務平台內之著作及資料，單獨、彙整、或與其他會員之著作及資料集結後發行電子報、EDM或類似電子訊息，包括但不限於使用於為配合Hadiary及各項會員服務之行銷或推廣目的所發送之電子報、EDM及相關訊息。除了隨同各該會員服務一起移轉或再授權外，Hadiary及各會員服務之提供者不會將會員所上傳、刊載及儲存的著作及資料單獨轉讓或再授權給第三人，也不會單獨、或集結後以專書之形式印刷出版。
若會員發現有其他使用者利用會員服務侵害其智慧財產權，請具明理由、侵權內容並檢附相關事證或權利聲明文件後，以書面郵寄或其他Hadiary及各會員服務提供者規定之方式向Hadiary或會員服務提供者主張權利。
八、 責任排除及限制
對於Hadiary各會員服務之提供者所提供之各項會員服務，均僅依各該服務當時之功能及現況提供使用，對於使用者之特定要求或需求，包括但不限於速度、安全性、可靠性、完整性、正確性及不會斷線和出錯等，Hadiary及各會員服務之提供者不負任何明示或默示之擔保或保證責任。
Hadiary及各會員服務之提供者不保證任何郵件、訊息、檔案或資料之傳送及儲存均係可靠且正確無誤，亦不保證所儲存或所傳送之郵件、訊息、檔案或資料之安全性、可靠性、完整性、正確性及不會斷線和出錯等，因各該郵件、訊息、檔案或資料傳送或儲存失敗、遺失或錯誤等所致之損害，Hadiary及各會員服務之提供者不負賠償責任。
因Hadiary或各會員服務之提供者所提供的會員服務本身之使用，所造成之任何直接或間接之損害，Hadiary及各會員服務之提供者不負任何賠償責任，即使係Hadiary及各會員服務之提供者曾明白提示注意之建議事項亦同。
會員凡非透過Hadiary及各會員服務平台所提供之服務，而私下與任何第三人或於未經授權利用Hadiary任一會員服務進行交易或服務等商業行為者，Hadiary及各會員服務之提供者均不保障該會員應有權益。若因此造成會員產生任何損失，會員應自行負擔所有責任，Hadiary及各會員服務之提供者無須對會員因此所生之損失負責或賠償。任何從事上述違約行為因此遭事業目的主管機關調查、或因此導致訴訟爭議時，由行為者自負所有法律責任，Hadiary及各該會員服務提供者並得依法將違約會員留存於Hadiary會員服務平台內之資訊，包括且不限於個人資料、通訊內容、會員發佈內容、交易資料、金流資訊等，提供或揭露予有權調閱之主管機關、警檢調單位及法院，以提供合理且必要之協助。
九、 服務暫停或中斷
各別會員服務平台系統或功能之例行性維護、改置或變動所發生之會員服務暫停或中斷，Hadiary或各會員服務之提供者將於暫停或中斷前，以平台上公告、Email或其他適當之方式告知會員。
在下列情形，Hadiary及各會員服務之提供者將暫停或中斷會員服務之全部或一部，且對會員因此所受之所有直接或間接損害，不負賠償責任：
對會員服務相關軟硬體設備進行搬遷、更換、升級、保養或維修時；
會員有任何違反法令、本使用條款或各該會員服務平台使用規範及約定之情形；
因第三人之行為、天災或其他不可抗力所致之會員服務停止或中斷；
因其他非Hadiary或各會員服務之提供者所得完全控制或不可歸責於Hadiary或各會員服務之提供者之事由所致之會員服務停止或中斷。
會員付費使用之加值服務，如因會員違反相關法令、違反本使用條款或各該會員服務平台使用規範或約定，或因法令規定或依相關主管機關之要求、或因其他不可歸責於Hadiary及各會員服務之提供者之事由，而致付費加值服務全部或一部暫停或中斷時，暫停或中斷期間仍照常計費。
十、 終止服務
基於平台運作，Hadiary及各會員服務之提供者保留隨時停止提供會員服務之全部或一部之權利，除對於付費服務按比例退還已收取而未使用之費用外，Hadiary及各會員服務之提供者不因此而對會員負賠償或補償之責任。
如會員違反本使用條款或各該會員服務平台之使用規範或約定，Hadiary及各會員服務之提供者保留隨時暫時停止提供服務、或終止提供服務之權利，且不因此而對會員負任何賠償或補償之責任。
十一、 本使用條款之修改
Hadiary保留隨時修改本會員服務使用條款及各該會員服務平台使用規範或約定之權利，修改後的內容，將公佈在各會員服務平台相關網頁上，不另外個別通知會員。
本使用條款內任一規定遭廢止、或經法院判決為無效時，並不影響其他規定之效力。
十二、 準據法及管轄權
本使用條款及各該會員服務平台之相關使用規範及約定，均以中華民國法令為準據法。
因會員服務、或本使用條款及各該會員服務平台之相關使用規範及約定所發生之爭議，如因此而訴訟，除適用民事訴訟法第436-9條小額訴訟之情形外，會員同意以臺灣臺北地方法院為第一審管轄法院。
本會員服務使用條款最近更新：109年 3月 11日

:::Hadiary網路家庭客戶隱私權條款
關於個人資料保護，請參閱以下Hadiary某某平台的隱私權聲明：

Hadiary是由「某某平台」所經營；為了支持個人資料保護，維護個人隱私權，Hadiary某某平台謹以下列聲明，向您說明Hadiary某某平台蒐集個人資料之目的、類別、利用範圍及方式、以及您所得行使之權利等事項；

如果您對於Hadiary某某平台的隱私權聲明、以下相關告知事項、或與個人資料保護有關之相關事項有任何疑問，可以和Hadiary某某平台Email聯絡，Hadiary某某平台將儘快回覆說明。

■ 適用範圍
Hadiary某某平台隱私權聲明及其所包含之告知事項，僅適用於Hadiary某某平台所擁有及經營的網站與行動應用程式等，當您使用Hadiary某某平台相關網站與行動應用程式所提供之任一服務或與之互動時，代表您同意Hadiary某某平台根據本隱私權聲明所述內容，對您的個人資料進行蒐集、處理及利用。

無論您所居住的國家/地區為何，您都同意授權Hadiary某某平台根據本隱私權聲明在您所居住國家/地區以外之處蒐集、傳輸、處理、儲存和使用您的個人資料，以便向您提供服務。

Hadiary某某平台可能會處理與位於歐盟境內之個人相關資料，並可能透過遵循相關法規所訂之機制從歐盟境內傳輸該等資訊，相關法規所訂之機制包括依歐盟標準契約條款制定的資料處理協議。當您使用Hadiary某某平台的服務，即表示您同意我們將與您相關的資訊傳輸到這些國家/地區。

Hadiary某某平台網站與行動應用程式內可能包含許多連結、或其他合作夥伴所提供的服務，關於該等連結網站或合作夥伴網站的隱私權聲明及與個人資料保護有關之告知事項，請參閱各該連結網站或合作夥伴網站。

■ 個人資料蒐集之方式
Hadiary某某平台將透過下列方式蒐集您的個人資料：
當您申請註冊成為Hadiary某某平台之會員時；
當您使用Hadiary某某平台網站與行動應用程式所提供的各項服務時；
當您於Hadiary某某平台所經營之網站、APP進行網路購物時；
當您參與Hadiary某某平台與其他合作夥伴辦理的贈獎活動、行銷活動時，Hadiary某某平台或合作夥伴將請您依照各該網站或活動頁面的指示提供必要的資料，其中即會包含您的個人資料。您同意Hadiary某某平台得將向您蒐集到之個人資料提供予合作夥伴或是自各活動的合作夥伴處取得您的個人資料；
會員服務及顧客意見處理；
其他。
■ 個人資料蒐集之目的
Hadiary某某平台會依照提供予您的各該服務、活動的性質，於下列之特定目的範圍內，蒐集、處理、利用及傳輸您的個人資料：

人身保險
行銷（包括為辦理贈獎活動而須確認得獎者身份、提供贈品及依法開立扣繳憑單等）
非公務機關依法定義務所進行個人資料之蒐集處理及利用
信用卡、現金卡、轉帳卡、金融卡或電子票證業務
契約、類似契約或其他法律關係事務（包括履行法定或合約義務）
消費者、客戶管理與服務（包括售後服務）
消費者保護
財產保險及責任保險
商業與技術資訊
採購與供應管理
票券業務
智慧財產權、光碟管理及其他相關行政
傳播行政與管理
會計與相關服務
經營傳播業務
資(通)訊與資料庫管理
網路購物及其他電子商務服務
廣告或商業行為管理
調查、統計與研究分析
其他經營合於營業登記項目或組織章程所定之業務
■ 個人資料蒐集之類別
Hadiary某某平台將依照Hadiary某某平台相關網站與行動應用程式所提供之服務的性質，向您蒐集以下資料：
辨識個人者：包括但不限於姓名、職稱、住址、工作地址、以前地址、住家電話號碼、行動電話、即時通訊軟體帳號、社群媒體帳號、網路平臺申請之帳號、通訊及戶籍地址、電子郵件地址、網際網路協定IP位址、Cookie及其他任何可辨識資料本人者等。
辨識財務者：包括但不限於金融機構帳戶之號碼與姓名、信用卡或簽帳卡之號碼、保險單號碼、個人之其他號碼或帳戶等。
政府資料中之辨識者：包括但不限於身分證統一編號、統一證號、稅籍編號、護照號碼等。
個人描述：包括但不限於年齡、性別、出生年月日、出生地、國籍等。
家庭情形：結婚有無等。
休閒活動及興趣：包括但不限於嗜好、運動及其他興趣等。
為執行收付款所需之資料： 當您透過Hadiary某某平台相關網站或行動應用程式進行交易，為辦理收付款金流服務時，Hadiary某某平台將留存您所提供為完成收款或付款所需之資料，包括：信用卡號碼、簽帳卡號碼、金融機構帳戶之姓名及號碼等；但若您選擇使用Hadiary某某平台相關網站內由第三方服務供應商所提供之第三方支付方式時（包括但不限於Pi拍錢包、Apple Pay、Google Pay、Samsung Pay等），您因使用該等第三方支付服務所提供的相關資料之保護及管理，請參閱各該第三方服務供應商之隱私權政策。
其他資料：
當您參加Hadiary某某平台與其他廠商合作辦理的贈獎活動、行銷活動時，Hadiary某某平台將請您提供為了使您能參加活動所需的相關資料，包括但不限於前述之基本資料等。

此外，為提升服務品質，Hadiary某某平台會依照Hadiary某某平台相關網站或行動應用程式所提供服務之性質，記錄您的IP位址、以及在Hadiary某某平台相關網站內的瀏覽活動(例如，使用者所使用的軟硬體、所點選的網頁)、以及行動應用程式之使用紀錄等資料，但是這些資料僅供作流量分析和網路行為調查，以便於改善Hadiary某某平台相關網站與行動應用程式的服務品質，這些資料也只是總量上的分析，不會和特定個人相連繫。

■ 個人資料的利用
Hadiary某某平台所蒐集的足以識別您身分的個人資料，都僅供Hadiary某某平台於其內部、依照蒐集目的之不同，以下列方式進行利用：

「廣告行銷」： 為了提供Hadiary某某平台相關網站會員訊息通知及商品或活動相關資訊，Hadiary某某平台將利用您所提供的個人資料寄發相關行銷資訊予您；
「預約服務」： 為了將您所預約的服務順利完成至您所指定的地點，Hadiary某某平台將會把您所提供的個人資料提供予Hadiary某某平台之合作夥伴，包括您所預約之合作廠商。
「金融交易授權」： 為了完成您在Hadiary某某平台各網站所成立之訂單的付款作業流程，Hadiary某某平台將於交易過程中將您所提供得識別財務之資料提供予必要之相關金融機構。
「活動中獎通知、贈品配送」： 為了確保您得接收所參與活動之中獎通知、寄送贈品及依法開立扣繳憑單，Hadiary某某平台將會自行利用、或將您所提供的個人資料提供予該活動之合作夥伴（包括活動協辦單位、贈品供貨商及配送物流業者），用於寄發中獎通知、寄送贈品及依法開立扣繳憑單予您。
「其他業務附隨事項」： 為了完成上述目的，包括但不限於客戶管理與服務、履行法定或合約義務、保護當事人及相關利害關係人之權益、財產保險、責任保險、提供售後服務等，Hadiary某某平台將在必要的範圍內，以符合個人資料保護法規定的方式利用您所提供的個人資料。
「市場分析」： 為了提升服務品質，依照您在Hadiary某某平台網站內的瀏覽活動（例如：使用者所使用的軟硬體、所點選的網頁等）、以及行動應用程式之使用紀錄等資料，Hadiary某某平台將會把這些資料及記錄用於流量分析和網路行為調查，包含透過第三方使用cookie或類似技術，以便於改善Hadiary某某平台相關網站與行動應用程式的服務品質，這些資料也只是總量上的分析，不會和特定個人相連繫。
■ 個人資料利用期間、地區、對象
利用期間： Hadiary某某平台將依照本隱私權聲明所載之個人資料蒐集的特定目的，於Hadiary某某平台營業存續期間、個別合約有效期間內、法令所定應保存之期間內（包括但不限於民法、個人資料保護法等）及因執行業務所須之保存期間內（較法令所定期間更長者），持續保管、處理及利用所蒐集之個人資料。

利用地區：除法令另有規定外，Hadiary某某平台僅會基於您授權的範圍，於Hadiary某某平台服務所提供之領域及地區內，依照各該服務目的範圍為作業之必要，利用您所提供的個人資料。

利用對象：

依照前述『個人資料的利用』所說明，Hadiary某某平台將自行利用、於Hadiary某某平台之關係企業間分享及交互運用、或依照提供予您的各該服務或所參加活動所須之範圍內，將您的個人資料提供予必要的相關合作夥伴。
除有下列原因之一，否則Hadiary某某平台不會將足以識別您身分的個人資料提供給第三人（包括境內及境外）、或移作蒐集目的以外之使用：
經事先向您說明，並經過您的同意；
為完成提供服務或履行合約義務之必要；
因協助辦理保險事故出險而提供給保險人；
依照相關法令規定或有權主管機關之命令或要求；
在緊急情況下，為了維護您及其他Hadiary某某平台會員或第三人之合法權益；
為了維持Hadiary某某平台會員服務系統正常運作；或
有合於個人資料保護法第20條但書規定，得為特定目的外之利用之情況。
■ 資料安全
Hadiary某某平台將以合於產業標準之合理技術及程序，維護個人資料之安全。

■ 資料當事人之權利
依據個人資料保護法第3條之規定，針對您本人之個人資料，您可以向Hadiary某某平台行使以下權利：

請求查詢、閱覽、給予複本，但Hadiary某某平台得酌收必要成本和費用。
當您的個人資料有變更、或發現您的個人資料不正確時，要求修改或更正。
當蒐集個人資料之目的消失或期限屆滿時，您可要求停止蒐集、處理或利用以及刪除個人資料，但因Hadiary某某平台執行職務或業務所必須，或依相關法令規定，該等資料不適用於刪除權之行使時，不在此限。
如您欲行使上述的這些權力，或有其他諮詢事項，請與Hadiary某某平台服務Email聯絡。
■ Cookie
為了便利使用者，Hadiary某某平台網站可能使用cookie技術，以便於提供更適合使用者個人需要的服務；cookie是網站伺服器用來和使用者瀏覽器進行溝通的一種技術，它可能在使用者的電腦中儲存某些資訊，Hadiary某某平台網站也會讀取儲存在使用者電腦中的cookie資料。使用者可以經由瀏覽器的設定，取消、或限制此項功能，但可能因此無法使用部份網站功能。若您想知道如何取消、或限制此項功能，可與參照您所使用的瀏覽器關於如何管理cookie的相關說明。

■ 影響
依照各該服務之性質，為使相關服務得以順利提供、或使相關交易得以順利完成或履行完畢，若您不願意提供各該服務或交易所要求的相關個人資料予Hadiary某某平台，並同意Hadiary某某平台就該等個人資料依法令規定、以及本隱私權聲明及其相關告知內容為相關之個人資料蒐集、處理、利用及國際傳輸，Hadiary某某平台將尊重您的決定，但依照各該服務之性質或條件，您可能因此無法使用該等服務或完成相關交易，Hadiary某某平台並保留是否同意提供該等相關服務或完成相關交易之權利。

■ 自我保護
Hadiary某某平台提醒您，請妥善保管您的任何個人資料。於使用各類網路服務時，不要隨意將您的個人資料提供給不知名的第三人。在您經由網路提供或完成相關個人資料更動等程序後，請務必記得登出，若您是與他人共享電腦或使用公共電腦，切記關閉瀏覽器視窗，以防止他人不當蒐集並利用您的個人資料。

■ 修訂之權利
Hadiary某某平台有權隨時修訂本隱私權聲明及相關告知事項，並得於修訂後公佈在Hadiary某某平台網站上之適當位置，不另行個別通知，您可以隨時在Hadiary某某平台網站上詳閱修訂後的隱私權聲明及相關告知事項。

■ 準據法及管轄法院
因您使用Hadiary某某平台網站與行動應用程式所造成之爭議，您同意均以中華民國法律為準據法。除法律另有強制規定者應依其規定外，並應以台灣台北地方法院為第一審管轄法院。

本隱私權聲明最近更新：109年 3月 11日</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok!I got it 我瞭解了</button>										
									</div>
									</div>
								</div>
								</div>
								<br>
			  
			  <input type="checkbox" value="我同意" id="Interest" name="Interest" required>I agree 我同意<br>
              <button type="submit" class="btn btn-success">
			  register 註冊
              </button>
            </form>
		  </div>
		  <div class="col-md-1">
		  </div>
        </div>
      </div>
    </div>
	
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      
      $(document).on("ready", function() {
		 
      	$("#email").on("keyup", function(){
      		//取得輸入的值
      		var keyin_value = $(this).val();
      		//當keyup的時候，裡面的值不是空字串的話，就檢查。
      		if(keyin_value != '')
      		{
      			
	      		$.ajax({
			        type : "POST",	//表單傳送的方式
			        url : "php/check_email.php",  //目標給哪個檔案
			        data : {	//為要傳過去的資料，使用物件方式
			          email : $(this).val()	//取得值
			        },
			        dataType : 'html' //設定該網頁回應 html 格式
			      }).done(function(data) {
			        //成功的時候
			        //console.log(data); //透過 console 看回傳的結果
			        if(data == "yes")
			        {
			        	
			        	$("#email").parent().removeClass("has-error").addClass("has-success"); 
			        	//把註冊按鈕 disabled 類別移除，讓他可以按註冊
			        	$("form.register button[type='submit']").removeClass('disabled');
			        }
			        else
			        {
			        	alert("There are duplicate mailboxes, registration is not allowed信箱有重複，不可以註冊");
						window.location.href="register.php";
			        }
			        
			      }).fail(function(jqXHR, textStatus, errorThrown) {
			      	//失敗的時候
			      	alert("There is an error 有錯誤產生");
			        console.log(jqXHR.responseText);
			      });
      		}
      		else
      		{
      			//若為空字串，就移除 has-error 跟 has-success 類別
      			$("#email").parent().removeClass("has-success").removeClass("has-error");
      		}
      		
      	});
      	//檢查帳號有無重複
      	
      	$("#username").on("keyup", function(){
      		//取得輸入的值
      		var keyin_value = $(this).val();
      		//當keyup的時候，裡面的值不是空字串的話，就檢查。
      		if(keyin_value != '')
      		{
      			
	      		$.ajax({
			        type : "POST",
			        url : "php/check_username.php", 
			        data : {	
			          n : $(this).val()	
			        },
			        dataType : 'html' 
			      }).done(function(data) {
			        
			        if(data == "yes")
			        {
			        	
			        	$("#username").parent().removeClass("has-error").addClass("has-success"); 
			        	//把註冊按鈕 disabled 類別移除，讓他可以按註冊
			        	$("form.register button[type='submit']").removeClass('disabled');
			        }
			        else
			        {
			        	alert("Account is duplicated, registration is not allowed 帳號有重複，不可以註冊");
			        	window.location.href="register.php";
			        }
			        
			      }).fail(function(jqXHR, textStatus, errorThrown) {
			      	//失敗的時候
			      	alert("There is an error 有錯誤產生");
			        console.log(jqXHR.responseText);
			      });
      		}
      		else
      		{
      			
      			$("#username").parent().removeClass("has-success").removeClass("has-error");
      		}
      		
      	});
      	
				//當表單 sumbit 出去的時候
				$("form.register").on("submit", function(){
					//如果密碼與驗證密碼不一樣
					if ($("#password").val() != $("#confirm_password").val()) {
						//把 input 的父標籤 加入 has-error，讓人知道哪個地方有錯誤，作為提醒
						//為何要在父類別加has-error，參考 http://getbootstrap.com/css/#forms-control-validation
						$("#password").parent().addClass("has-error"); 
						$("#confirm_password").parent().addClass("has-error"); 
	        	//若密碼都不一樣就警告。
	          alert("The two passwords are different, please confirm 兩次密碼輸入不一樣，請確認");
	          
	        }
	        else
	        {
	        	//若當密碼正確無誤，就使用 ajax 送出
	      		$.ajax({
			        type : "POST",
			        url : "php/add_user.php",
			        data : {
					  email : $("#email").val(), //使用者email
					  name : $("#name").val(), //註冊身份
			          un : $("#username").val(), //使用者帳號
			          pw : $("#password").val(), //使用者密碼
					  agree : $("#Interest").val() //使用者同意書
			          
			        },
			        dataType : 'html' //設定該網頁回應的會是 html 格式
			      }).done(function(data) {
			        //成功的時候
			        console.log(data);
			        if(data == "yes")
			        {
			          alert("Registration is successful, you will automatically go to the login page 註冊成功，將自動前往登入頁。");
			        	//註冊新增成功，轉跳到登入頁面。
			        	window.location.href="admin/login.php";
			        }
			        else
			        {
			        	alert("registration failed 註冊失敗，請與系統人員聯繫");
			        }
			        
			      }).fail(function(jqXHR, textStatus, errorThrown) {
			      	//失敗的時候
			      	alert("There is an error 有錯誤產生");
			        console.log(jqXHR.responseText);
			      });
	        }
	        
	        
	        //一樣要回傳 false 阻止 from 繼續把資料送出去。因為會交由上方的 ajax 非同步處理註冊的動作
          return false;
				});
      });
    </script>
    <!-- 頁底 -->
	<hr>
    <?php
      include_once 'footer.php';
    ?>
  </body>
</html>
