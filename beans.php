<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>コーヒー豆</title>
</head>
<body>
    <?php
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=beans;','coffee','coffeememo',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }

    ?>

    <table border="1">
      <tr><th>お店</th><th>コーヒー名</th><th>操作</th></tr>
      <?php
      $st = $pdo->query("SELECT * FROM purchased");
      while ($row = $st->fetch()) {
        $shop = htmlspecialchars($row['shop']);
        $coffee_name = htmlspecialchars($row['coffee_name']);
        echo "<tr><td>$shop</td><td>$coffee_name</td><td><a href='beans_update.php?shop=$shop'>修正</a></td>
        <td><a href='beans_delete.php?shop=$shop' onclick=\"return confirm('削除してよろしいですか？')\">削除</a></td></tr>";
      }
      ?>
    </table>
</body>
</html>
