<?php

// change about
define("description" ,"株式会社 シーファイブ｜採用情報");
define("title" ,"株式会社 シーファイブ｜採用情報");
define("content", "recruit");

$activate = array(
  'home' => '',
  'company' => '',
  'service' => '',
  'recruit' => 'active',
  'contact' => '',
);

include_once 'header.php';
?>

<?php include_once 'content/'. content .'.html'; ?>

<?php include_once 'footer.php'; ?>
