<?php

// change about
define("description" ,"株式会社 シーファイブ｜代表挨拶");
define("title" ,"株式会社 シーファイブ｜代表挨拶");
define("content", "message");

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
