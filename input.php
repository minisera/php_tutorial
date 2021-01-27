<?php
  // 連想配列
  // echo $_POST['your_name'];
  // var_dump($_POST['your_name']);
  // var_dump($_POST['email']);
  // var_dump($_POST['btn_confirm']);
  // var_dump($_POST['btn_submit']);

  function h($str)
  {
    return htmlspecialchars($str,ENT_QUOTES, 'UTF-8');
  }

  $pageFlag = 0;
  if(!empty($_POST["btn_confirm"])){
    $pageFlag = 1;
  }
  if(!empty($_POST["btn_submit"])){
    $pageFlag = 2;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form</title>
</head>
<body>

  <?php if($pageFlag === 0) : ?>

  入力画面
  <form method="POST" action="input.php">
  氏名
  <input type="text" name="your_name" value="<?php if(!empty(h($_POST['your_name']))){echo h($_POST['your_name']);} ?>">
  <br>
  Eメール
  <input type="email" name="email" value="<?php if(!empty(h($_POST['email']))){echo h($_POST['email']);} ?>">
  <br>
  ホームページ
  <input type="url" name="url" value="<?php if(!empty(h($_POST['url']))){echo h($_POST['url']);} ?>">
  <br>
  性別
  <input type="radio" name="gender" value="0">男性
  <input type="radio" name="gender" value="1">女性
  <br>
  年齢
  <select name="age">
    <option value="">選択して下さい</option>
    <option value="1">~19歳</option>
    <option value="2">20~29歳</option>
    <option value="3">30~39歳</option>
    <option value="4">40~49歳</option>
    <option value="5">50~59歳</option>
    <option value="6">60歳~</option>
  </select>
  <br>
  お問い合わせ内容
  <textarea name="content">
  <?php if(!empty(h($_POST['content']))){echo h($_POST['content']);} ?>
  </textarea>
  <br>
  <input type="checkbox" name="caution" value="1" >注意事項にチェックして下さい
  <br>

  <input type="submit" name="btn_confirm" value="確認する">
  </form>
  <?php endif; ?>


  <?php if($pageFlag === 1) : ?>
  確認
  <form method="POST" action="input.php">
  氏名
  <?php echo h($_POST['your_name']); ?>
  <br>
  Eメール
  <?php echo h($_POST['email']); ?>
  <br>
  <input type="submit" name="btn_submit" value="送信する">
  <input type="submit" name="back" value="戻る">
  <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
  <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
  </form>
  <?php endif; ?>


  <?php if($pageFlag === 2) : ?>
  <br>
  送信が完了しました。
  <?php endif; ?>

</body>
</html>

