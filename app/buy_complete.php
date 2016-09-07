<?php
        require_once '../util/defineUtil.php';
        require_once '../util/scriptUtil.php';
        require_once '../util/dbaccessUtil.php';
        session_start();
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
	<title>購入完了ページ</title>
</head>
    <body>
    <?php
       //DBへ情報をセッションから取り出して変数へ格納
        $userID = $_SESSION['login_userID'];
        $total  = $_SESSION['total'];
        $type   = $_SESSION['type'];
        //データの挿入処理
        $result = insert_buy($userID,$total, $type);
        // エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>購入完了</h1><br>

        ご購入ありがとうございました！<br>
        <?php
        //カートのセッションを削除して空にする
        unset($_SESSION['cart']); ?>
<?php
    }else{
        echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
        //トップへ戻るリンク
        echo return_top();
    ?>
    </body>
</html>