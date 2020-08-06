<?php ?>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <meta name="description" content="<?php echo description; ?>" >
  <meta name="keywords" content=",C-FIVE,C-Five,cfive,シーファイブ,OACホールディングス,OACholdings,シートス" />
  <title><?php echo title; ?></title>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
  <link rel="stylesheet" href="css/<?php echo content; ?>.css" type="text/css">
  <link rel="stylesheet" href="css/sp-styles.css" type="text/css" media="(max-width: 780px)">

  <link rel="shortcut icon" href="img/logo/C-Five_logo_mark.png" />

  <script src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/bundle.js"></script>

</head>
<body>
<header>
  <div class="l-flex">
    <div class="logo">
      <a href="./"><img src="img/logo/C-Five_logo.png"></a>
    </div>
    <div class="sp-menu">
      <img src="img/sp/menu.png">
    </div>
    <div class="custom-menu">
      <img src="img/sp/cross.png">
      <ul>
        <li><label class="<?php echo $activate['home']?>" onclick="location.href='./'">HOME</label></li>
        <li id="company_label"><label class="<?php echo $activate['company']?>" onclick="location.href='./company.php'">会社情報</label></li>
        <li><label class="<?php echo $activate['service']?>" onclick="location.href='./service.php'">事業内容</label></li>
        <li><label class="<?php echo $activate['recruit']?>" onclick="location.href='./recruit.php'">採用情報</label></li>
        <li><label class="<?php echo $activate['contact']?>" onclick="location.href='./contact.php'">お問い合わせ</label></li>
      </ul>
    </div>
    <div class="menu">
      <ul class="l-flex">
        <li><label class="<?php echo $activate['home']?>" onclick="location.href='./'">HOME</label></li>
        <li id="company_label"><label class="<?php echo $activate['company']?>" onclick="location.href='./company.php'">会社情報</label>
          <ul>
            <li><label onclick="location.href='message.php'">- 代表挨拶</label></li>
            <li><label onclick="location.href='aboutus.php'">- 会社概要</label></li>
            <li><label onclick="location.href='group.php'">- グループ企業</label></li>
          </ul>
        </li>
        <li><label class="<?php echo $activate['service']?>" onclick="location.href='./service.php'">事業内容</label></li>
        <li><label class="<?php echo $activate['recruit']?>" onclick="location.href='./recruit.php'">採用情報</label></li>
        <li><label class="<?php echo $activate['contact']?>" onclick="location.href='./contact.php'">お問い合わせ</label></li>
      </ul>
    </div>
  </div>
</header>
<div>

  <?php
  $content = content;
  if (strcmp(content, "aboutus") != 0 and strcmp(content, "privacy") != 0 and strcmp(content, "security") != 0) {
    echo <<<EOM
    <div class="eyecatch">
      <img src="img/kv-{$content}.png">
    </div>
    EOM;
  }
  ?>

</div>

<br>
<br>
