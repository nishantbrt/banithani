<?php
class ControllerExtensionModuleInstagram extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/instagram');
		// $user_id="7813168819";
		// $access_token = "7813168819.0912694.3160618abad945a0a0b69771ddf03065";
		if ($setting['user_id']) {
			$user_id = $setting['user_id'];
		} else {
			$user_id = '';
		}

		if ($setting['site_key']) {
			$access_token = $setting['site_key'];
		} else {
			$access_token = '';
		}

		$url = "https://api.instagram.com/v1/users/".$user_id."/media/recent?access_token=".$access_token;

		        
		$ch = curl_init($url); 

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

		$json = curl_exec($ch); 
		curl_close($ch);
		$data['result'] = json_decode($json);
		//echo '<pre>';print_r($result); exit;

		return $this->load->view('extension/module/instagram', $data);
	}
}