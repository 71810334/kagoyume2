<?php
      require_once '../util/defineUtil.php';
      require_once '../util/scriptUtil.php';
      require_once '../util/dbaccessUtil.php';
      session_start();

      //名前とパスワード両方入力されていたら、入力された値を変数に格納
      if (isset($_POST['name'])&&($_POST['password'])){
          $login = login($_POST['name'],$_POST['password']);
      //入力フォームに入力された値がDBの情報と合ってるかを検証
      if ($_POST['name'] ==  $login[0]['name']  && $_POST['password'] ==  $login[0]['password']){
          $_SESSION['ok'] = 'ok';
          $_SESSION['login_name'] = $login[0]['name'];
          $_SESSION['login_userID'] = $login[0]['userID'];
      }
      //トップページへ遷移
      echo '<meta http-equiv="refresh" content="0;URL='.top.'">';
      //ログイン状態ではない場合はログイン画面を表示
      }else{
    }
?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title>ログイン画面</title>
</head>
    <body>
        <h1>ログイン画面</h1>
          <a href="<?php echo registration; ?>">新規登録</a><br><br>
        <form action="<?php echo login ?>" method="POST">
          ユーザー名: <br>
          <input type="text" name="name" value="<?php echo form_value('name'); ?>">
        <br><br>
          パスワード: <br>
        <input type="password" name="password" value="<?php echo form_value('password'); ?>">
        <br><br>
        <input type="hidden" name="login"  value="login">
        <input type="submit" name="btnSubmit" value="ログイン">

        </form>
<?php
        //トップへ戻るリンク
        echo return_top();
?>
</body>
</html>