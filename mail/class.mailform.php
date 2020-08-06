<?php

class Mailform {

	// private property
	private $send_address          = '';
	private $thanks_page_url       = '';

	private $send_subject          = '';
	private $send_body             = '';

	private $reply_mail            = '';
	private $send_name             = '';
	private $thanks_subject        = '';
	private $thanks_body           = '';
	private $thanks_body_signature = '';

	private $javascript_check      = '';
	private $domain_check          = '';
	private $domain_name           = '';


	private $referer               = '';
	private $addr                  = '';
	private $host                  = '';
	private $agent                 = '';


	private $javascript_action    = false;
	private $javascript_comment   = '送信前の入力チェックは動作しませんでした。';
	private $now_url              = '';
	private $before_url           = '';
	private $writing_time         = '0';


	private $order_count          = '0';
	private $order_isset          = array();
	private $post_isset           = array();
	private $mail_address         = '';
	private $reply_mail_address   = false;


	private $my_result            = false;
	private $you_result           = false;


	// confirm addon property
	private $confirm_window       = '1';


	// attachment addon property
	private $jpg                  = 1;
	private $png                  = 1;
	private $gif                  = 1;
	private $zip                  = 1;
	private $upload_max_size      = 2000000;

	private $attachment_tmp_name  = array();
	private $attachment_name      = array();
	private $attachment_type      = array();
	private $attachment_flag      = false;




	// public construct
	public function __construct() {

		include( 'config.php' );


		$this->send_address          = $rm_send_address;
		$this->thanks_page_url       = $rm_thanks_page_url;

		$this->send_subject          = $rm_send_subject;
		$this->send_body             = $rm_send_body;

		$this->reply_mail            = $rm_reply_mail;
		$this->send_name             = $rm_send_name;
		$this->thanks_subject        = $rm_thanks_subject;
		$this->thanks_body           = $rm_thanks_body;
		$this->thanks_body_signature = $rm_thanks_body_signature;

		$this->javascript_check      = $rm_javascript_check;
		$this->domain_check          = $rm_domain_check;
		$this->domain_name           = $rm_domain_name;


		if ( file_exists( '../addon/confirm/confirm-config.php' ) ) {
			require_once( '../addon/confirm/confirm-config.php' );
			$this->confirm_window = $rm_confirm_window;
		}


		if ( file_exists( '../addon/attachment/attachment-config.php' ) ) {
			require_once( '../addon/attachment/attachment-config.php' );
			$this->jpg             = $rm_jpg;
			$this->png             = $rm_png;
			$this->gif             = $rm_gif;
			$this->zip             = $rm_zip;
			$this->upload_max_size = $rm_upload_max_size;
		}

	}




	// public spam_check
	public function spam_check() {

		if ( $this->domain_check == 1 && ! empty( $this->domain_name ) ) {
			if ( strpos( $this->referer, $this->domain_name ) === false ) {
				echo 'spam_failed-0002,不正な操作が行われたようです。';
				exit;
			}
		}


		if ( $this->javascript_check == 1 && $this->javascript_action === false ) {
			echo 'spam_failed-0001,不正な操作が行われたようです。';
			exit;
		}

	}




	// public post_check
	public function post_check() {

		if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
			$this->referer = $_SERVER['HTTP_REFERER'];
		}


