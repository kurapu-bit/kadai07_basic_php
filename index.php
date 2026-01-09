<!-- 上にPHPの処理をかいて、結果をHTMLに埋め込む -->
<!-- データ入力 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>WE価値観調査「あなたはどっち派？」</p>
  <form action="write.php" method="post"> 
  <p>Q1：休日の理想は<br>
    <label><input type="radio" name="q1" value="A" required>外に出て刺激を取りに行く</label><br>
    <label><input type="radio" name="q1" value="B" required>家で回復・整える</label>
  </p>
  <p>Q2：予定の立て方は<br>
    <label><input type="radio" name="q2" value="A" required>早めに埋めて安心したい</label><br>
    <label><input type="radio" name="q2" value="B" required>直前に決めて自由でいたい</label>
  </p>
  <p>Q3：買い物のスタイルは<br>
    <label><input type="radio" name="q3" value="A" required>レビュー熟読・比較検討</label><br>
    <label><input type="radio" name="q3" value="B" required>直感で即決</label>
  </p>
  <button type="submit">送信する</button>
</form>

</body>
</html>