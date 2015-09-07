<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>登録内容修正</title>
</head>
<body>
  <?php
    $shop = $_POST['shop'];
    $coffee_name = $_POST['coffee_name'];
    $old_pid = $_POST['old_pid'];

    try {
      $pdo = new PDO('mysql:host=localhost;dbname=beans;','coffee','coffeememo',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }

    $st = $pdo->prepare("UPDATE purchased SET shop=:shop, coffee_name=:coffee_name WHERE pid=:old_pid");
    $st->bindParam(':shop', $shop, PDO::PARAM_STR);
    $st->bindParam(':coffee_name', $coffee_name, PDO::PARAM_STR);
    $st->bindParam(':old_pid', $old_pid, PDO::PARAM_INT);
    $st->execute(array($shop,$coffee_name,$old_pid));
    echo "登録内容を変更しました。";
  ?>
  <p><a href='beans.php'>一覧へ戻る</a>
</body>
</html>
