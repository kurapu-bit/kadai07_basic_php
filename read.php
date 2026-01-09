<?php
$path = "data/data.txt";

// カウント（初期値）
$q1A = 0; $q1B = 0;
$q2A = 0; $q2B = 0;
$q3A = 0; $q3B = 0;

$total = 0;

// ファイルがあれば読む
if (file_exists($path)) {
  $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  foreach ($lines as $line) {
    $line = trim($line);
    $cols = explode(",", $line); // ["A","B","A"] のようになる

    $q1 = $cols[0] ?? "";
    $q2 = $cols[1] ?? "";
    $q3 = $cols[2] ?? "";

    if ($q1 === "A") $q1A++;
    if ($q1 === "B") $q1B++;

    if ($q2 === "A") $q2A++;
    if ($q2 === "B") $q2B++;

    if ($q3 === "A") $q3A++;
    if ($q3 === "B") $q3B++;

    $total++; // 1行=1回答として数える
  }
}

// %計算（0件のときは0%）
$q1A_pct = ($total > 0) ? round($q1A / $total * 100, 1) : 0;
$q1B_pct = ($total > 0) ? round($q1B / $total * 100, 1) : 0;

$q2A_pct = ($total > 0) ? round($q2A / $total * 100, 1) : 0;
$q2B_pct = ($total > 0) ? round($q2B / $total * 100, 1) : 0;

$q3A_pct = ($total > 0) ? round($q3A / $total * 100, 1) : 0;
$q3B_pct = ($total > 0) ? round($q3B / $total * 100, 1) : 0;
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>結果</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h1>集計結果（全<?= $total ?>件）</h1>
  <p><a href="index.php">投票に戻る</a></p>

  <h2>Q1</h2>
  <p>A: <?= $q1A_pct ?>%（<?= $q1A ?>件） / B: <?= $q1B_pct ?>%（<?= $q1B ?>件）</p>
  <canvas id="q1" width="240" height="240"></canvas>

  <h2>Q2</h2>
  <p>A: <?= $q2A_pct ?>%（<?= $q2A ?>件） / B: <?= $q2B_pct ?>%（<?= $q2B ?>件）</p>
  <canvas id="q2" width="240" height="240"></canvas>

  <h2>Q3</h2>
  <p>A: <?= $q3A_pct ?>%（<?= $q3A ?>件） / B: <?= $q3B_pct ?>%（<?= $q3B ?>件）</p>
  <canvas id="q3" width="240" height="240"></canvas>

  <script>
    // A件数とB件数を渡して円グラフを作る関数
    function pie(id, a, b) {
      new Chart(document.getElementById(id), {
        type: 'pie',
        data: {
          labels: ['A', 'B'],
          datasets: [{ data: [a, b] }]
        },
        options: {
          responsive: false,    // 自動で引き伸ばさない
        }
      });
    }

    // PHPの数をそのままJSに
    pie('q1', <?= $q1A ?>, <?= $q1B ?>);
    pie('q2', <?= $q2A ?>, <?= $q2B ?>);
    pie('q3', <?= $q3A ?>, <?= $q3B ?>);
  </script>
</body>
</html>
