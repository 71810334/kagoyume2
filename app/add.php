<?php
        require_once '../util/defineUtil.php';
        require_once '../util/scriptUtil.php';
        session_start();
        //ログアウトボタンを押したらセッション切断
        if(isset($_POST['logout'])&&$_POST['logout'] == 'LOGOUT'){
        session_unset();
    }
        //ログイン状態か判断
        if(isset($_SESSION['ok']) == 'ok' ){?>
          <div align="right">
            <form action="<?php echo my_data; ?>" method="GET">
              <?php echo 'ようこそ';?><a href="./mydata.php?id=<?php echo $_SESSION['login_userID']?>"><?php echo $_SESSION['login_name'];?></a><?php echo  'さん！';?>
              <input type="hidden" name="mydata" value="mydata">
            </form>
            <form action="<?php echo cart ?>">
              <input type="submit" name="cart" value="買い物かごへ">
            </form>
            <form action="<?php echo top ?>" method="POST">
              <input type="submit" name="logout" value="ログアウト">
              <input type="hidden" name="logout" value="LOGOUT">
            </form>
          </div>
<?php
    }else{
            //ログイン状態ではない場合はこちらへ分岐 ?>
            <div align="right">
              <?php  echo 'ようこそゲストさん！' ; ?>
            <form action="<?php echo login ?>" method="POST">
              <input type="submit" name="login" value="ログイン"></div>
              <input type="hidden" name="login" value="login">
            </form>
            </div>
<?php
    }
?>
<html>
    <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>カートへ追加</title>
    <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
    </head>
      <body>
          <h1>カートへ追加</h1>
          下記の商品をカートへ追加しました。<br><br>
<?php
          if(isset($_GET['add'])){
          $itemcode = $_GET['add'];
          //YahooAPIで検索した情報を$hitsへ格納
          $hits     = search_item($itemcode);
          //$hitsに格納した商品の全情報から必要な情報のみ取得する
          $name     = h($hits->Name);
          $image    = h($hits->Image->Medium);
          $syousai  = strip_tags($hits->Description);
          $price    = h($hits->Price);
          $_SESSION['cart'][$itemcode]= array(
                                'name' => $name, 'image' => $image,'price' => $price, 'qty' => 1);
    }
?>
          商品名:<?php echo $name;?><br><br>
          画像:<img src="<?php echo $image;?>" /><br><br>
          商品詳細:<?php echo $syousai;?><br><br>
          <form action="<?php echo cart ?>" method="GET">
            <input type="submit" name="add" value="買い物かごへ">
            <input type="hidden" name="add" value="<?php echo $itemcode;?>">
          </form>
<?php
          //トップに戻るリンク
          echo return_top();
?>
    </body>
</html>