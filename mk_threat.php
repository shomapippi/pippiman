<?php
  require_once ('./threat/bild_threat.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>便利屋さいたま - スレッド作成(基盤)</title>
</head>
<body>
  <form method="post">
    <label>タイトルを入力してください</label><br>
    <input name="titles" type="text" placeholder="タイトル" required><br>
    <label>名前を入力してください</label><br>
    <input name="names" type="text" placeholder="名前を入力してください(省略可)"><br>
    <label>内容文</label><br>
    <textarea name="contents" placeholder="内容を入力してください。"></textarea required><br>
    <input name="chkno" type="hidden" value="<?php echo $chkno; ?>"><br>
    <input name="send" type="submit" value="募る">
  </form>
  <a href="./threat_list.php">スレッド一覧へ</a>
</body>
</html>