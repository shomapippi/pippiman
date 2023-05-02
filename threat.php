<?php
  require_once ('./threat/send_threat.php');
  require_once ('./threat/display_threat.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>便利屋さいたま - スレッド(基盤)</title>
</head>
<body>
  <div>
    <?php
      echo     "<h2>".$titles_threat."</h2>
      <p><span>1</span><b>".$names_threat." ".$dates_threat."</b></p>";
      echo "<p>".$contents_threat."</p>";
    ?>
    <?php 
    for($i=1;$i<=$obj;$i++){
      $sql = "SELECT names FROM $titles_threat WHERE id=$i ORDER BY names";
      $res = $db->query($sql);
      foreach($res as $object){
        foreach($object as $get_names){
        }
      }
      $sql = "SELECT dates FROM $titles_threat WHERE id=$i ORDER BY dates";
      $res = $db->query($sql);
      foreach($res as $object){
        foreach($object as $get_dates){
        }
      }
      $sql = "SELECT contents FROM $titles_threat WHERE id=$i ORDER BY contents";
      $res = $db->query($sql);
      foreach($res as $object){
        foreach($object as $get_contents){
        }
      }

      if($obj == 1000){
        exit;
      }else{

        echo '<p id=">>'.($i+1).'"><span>'.($i+1)."</span><b>".$get_names." ".$get_dates."</b></p>";
        echo "<p>".$get_contents."</p>";
      }
    } ?>
  </div>

  <form method="post">
    <input name="names" type="text" placeholder="名前(省略可)"><br>
    <textarea id="contents" name="contents" type="text" placeholder="内容" required></textarea><br>
    <input name="chkno" type="hidden" value="<?php echo $chkno; ?>">
    <input name="send" type="submit" value="書き込む"><br>
  </form>

  <a href="./threat_list.php">スレッド一覧へ戻る</a>
</body>
</html>