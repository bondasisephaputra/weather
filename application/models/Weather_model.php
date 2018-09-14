<?php
class Weather_model extends CI_Model {

	var $base='https://www.metaweather.com';

	public function __construct()
	{
		
	}

	public function search($keyword) {
			
		$url = $this->base."/api/location/search/?query=".$keyword;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
			
	}

	public function view_weather($woeid) {
			
		$json = file_get_contents($this->base."/api/location/".$woeid);

		return $json;
			
	}
}
?>