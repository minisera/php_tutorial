<?php

function validation($request){
  $errors = [];

  if(empty($request['your_name']) || 20 < mb_strlen($request['your_name'])){
    $errors[] = '氏名は必須です。20文字以内で入力して下さい';
  }

  if(empty($request['content']) || 200 < mb_strlen($request['content'])){
    $errors[] = 'お問い合わせ内容は必須です。200文字以内で入力して下さい';
  }

  if(!isset($request['gender'])){
    $errors[] = '性別を設定して下さい';
  }

  if(empty($request['age'])){
    $errors[] = '年齢を設定て下さい';
  }

  return $errors;

}

?>