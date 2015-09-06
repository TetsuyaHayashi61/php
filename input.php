  <!DOCTYPE html>
 <html lang="ja">
    <head>
       <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
       <title> PHPテスト</title>
    </head>
    <body>

      <?php
        //1行コメントの書き方
        /*2行以上のコメントの書き方
        $stmt = $pdo->prepare('確認するSQL文を入力');
        if(!$stmt){
          echo "\nPDO::errorInfo():\n";
          print_r($pdo->errorInfo());
        }
        */

      try {
        $pdo = new PDO('mysql:host=localhost;dbname=beans;','coffee','coffeememo',
        array(PDO::ATTR_EMULATE_PREPARES => false));
      } catch (PDOException $e) {
        exit('データベース接続失敗。'.$e->getMessage());
      }

      //Insert
        $dbcol = 'shop,coffee_name';
        $sql = "INSERT INTO purchased ($dbcol) VALUES (:shop,:coffee_name)";
        $st = $pdo->prepare($sql);
        $st->bindParam(':shop', $shop, PDO::PARAM_STR);
        $st->bindParam(':coffee_name', $coffee_name, PDO::PARAM_STR);
        $ret = $st->execute(array($_POST['shop'],$_POST['coffee_name']));

      ?>

      <?php
        if (move_uploaded_file($_FILES['pic']['tmp_name'],'upload.jpg')) {
          echo '<img src="upload.jpg"  width="100" height="100" alt="">';
        } else {
          echo "画像ファイルを選択してください。";
        }
        if ($_POST['send']) {
          echo "登録しました！";
        } else {
          echo "登録されていません";
        }

        function h($str) {
          return htmlspecialchars($str, ENT_QUOTES);
        }
        echo h("<h1>見出し1</h1>");

      ?>
    </body>
</html>
