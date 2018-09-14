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

		if(isset($_GET['keyword'])){	
			$data['keyword'] = $_GET['keyword'];
			$data['listLocation'] = $this->weather_model->search($data['keyword']);
			$data['listJson'] = json_decode($data['listLocation'], true); 
			if(isset($_SESSION['search_count'])){	
				if (!in_array($data['keyword'], $_SESSION['save_data']))
				{
					if(count($data['listJson']) > 0){
				  		$_SESSION['save_data'][$_SESSION['search_count']] = $_GET['keyword'];
				  		$_SESSION['search_count'] += 1;
					}
				}
			}else{
				if(count($data['listJson']) > 0){
					$_SESSION['search_count'] = 1;
					$_SESSION['save_data'][0] = $_GET['keyword'];
				}
			}
		}else{
			$data['keyword'] ="";
			$data['listLocation'] = "";
			$data['listJson'] = "";
		}

		

		$data['title'] = 'Home';
						
		$this->load->view('page/header', $data);
		$this->load->view('page/search', $data);
		if(isset($_GET['keyword'])){
			$this->load->view('page/home', $data);		
		}else{
			$city = "";
			$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
			if ($query && $query['status'] == 'success') {
				$city = $query['city'];
				$data['listLocation'] = $this->weather_model->search($city);
				$data['listJson'] = json_decode($data['listLocation'], true);
				if(count($data['listJson']) > 0){
					$woeid = $data['listJson'][0]["woeid"];
					$data['weather'] = $this->weather_model->view_weather($woeid);
					$data['weatherJson'] = json_decode($data['weather'], true);
					$this->load->view('page/detail', $data);	
				}
			}
			
		}
		$this->load->view('page/footer', $data);


	}

	public function save()
	{

		if(isset($_GET['keyword'])){	
			$data['keyword'] = $_GET['keyword'];
		}else{
			$data['keyword'] = "";
		}
		$data['search_count'] = 0;
		if(isset($_SESSION['search_count'])){	
			$data['search_count'] = $_SESSION['search_count'];
		}

		if($data['search_count']>0){
			for($i=0;$i<$data['search_count'];$i++){
				if(isset($_SESSION['save_data'])){
					$data['save_data'][$i]=$_SESSION['save_data'][$i];
				}
			}

		}		

		$data['title'] = 'Save Data';
						
		$this->load->view('page/header', $data);
		$this->load->view('page/search', $data);
		$this->load->view('page/save', $data);
		$this->load->view('page/footer', $data);


	}

	public function detail($woeid = '')
	{

		if($woeid){	

			if(isset($_GET['keyword'])){	
				$data['keyword'] = $_GET['keyword'];
			}else{
				$data['keyword'] ="";
			}			

			$data['weather'] = $this->weather_model->view_weather($woeid);
			$data['weatherJson'] = json_decode($data['weather'], true);

			$data['title'] = 'Weather Detail';
							
			$this->load->view('page/header', $data);
			$this->load->view('page/search', $data);
			$this->load->view('page/detail', $data);
			$this->load->view('page/footer', $data);

		}else{
			redirect(base_url('admin/login')); 
		}


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
			echo $weatherJson["consolidated_weather"][0]["applicable_date"];
			//print_r($weatherJson);
		}

	}

}
