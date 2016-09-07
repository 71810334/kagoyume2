<?php
      require_once '../util/defineUtil.php';
      require_once '../util/scriptUtil.php';
      require_once '../util/dbaccessUtil.php';
      $mode=isset($_POST['mode'])?$_POST['mode']:null;
      session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
    <body>
        <?php
        if($mode != "mydata_update_result"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
        $id     = $_SESSION['login_userID'];
        $result = profile_detail($id);
        //エラーが発生しなければ表示を行う
        if(is_array($result)){
        $_SESSION['userID']   = $result[0]['userID'];
        $_SESSION['name']     = $result[0]['name'];
        $_SESSION['password'] = $result[0]['password'];
        $_SESSION['mail']     = $result[0]['mail'];
        $_SESSION['address']  = $result[0]['address'];
        //各セッションを変数へ代入
        $_SESSION['userID']   = $result[0]['userID'];
        $name     = $_SESSION['name'];
        $password = $_SESSION['password'];
        $mail     = $_SESSION['mail'];
        $address  = $_SESSION['address'];
}
        //更新項目を検索し、$resultへ代入
        $result   = update_profiles($name, $password, $mail, $address);
        //エラーが発生しなければ表示を行う
        if(!isset($result)){
?>
    <h1>更新確認</h1>
        以上の内容で更新しました。<br>
        <?php
    }else{
        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
      }
    }
        //トップへ戻るリンク
        echo return_top();
?>
    </body>
</html>