<?php
  require_once ('./threat/threat_list.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>便利屋さいたま - スレッド一覧(基盤)</title>
</head>
<body>
  <?php if($obj == NULL){echo '0個';}else{echo $obj.'個';} ?>
  <?php if($obj == NULL){echo '<p>まだスレッドがありません！<br>あなたが最初です！<br>あなたの地域に役立つと思うアイディアを共有しあってみましょう！</p>';} ?>
  <ol>
    <?php for($i=$obj;$i>=1;$i--){?>
      <li> 
        <a href="./threat.php?id=<?php echo $i;?>"><?php $sql1 = "SELECT titles FROM mk_threat WHERE id = $i ORDER BY titles"; $res1 = $db->query($sql1);foreach($res1 as $object1){ foreach($object1 as $obj1){}}echo $obj1;?></a><br>
      </li>
    <?php } ?>
  </ol>
  <a href="./mk_threat.php">スレッドを建てる</a>
</body>
</html>