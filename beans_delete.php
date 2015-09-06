<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>削除完了</title>
</head>
<body>
  <?php
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=beans;','coffee','coffeememo',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }

    $st = $pdo->prepare("DELETE FROM purchased WHERE shop=:shop");
    $st->bindParam(':shop', $shop, PDO::PARAM_STR);
    $st->execute(array($_GET['shop']));
    echo "削除しました。";
  ?>
  <p><a href='beans.php'>一覧へ戻る</a>
</body>
</html>
