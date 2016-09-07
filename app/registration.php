<?php
        require_once '../util/defineUtil.php';
        require_once '../util/scriptUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>登録画面</title>
</head>
<body>
    <h1>新規会員登録</h1>
    <h3>項目ごとに記入をお願いします</h3><br>
        <?php session_start(); ?>
        <form action="<?php echo registration_confirm ?>" method="POST">
          名前:<input type="text" name="name" value="<?php echo form_value('name'); ?>">
            <br><br>
          パスワード:　<input type="password" name="password" value="<?php echo form_value('password'); ?>">
            <br><br>
          メールアドレス:<input type="text" name="mail" value="<?php echo form_value('mail'); ?>">
            <br><br>
          住所:<input type="text" name="address" value="<?php echo form_value('address'); ?>">
            <br><br><br>
              <input type="hidden" name="mode"  value="registration_confirm">
              <input type="submit" name="btnSubmit" value="確認画面へ">
        </form>
<?php
        //トップへ戻るリンク
        echo return_top();
?>
</body>
</html>