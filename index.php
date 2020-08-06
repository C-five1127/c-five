<?php

// change about
define("description" ,"株式会社 シーファイブ");
define("title" ,"株式会社 シーファイブ");
define("content", "index");

$activate = array(
  'home' => 'active',
  'company' => '',
  'service' => '',
  'recruit' => '',
  'contact' => '',
);

include_once 'header.php';
?>

<?php include_once 'content/'. content .'.html'; ?>

<?php include_once 'footer.php'; ?>
