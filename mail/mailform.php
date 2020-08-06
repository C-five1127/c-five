<?php

/*--------------------------------------------------------------------------
	
	Script Name : Responsive Mailform
	Author : FIRSTSTEP - Motohiro Tani
	Author URL : https://www.1-firststep.com
	Create Date : 2014/03/25
	Version : 5.1
	Last Update : 2017/04/18
	
--------------------------------------------------------------------------*/


error_reporting( E_ALL );




mb_language( 'ja' );
mb_internal_encoding( 'UTF-8' );




require_once( 'class.mailform.php' );
$responsive_mailform = new Mailform();




if ( file_exists( '../addon/confirm/confirm.php' ) ) {
	require_once( '../addon/confirm/confirm.php' );
}




$responsive_mailform->post_check();
$responsive_mailform->spam_check();
$responsive_mailform->mail_set( 'send' );
$responsive_mailform->mail_set( 'thanks' );
$responsive_mailform->mail_send();
$responsive_mailform->mail_result();




?>