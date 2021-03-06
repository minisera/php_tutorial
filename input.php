<?php
  echo $_POST['your_name'];
  var_dump($_POST['your_name']);
  var_dump($_POST['email']);
  var_dump($_POST['btn_confirm']);
  var_dump($_POST['btn_submit']);

  require 'validation.php';

  function h($str)
  {
    return htmlspecialchars($str,ENT_QUOTES, 'UTF-8');
  }

  // エラー文
  $errors = validation($_POST);

  $pageFlag = 0;
  if(!empty($_POST["btn_confirm"]) && empty($errors)){
    $pageFlag = 1;
  }
  if(!empty($_POST["btn_submit"])){
    $pageFlag = 2;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>form</title>
</head>
<body>

  <?php if($pageFlag === 0) : ?>

  <?php if(!empty($errors) && !empty($_POST["btn_confirm"])) : ?>
  <?php echo '<ul>' ;?>
  <?php 
    foreach($errors as $error){
      echo '<li>' . $error . '</li>';
    }
  ?>
  <?php echo '</ul>' ;?>
  <?php endif ;?>
  
  <form method="POST" action="input.php">
  <div class="mb-3">
  <label for="your_name" class="form-label">氏名</label>
  <input type="text" name="your_name" id="your_name" class="form-control" value="<?php if(!empty(h($_POST['your_name']))){echo h($_POST['your_name']);} ?>">
  <br>
  </div>
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
  ホームページ
  <?php echo h($_POST['url']); ?>
  <br>
  性別
  <?php 
  if($_POST['gender']=== '0'){echo "男性";}
  if($_POST['gender']=== '1'){echo "女性";}
  ?>
  <br>
  年齢
  <?php 
    if($_POST['age'] === '1'){echo '~19歳';}
    if($_POST['age'] === '2'){echo '20~29歳';}
    if($_POST['age'] === '3'){echo '30~39歳';}
    if($_POST['age'] === '4'){echo '40~49歳';}
    if($_POST['age'] === '5'){echo '50~59歳';}
    if($_POST['age'] === '6'){echo '~60歳';}
  ?>
  <br>
  お問い合わせ内容
  <?php echo h($_POST['content']); ?>
  <br>
  <input type="submit" name="btn_submit" value="送信する">
  <input type="submit" name="back" value="戻る">
  <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
  <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
  <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
  <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
  <input type="hidden" name="content" value="<?php echo h($_POST['content']); ?>">
  <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
  </form>
  <?php endif; ?>


  <?php if($pageFlag === 2) : ?>
  <br>
  送信が完了しました。
  <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

