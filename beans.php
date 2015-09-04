<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>コーヒー豆</title>
</head>
<body>
    <?php
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=beans,charaset=utf8','root','',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }

/*
      $dsn = 'mysql:dbname=beans,host=localhost,';
      $user = 'root';
      $password =  '';

      try {
        $dbh = new PDO($dsn,$user,$password);
      } catch (PDOException $e) {
        print('データベース接続失敗。'.$e->getMessage());
        die();
      }
*/

    ?>

</body>
</html>
