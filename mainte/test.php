<?php

$contactFile = '.contact.dat';

// $fileContents = file_get_contents($contactFile); 

// echo $fileContents;

// // 上書き
// file_put_contents($contactFile,"てすとですてすとです");

// // 追記
// file_put_contents($contactFile,"てすとですてすとです",FILE_APPEND);


// ストリーム型でかく
$contents = fopen($contactFile, 'a+');

$addText = '１行追記' . "\n";

fwrite($contents,$addText);

fclose($contents);

