<?php
  try{
    $db = new PDO('mysql:dbname=threat;
    host=localhost;charset=utf8','pippi','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['id'])){
      $product = $_GET['id'];
    }
    $sql = "SELECT titles FROM mk_threat WHERE id = $product ORDER BY titles";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $titles_threat){
      }
    }

    $sql = "SELECT names FROM mk_threat WHERE id = $product ORDER BY names";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $names_threat){
      }
    }

    $sql = "SELECT contents FROM mk_threat WHERE id = $product ORDER BY contents";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $contents_threat){
      }
    }
    $sql = "SELECT dates FROM mk_threat WHERE id = $product ORDER BY dates";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $dates_threat){
      }
    }

    $sql = "SELECT MAX(id) FROM $titles_threat";
    $res = $db->query($sql);
    foreach($res as $object){
      foreach($object as $obj){
      }
    }
    echo '<!-- データベースに接続できました。 -->';
  }catch(PDOException $e){
    echo'<!-- データベースに接続接続出来ませんでした。 -->';
  }
?>