<?php

// change about
define("description" ,"株式会社 シーファイブ｜事業内容");
define("title" ,"株式会社 シーファイブ｜事業内容");
define("content", "service");

$activate = array(
  'home' => '',
  'company' => '',
  'service' => 'active',
  'recruit' => '',
  'contact' => '',
);

include_once 'header.php';
?>

<?php include_once 'content/'. content .'.html'; ?>

<?php include_once 'footer.php'; ?>
