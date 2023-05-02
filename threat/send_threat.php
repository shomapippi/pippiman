<?php
  session_start();
  try{
    $db = new PDO('mysql:dbname=threat;
    host=localhost;charset=utf8','pippi','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Asia/Tokyo');

    if(isset($_GET['id'])){
      $product = $_GET['id'];
    }

    $sql = "SELECT titles FROM mk_threat WHERE id = $product ORDER BY titles";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $titles_threat){
      }
    }


    $sql = "SELECT MAX(id) FROM $titles_threat";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $obj){
      }
    }


    if (((isset($_REQUEST["names"]) == true) || (isset($_REQUEST['contents']) == true)) && (isset($_REQUEST["send"]) == true))	// 送信ボタンが押された？
    {
      if ((isset($_REQUEST["chkno"]) == true) && (isset($_SESSION["chkno"]) == true) && ($_REQUEST["chkno"] == $_SESSION["chkno"]))	// トークン番号が一致？
	    {
        $names = htmlspecialchars($_POST['names'], ENT_QUOTES);
        $contents = $_POST['contents'];
        $contents = str_replace(PHP_EOL, '<br>',$contents);
        $dates = date("Y/m/d H:i:s");

        $pattern = '/>>\b([1-9]|[1-9][0-9]{0,2}|1000)\b/'; // 正規表現パターンで1から1000までの数字を検出
        $output = preg_replace($pattern, '<a href="#$0">$0</a>', $contents);

        if($names != NULL){
          $sql = "INSERT INTO $titles_threat (names, contents, dates) VALUES (:names, :contents, :dates)";
          $stmt = $db->prepare($sql);
          $params = array(':names' => $names,':contents' => $output,':dates' => $dates);
          $stmt->execute($params);

        }else{
          $names = '名無しさん';
          $sql = "INSERT INTO $titles_threat (names, contents, dates) VALUES (:names, :contents, :dates)";
          $stmt = $db->prepare($sql);
          $params = array(':names' => $names,':contents' => $output,':dates' => $dates);
          $stmt->execute($params);

        }

      }else{
        /* echo '<h1>リダイレクト検知</h1>'; */
      }
    }
    $_SESSION["chkno"] = $chkno = mt_rand();

    echo '<!--データベースに接続成功しました-->';
    }catch(PDOException $e){
      echo'<!--データベースに接続接続出来ませんでした。-->';
    }
?>