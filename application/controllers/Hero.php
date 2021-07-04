<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hero_model', 'hero');
		$this->load->model('ReviewModel', 'review');
	}

	public function index()
	{
		$data['title'] = "BabyMoon - Your StayCation Solution !";
		$url = "https://data.covid19.go.id/public/api/skor.json";
		$get_url = file_get_contents($url);
		$d = json_decode($get_url);
		$data['city'] = $d->data;
		$data['popularHotel'] = $this->hero->getSafestHotel();
		$this->view->getDefault($data, 'hero');
	}

	public function listHotel()
	{
		$data['title'] = "BabyMoon - Hotels";
		$url = "https://data.covid19.go.id/public/api/skor.json";
		$get_url = file_get_contents($url);
		$d = json_decode($get_url);
		$data['city'] = $d->data;
		$data['cityNow'] = $this->input->post('city');
		$data['jlhIbuHamil'] = $this->input->post('jlhIbuHamil');
		$data['jlhDewasa'] = $this->input->post('jlhDewasa');
		$data['jlhAnak'] = $this->input->post('jlhAnak');
		$capacity = $this->input->post('jlhIbuHamil') + $this->input->post('jlhDewasa') + $this->input->post('jlhAnak');
		$data['listHotel'] = $this->hero->searchHotel($this->input->post('city'));
		$data['date1'] = $this->input->post('checkIn');
		$data['date2'] = $this->input->post('checkOut');
		$date1 = strtotime($this->input->post('checkIn'));
		$date2 = strtotime($this->input->post('checkOut'));
		$days = ($date2 - $date1) / 86400;
		$this->view->getDefault($data, 'listHotel');
	}

	public function detail($id)
	{
		if ($this->hero->checkHotel($id)) {
			$data['title'] = "BabyMoon - Hotels";
			$data['detail'] = $this->hero->getDetail($id);
			$data['gambar'] = $this->hero->getPicture($id);
			$data['rooms'] = $this->hero->getRooms($id);
			$data['reviews'] = $this->review->reviewList($id);
			$data['id'] = $id;
			$this->view->getDefault($data, 'detailHotel');
		} else {
			redirect('hero');
		}
	}
	public function getCity()
	{
		$cityId = $this->input->post('city_id');
		$url = "https://data.covid19.go.id/public/api/skor.json";
		$get_url = file_get_contents($url);
		$d = json_decode($get_url);
		$data = $d->data;
		foreach ($data as $d) {
			if ($d->kode_kota == $cityId) {
				echo json_encode($d->kota);
			}
		}
		// echo json_encode($data[0]->kota);
	}
	
	public function booking($id){
		$data['room'] = $this->hero->getRoomDetail($id);
		$data['hotel'] = $this->hero->getDetail($data['room']->id_hotel);
		$this->load->view('payment', $data);
	}

	public function invoice($id){
		$data['details'] = $this->hero->bookingDetails($id);
		$this->view->getDefault($data, 'invoice');
	}

	public function paymentSuccess(){
		redirect(base_url('/'));
	}
}
