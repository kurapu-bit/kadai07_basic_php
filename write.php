<?php 
$q1 = $_POST['q1'] ?? ''; 
$q2 = $_POST['q2'] ?? ''; 
$q3 = $_POST['q3'] ?? ''; 

$str = $q1 . "," . $q2 . "," . $q3;

$path = __DIR__ . "/data/data.txt";
$file = fopen($path, "a");
fwrite($file, $str . "\n");
fclose($file);
?> 


<!DOCTYPE html> 
<html> 
<head>
<meta charset="utf-8"> 
<title>フォーム内容を読み込み</title> 
</head> 

<body> 
  <p>内容を記録しました。</p>
  <ul> <li><a href="index.php">戻る</a></li> </ul> 
  <ul> <li><a href="read.php">集計を確認する</a></li> </ul> 
  </body> 
  </html>