		if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			$this->addr = $_SERVER['REMOTE_ADDR'];
		}


		if ( isset( $_SERVER['REMOTE_HOST'] ) ) {
			$this->host = $_SERVER['REMOTE_HOST'];
		} else {
			$this->host = gethostbyaddr( $_SERVER['REMOTE_ADDR'] );
		}


		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$this->agent = $_SERVER['HTTP_USER_AGENT'];
		}


		if( ! empty( $_POST['javascript_action'] ) && $_POST['javascript_action'] === 'true' ) {
			$this->javascript_action = true;
			$this->javascript_comment = '送信前の入力チェックは正常に動作しました。';
		}


		if ( ! empty( $_POST['now_url'] ) ) {
			$this->now_url = $this->sanitize_post( $_POST['now_url'] );
			$this->now_url = mb_convert_kana( $this->now_url, 'as' );
		}


		if ( ! empty( $_POST['before_url'] ) ) {
			$this->before_url = $this->sanitize_post( $_POST['before_url'] );
			$this->before_url = mb_convert_kana( $this->before_url, 'as' );
		}


		if ( ! empty( $_POST['writing_time'] ) ) {
			$this->writing_time = $this->sanitize_post( $_POST['writing_time'] );
			$this->writing_time = mb_convert_kana( $this->writing_time, 'a' );
		}


		if ( ! empty( $_POST['order_count'] ) ) {
			$this->order_count = $this->sanitize_post( $_POST['order_count'] );
			$this->order_count = mb_convert_kana( $this->order_count, 'KVa' );
		}


		for ( $i = 1; $i < $this->order_count + 1; $i++ ) {

			if ( ! empty( $_POST['order_'.$i] ) ) {
				$this->order_isset[$i] = $this->sanitize_post( $_POST['order_'.$i] );
				$this->order_isset[$i] = mb_convert_kana( $this->order_isset[$i], 'KVa' );
				$this->order_isset[$i] = explode( ',', $this->order_isset[$i] );
			}


			if ( $this->order_isset[$i][0] == 'checkbox' ) {

				if ( ! empty( $_POST[$this->order_isset[$i][1]] ) ) {
					foreach( $_POST[$this->order_isset[$i][1]] as $key => $value ) {
						$this->post_isset[$i][] = $this->sanitize_post( $_POST[$this->order_isset[$i][1]][$key] );
					}
					$this->post_isset[$i] = implode( '、', $this->post_isset[$i] );
				}

			} else if ( $this->order_isset[$i][0] == 'email' ) {

				if ( ! empty( $_POST[$this->order_isset[$i][1]] ) ) {
					$this->post_isset[$i] = $this->sanitize_post( $_POST[$this->order_isset[$i][1]] );
					$this->post_isset[$i] = mb_convert_kana( $this->post_isset[$i], 'KVa' );

					if ( ! preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $this->post_isset[$i] ) ) {
						echo 'spam_failed-0003,正しくないメールアドレスです。';
						exit;
					} else {
						$this->mail_address       = $this->post_isset[$i];
						$this->reply_mail_address = true;
					}
				}

			} else if ( $this->order_isset[$i][0] == 'file' ) {

				if ( file_exists( '../addon/attachment/post-check.php' ) ) {
					require( '../addon/attachment/post-check.php' );
				}

			} else {

				if ( ! empty( $_POST[$this->order_isset[$i][1]] ) ) {
					$this->post_isset[$i] = $this->sanitize_post( $_POST[$this->order_isset[$i][1]] );
					$this->post_isset[$i] = mb_convert_kana( $this->post_isset[$i], 'KVa' );
				}

			}

		}

	}




	// public mail_set
	public function mail_set( $set ) {

		$send_date = date( 'Y年m月d日　H時i分s秒' );


		$set_body  = PHP_EOL;
		$set_body .= '-----------------------------------------------------------------------------------'.PHP_EOL;
		$set_body .= PHP_EOL;
		$set_body .= '【送信時刻】'.PHP_EOL;
		$set_body .= $send_date;

		for ( $i = 1; $i < $this->order_count + 1; $i++ ) {

			if ( $this->order_isset[$i][2] == 'false' ) {
				$set_body .= PHP_EOL;
				$set_body .= PHP_EOL;
				$set_body .= '【'.$this->order_isset[$i][3].'】'.PHP_EOL;
				$set_body .= $this->post_isset[$i];
			} else {
				$set_body .= '　'.$this->post_isset[$i];
			}

		}


		if ( $set === 'send' ) {

			$set_body .= PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '-----------------------------------------------------------------------------------'.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【送信者のIPアドレス】'.PHP_EOL;
			$set_body .= $this->addr.''.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【送信者のホスト名】'.PHP_EOL;
			$set_body .= $this->host.''.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【送信者のブラウザ】'.PHP_EOL;
			$set_body .= $this->agent.''.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【送信前の入力チェック】'.PHP_EOL;
			$set_body .= $this->javascript_comment.''.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【メールフォームのURL】'.PHP_EOL;
			$set_body .= $this->now_url.''.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【メールフォームのページの直前に見たURL】'.PHP_EOL;
			$set_body .= $this->before_url.''.PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '【本文の入力時間】'.PHP_EOL;
			$set_body .= $this->writing_time.'秒'.PHP_EOL;
			$set_body .= PHP_EOL;

		} else {

			$set_body .= PHP_EOL;
			$set_body .= PHP_EOL;
			$set_body .= '-----------------------------------------------------------------------------------'.PHP_EOL;
			$set_body .= $this->thanks_body_signature;

		}


		if ( $set === 'send' ) {
			$this->send_body   .= $set_body;
		} else {
			$this->thanks_body .= $set_body;
		}

	}




	// public mail_send
	public function mail_send() {

		if ( $this->reply_mail_address === true ) {
			$additional_headers = "From: ".$this->mail_address."\r\n";
		} else {
			$additional_headers = "From: ".$this->send_address."\r\n";
		}

		if ( file_exists( '../addon/attachment/mail-multipart.php' ) ) {
			require_once( '../addon/attachment/mail-multipart.php' );
		}

		$this->my_result = mb_send_mail( $this->send_address, $this->send_subject, $this->send_body, $additional_headers );


		if ( $this->reply_mail == 1 ) {

			$this->send_name                 = mb_encode_mimeheader( $this->send_name, 'ISO-2022-JP' );
			$thanks_additional_headers = "From: ".$this->send_name." <".$this->send_address.">";

			if ( $this->reply_mail_address === true ) {
				$this->you_result = mb_send_mail( $this->mail_address, $this->thanks_subject, $this->thanks_body, $thanks_additional_headers );
			}else{
				$this->you_result = true;
			}

		}

	}




	// public mail_result
	public function mail_result() {

		if ( $this->reply_mail == 1 && $this->reply_mail_address === true ) {

			if ( $this->my_result && $this->you_result ) {
				echo 'send_success,' . $this->thanks_page_url;
			} else {
				echo 'send_failed,エラーが起きました。<br />ご迷惑をおかけして大変申し訳ありません。';
			}

		} else {

			if ( $this->my_result ) {
				echo 'send_success,' . $this->thanks_page_url;
			} else {
				echo 'send_failed,エラーが起きました。<br />ご迷惑をおかけして大変申し訳ありません。';
			}
		}

	}




	// public config_get
	public function config_get() {

		if ( file_exists( '../addon/confirm/config-get.php' ) ) {
			require_once( '../addon/confirm/config-get.php' );
		}

	}




	// public confirm_set
	public function confirm_set() {

		if ( file_exists( '../addon/confirm/confirm-set.php' ) ) {
			require_once( '../addon/confirm/confirm-set.php' );
		}

	}




	// public sanitize_post
	public function sanitize_post( $p ) {
		$p = htmlspecialchars( $p, ENT_QUOTES, 'UTF-8' );
		return $p;
	}

}

?>
