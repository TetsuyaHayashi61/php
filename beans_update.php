<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>登録内容修正</title>
</head>
<body>
  <?php
    $pid = htmlspecialchars($_GET['pid']);
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=beans;','coffee','coffeememo',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
    $st = $pdo->prepare("SELECT * FROM purchased WHERE pid=:pid");
    $st->bindParam(':pid', $pid, PDO::PARAM_INT);
    $st->execute(array($pid));
    $row = $st->fetch();
    $pid = htmlspecialchars($row['pid']);
    $shop = htmlspecialchars($row['shop']);
    $coffee_name = htmlspecialchars($row['coffee_name']);

  ?>
  <form action ="beans_updated.php" method="post">
      <p><label>購入店<input type="text" name="shop" value="<?php echo $shop ?>"></label></p><br>
      <p><label>コーヒー名(銘柄)<input type="text" name="coffee_name" value="<?php echo $coffee_name ?>"></label></p><br>
      <input type="hidden" name= "old_pid" value="<?php echo $pid ?>" >
      <input type="submit" name="alter" value="変更">
      <p><a href='beans.php'>一覧へ戻る</a>
  </form>
</body>
</html>
