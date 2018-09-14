<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
				
		$this->load->model('weather_model');
	}

	public function index()
	{


		$this->load->view('page/header');
		$this->load->view('page/home');
		$this->load->view('page/footer');

	}

	public function get_weather()
	{

		$city = $this->weather_model->search('london');
									
		$cityJson = json_decode($city, true);
		//print_r($cityJson);
		for ($i=0; $i < count($cityJson); $i++){
			echo $cityJson[$i]["title"]."<br/>";
			$weather = $this->weather_model->view_weather($cityJson[$i]["woeid"]);
			$weatherJson = json_decode($weather, true);
			echo $weatherJson ["consolidated_weather"][0]["applicable_date"];
			//print_r($weatherJson);
		}

	}

}
