<?php


error_reporting( E_ALL );




mb_language( 'ja' );
mb_internal_encoding( 'UTF-8' );




require_once( 'class.mailform-js.php' );
$responsive_mailform_js = new Mailform_Js();




?>

$(function() {

    // 連絡方法ラジオボタン：電話選択 電話入力必須
    $('form#mail_form #radio-phone').on('click', function() {
        removeRequiredClass();
        $('form#mail_form #is-required-phone').addClass('required');
    });

    // 連絡方法ラジオボタン：メール選択 メール入力必須
    $('form#mail_form #radio-mail').on('click', function() {
        removeRequiredClass();
         $('form#mail_form #is-required-mail').addClass('required');
    });

    // 連絡方法ラジオボタン：どちらでも選択 電話／メール入力必須
    $('form#mail_form #radio-either').on('click', function() {
        removeRequiredClass();
        $('form#mail_form #is-required-phone').addClass('required');
        $('form#mail_form #is-required-mail').addClass('required');
    });

    var employee = location.search.substring(1, location.search.length);
    if (employee != "") {
        $('#' + employee).prop('checked', true);
    }
    else {
        $('input[name="employee"]:eq(0)').prop('checked', true);
    }

});

function removeRequiredClass()
{
    $('form#mail_form #is-required-phone').removeClass('required');
    $('form#mail_form #is-required-mail').removeClass('required');

}
