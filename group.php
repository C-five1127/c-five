<?php

// change about
define("description" ,"株式会社 シーファイブ｜グループ企業");
define("title" ,"株式会社 シーファイブ｜グループ企業");
define("content", "group");

$activate = array(
  'home' => '',
  'company' => 'active',
  'service' => '',
  'recruit' => '',
  'contact' => '',
);

include_once 'header.php';
?>

<?php include_once 'content/'. content .'.html'; ?>

<?php include_once 'footer.php'; ?>
