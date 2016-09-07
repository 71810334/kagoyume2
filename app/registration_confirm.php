<?php
      require_once '../util/defineUtil.php';
      require_once '../util/scriptUtil.php';
      require_once '../util/dbaccessUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>会員登録画面</title>
</head>
  <body>
    <?php
      if(!$_POST['mode']=="registration_confirm"){
      echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
      session_start();

        //セッションに値を格納しつつ、連想配列にポストされた値を格納
        $confirm_values = array('name'     => bind_p2s('name'),
                                'password' => bind_p2s('password'),
                                'mail'     => bind_p2s('mail'),
                                'address'  => bind_p2s('address'));
    }
        //1つでも未入力項目があったら表示しない
        if(!in_array(null,$confirm_values, true)){
    ?>
            <h1>登録確認画面</h1><br>
            名前      :<?php echo $confirm_values['name'];?><br>
            パスワード   :<?php echo $confirm_values['password'];?><br>
            メールアドレス:<?php echo $confirm_values['mail'];?><br>
            住所      :<?php echo $confirm_values['address'];?><br><br>

            上記の内容で登録します。よろしいですか？

            <form action="<?php echo registration_complete ?>" method="POST">
              <input type="hidden" name="mode" value="registration_complete" >
              <input type="submit" name="yes" value="はい">
            </form>
<?php
         }else{
?>
            <h1>入力項目が不完全なので再度入力をお願いします</h1><br>
            <h3>不完全な項目</h3>
        <?php
            //未入力項目を検出して表示
            foreach($confirm_values as $key => $value){
                if($value == null){
                    if($key == 'name'){
                        echo '名前';
                    }
                    if($key == 'password'){
                        echo 'パスワード';
                    }
                    if($key == 'mail'){
                        echo 'メールアドレス';
                    }
                    if($key == 'address'){
                        echo '住所';
                    }
                    echo 'が未記入です<br>';
                }
            }
        }
?><br><br>
            <form action="<?php echo registration ?>" method="POST">
              <input type="hidden" name="mode" value="registration" >
              <input type="submit" name="no" value="登録画面に戻る">
            </form>
        <?php
            //トップに戻るリンク
            echo return_top();
        ?>
</body>
</html>
