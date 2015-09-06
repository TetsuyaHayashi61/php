<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>登録内容修正</title>
</head>
<body>
  <?php
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=beans;','coffee','coffeememo',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }

    $st = $pdo->prepare("UPDATE purchased SET shop=:shop, coffee_name=:coffee_name WHERE shop=:old_shop");
    $st->bindParam(':shop', $shop, PDO::PARAM_STR);
    $st->bindParam(':coffee_name', $coffee_name, PDO::PARAM_STR);
    $st->bindParam(':old_shop', $old_shop, PDO::PARAM_STR);
    $st->execute(array($_POST['shop'],$_POST['coffee_name'],$_POST['old_shop']));
    echo "登録内容を変更しました。";
  ?>
  <p><a href='beans.php'>一覧へ戻る</a>
</body>
</html>
