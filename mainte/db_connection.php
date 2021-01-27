<?php

// const DB_HOST = 'mysql:dbname=content_php;host=127.0.0.1;charset=utf8';
// const DB_USER = 'tutorial_user';
// const DB_PASSWORD = 'Py0irQEg5i9LX8ny';

const DB_HOST = 'mysql:dbname=content_php;host=127.0.0.1;charset=utf8';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

try{
  $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD);
  echo '接続成功';
} catch(PDOException $e){
  echo '接続失敗' . $e->getMessage() . "\n";
  exit();
}
