<?php
      require_once '../util/defineUtil.php';
      require_once '../util/scriptUtil.php';
      session_start();

      $itemcode = $_GET['item'];
      //YahooAPIで検索した情報を$hitsへ格納
      $hits     = search_item($itemcode);
      //$hitsに格納した商品の全情報から必要な情報のみ取得
      $name     = h($hits->Name);
      $image    = h($hits->Image->Medium);
      $syousai  = strip_tags($hits->Description);
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>商品詳細</title>
        <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
    </head>
    <body>
        <form action="<?php echo add; ?>" method="GET">
          <h1>詳細情報</h1>
          商品名:<?php echo $name;?><br><br>
          画像:<br><img src="<?php echo $image; ?>" /><br><br>
          商品詳細:<br><?php echo $syousai;?><br><br><br><br>
        <form action="<?php echo add ?>" method="GET">
          <input type="submit" name="add" value="カートへ追加">
          <input type="hidden" name="add" value="<?php echo $itemcode;?>">
        </form>
<?php
          //トップに戻るリンク
          echo return_top();
?>
    </body>
</html>