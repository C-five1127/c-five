<?php

// change about
define("description" ,"株式会社 シーファイブ｜プライバシーポリシー");
define("title" ,"株式会社 シーファイブ｜プライバシーポリシー");
define("content", "privacy");

$activate = array(
  'home' => '',
  'company' => '',
  'service' => '',
  'recruit' => '',
  'contact' => '',
);

include_once 'header.php';
?>

<?php include_once 'content/'. content .'.html'; ?>

<?php include_once 'footer.php'; ?>
