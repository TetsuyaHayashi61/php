  <!DOCTYPE html>
 <html lang="ja">
    <head>
       <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
       <title> PHPテスト</title>
    </head>
<body>
  <h1>PHPのテストです</h1>
    <p>
      今日の日付は
      <?php
      echo date('Y年m月d日');
      ?>
      です。
    </p>
    <p>
      <?php
        $num = rand(0,1);
        if ( $num == 0) {
          echo "今日の運勢は大吉です。";
        } else {
          echo "今日の運勢は凶です。";
        }
      ?>

      <?php
        $str = "山田";
        echo '<br>こんにちは{$str}さん\n';
        echo "こんにちは{$str}さん\n";
      ?>
    </p>
    <p>
      <?php
        $tall = array("哲也"=>"173cm", "由貴"=>"169cm");
        echo "哲也の身長は、{$tall["哲也"]}です。";
        echo "由貴の身長は、{$tall["由貴"]}です。";
      ?>
    </p>
</body>
</html>
