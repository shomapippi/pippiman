<?php
try{
  $db = new PDO('mysql:dbname=threat;
  host=localhost;charset=utf8','pippi','');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT MAX(id) FROM mk_threat";
  $res = $db->query($sql);
  foreach($res as $object){
    foreach($object as $obj){
    }
  }
  echo '<!-- データベースに接続できました -->';
  }catch(PDOException $e){
    echo'<!--データベースに接続出来ませんでした。-->';
  }
?>