<?php

//CSVファイルのオープンとクローズ
//$fp = fopen("開きたいファイル", "モード"); // モード: r=読込, w:書込, a:追記書込
//while ($data = fgetcsv($fp)) {
//  何かしら処理
//}
//fclose($fp);

//社員情報CSVオープン
$fp = fopen(__DIR__ . "/input.csv", "r");

//ファイルを1行ずつ読込、終端まで繰り返し
$lineCount = 0;
$manCount = 0;
$womanCount = 0;
while ($data = fgetcsv($fp)) {
  $lineCount++;
  if ($lineCount === 1) {
    //次の行へ進む
    continue;
  }
  //男性？
  if ($data[4] === '男性') {
    //男性人数 = 男性人数 + 1
    $manCount++;
  } else {
    //女性人数 = 女性人数 + 1
    $womanCount++;
  }

}
//社員情報CSVクローズ
fclose($fp);

//debug
// echo "{$manCount}, {$womanCount}";
//出力ファイルオープン
$fpOut = fopen(__DIR__ . "/output.csv", "w");
//ヘッダー行　書込
$header = ["男性", "女性"];
fputcsv($fpOut,  $header);

//男性人数,女性人数 書き込み
$outputData = [$manCount, $womanCount];
fputcsv($fpOut, $outputData);

//出力ファイルクローズ
fclose($fpOut);

 ?>
