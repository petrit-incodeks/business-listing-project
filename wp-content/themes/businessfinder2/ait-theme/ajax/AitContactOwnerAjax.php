<?php

/*
 * AIT WordPress Theme Framework
 *
 * Copyright (c) 2013, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */


class AitContactOwnerAjax extends AitFrontendAjax
{

	/**
	 * @WpAjax
	 */
	public function send()
	{
		$matches = array();
		preg_match_all('/{([^}]*)}/', $_POST['response-email-content'], $matches);

		foreach($matches[1] as $i => $match){
			$_POST['response-email-content'] = str_replace($matches[0][$i], $_POST[$match], $_POST['response-email-content']);
		}

		$_POST['response-email-content'] = str_ireplace(array("\r\n", "\n"), "<br />", $_POST['response-email-content']);

		$senderName = isset($_POST['response-email-sender-name']) ? $_POST['response-email-sender-name'] : '';

		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'Reply-To: '.$_POST['user-name'].' <'.$_POST['user-email'].'>',
			'From: '.$senderName.' <'.$_POST['response-email-sender-address'].'>', 
		);
		
		$result = wp_mail($_POST['response-email-address'], $_POST['response-email-subject'], stripcslashes( $_POST['response-email-content'] ), $headers, null);
		if($result == true){
			$this->sendJson(array('message' => sprintf(__("Mail sent to %s", 'ait'), $_POST['response-email-address'])));
		} else {
			$this->sendErrorJson(array('message' => __("Mail failed to send", 'ait')));
		}
	}
}

class AitContactOwnerCaptchaAjax extends AitFrontendAjax
{

	/**
	 * @WpAjax
	 */
	public function check()
	{
		$captcha = new AitReallySimpleCaptcha();
		$captcha->tmp_dir = aitPaths()->dir->cache . '/captcha';

		$result = false;

		if(!empty($_POST['captcha-check'])){
			if($captcha->check('ait-contact-owner-captcha-'.$_POST['captcha-hash'], $_POST['captcha-check'])){
				$result = true;
			}
		}

		$this->sendJson($result);
	}
	
	/**
	 * @WpAjax
	 */
	public function getCaptcha(){
		$rand = rand();
		$captcha = new AitReallySimpleCaptcha();

		$imgUrl = "";
		
		$captcha->tmp_dir = aitPaths()->dir->cache . '/captcha';
		$cacheUrl = aitPaths()->url->cache . '/captcha';
		
		$img = $captcha->generate_image('ait-contact-owner-captcha-'.$rand, $captcha->generate_random_word());
		$imgUrl = $cacheUrl."/".$img;

		$this->sendJson(array('rand' => $rand, 'url' => $imgUrl, 'html' => '<img src="'.$imgUrl.'" alt="captcha">'));
	}

}
