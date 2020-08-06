<?php

// change about
define("description" ,"株式会社 シーファイブ｜お問い合わせ");
define("title" ,"株式会社 シーファイブ｜お問い合わせ");
define("content", "contact");

$activate = array(
  'home' => '',
  'company' => '',
  'service' => '',
  'recruit' => '',
  'contact' => 'active',
);

include_once 'header.php';
?>

<?php include_once 'content/'. content .'.html'; ?>

<?php include_once 'footer.php'; ?>
