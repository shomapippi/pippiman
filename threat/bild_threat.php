<?php
  session_start();
  try{
    $db = new PDO('mysql:dbname=threat;
    host=localhost;charset=utf8','pippi','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Asia/Tokyo');



    if (((isset($_REQUEST["titles"]) == true) || (isset($_REQUEST['contents']) == true)) && (isset($_REQUEST["send"]) == true))	// 送信ボタンが押された？
    {
      if ((isset($_REQUEST["chkno"]) == true) && (isset($_SESSION["chkno"]) == true) && ($_REQUEST["chkno"] == $_SESSION["chkno"]))	// トークン番号が一致？
	    {
        $titles = htmlspecialchars($_POST['titles'], ENT_QUOTES);
        $names = htmlspecialchars($_POST['names'],ENT_QUOTES);
        $contents = htmlspecialchars($_POST['contents'], ENT_QUOTES);
        $contents = str_replace(PHP_EOL, '<br>',$contents);
        $dates = date("Y-m-d H:i:s");

        $duplication_title = "SELECT * FROM mk_threat WHERE titles = '$titles'";

        $stmttitle = $db->prepare($duplication_title);
        $stmttitle->execute();

        $cnt = 0;
        foreach ($stmttitle as $keytitle => $valtitle) {
            $cnt = $cnt + 1;
        }



        if($cnt > 0){
          echo '<p>申し訳ございません！</p>';
          echo '<p>同じタイトルのスレッドが既に存在しています！<br>タイトル名を変えて再度お試しください。</p>';
        }else{
          if( $names != NULL ){
            $sql ="INSERT INTO mk_threat (titles, names, contents, dates) VALUES (:titles, :names, :contents, :dates)";
            $stmt = $db ->prepare($sql);
            $params = array(':titles' => $titles,':names' => $names,':contents' => $contents, ':dates' => $dates);
            $stmt->execute($params);
            echo 'スレッドを作成いたしました。<br>集まるまでに時間がかかる場合がございますので今しばらくお待ちください！';
  
            $sql = "CREATE TABLE $titles (
              `id` int(64) NOT NULL,
              `dates` datetime NOT NULL,
              `names` varchar(1024) NOT NULL,
              `contents` varchar(1024) NOT NULL,
              `files` varchar(1024) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; ALTER TABLE $titles ADD PRIMARY KEY (id); ALTER TABLE $titles MODIFY id int(255) NOT NULL AUTO_INCREMENT;COMMIT;";
            $stmt = $db->prepare($sql);
            $stmt ->execute();
          }else{
            $names = '名無しさん';
            $sql ="INSERT INTO mk_threat (titles, names, contents, dates) VALUES (:titles, :names, :contents, :dates)";
            $stmt = $db ->prepare($sql);
            $params = array(':titles' => $titles,':names' => $names,':contents' => $contents, ':dates' => $dates);
            $stmt->execute($params);
            echo 'スレッドを作成いたしました。<br>集まるまでに時間がかかる場合がございますので今しばらくお待ちください！';
  
            $sql = "CREATE TABLE $titles (
              `id` int(64) NOT NULL,
              `dates` datetime NOT NULL,
              `names` varchar(1024) NOT NULL,
              `contents` varchar(1024) NOT NULL,
              `files` varchar(1024) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; ALTER TABLE $titles ADD PRIMARY KEY (id); ALTER TABLE $titles MODIFY id int(255) NOT NULL AUTO_INCREMENT;COMMIT;";
            $stmt = $db->prepare($sql);
            $stmt ->execute();
          }
        }

      }
    }
    $_SESSION["chkno"] = $chkno = mt_rand();


    echo '<!--データベースに接続成功しました-->';
    }catch(PDOException $e){
      echo'<!--データベースに接続接続出来ませんでした。-->';
    }
?>