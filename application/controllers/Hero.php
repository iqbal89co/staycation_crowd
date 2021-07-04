<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hero_model', 'hero');
	}
	public function index()
	{
		$data['title'] = "BabyMoon - Your StayCation Solution !";
		$data['city'] = $this->hero->getCity();
		$data['popularHotel'] = $this->hero->getPopularHotel();
		$this->view->getDefault($data, 'hero');
	}
	public function listHotel()
	{
		$data['title'] = "BabyMoon - Hotels";
		$data['city'] = $this->hero->getCity();
		$data['cityNow'] = $this->hero->getCityById($this->input->post('city'));
		$data['jlhIbuHamil'] = $this->input->post('jlhIbuHamil');
		$data['jlhDewasa'] = $this->input->post('jlhDewasa');
		$data['jlhAnak'] = $this->input->post('jlhAnak');
		$capacity = $this->input->post('jlhIbuHamil') + $this->input->post('jlhDewasa') + $this->input->post('jlhAnak');
		$data['listHotel'] = $this->hero->searchHotel($this->input->post('city'), $capacity);
		$data['date1'] = $this->input->post('checkIn');
		$data['date2'] = $this->input->post('checkOut');
		$date1 = strtotime($this->input->post('checkIn'));
		$date2 = strtotime($this->input->post('checkOut'));
		$days = ($date2 - $date1) / 86400;
		$this->view->getDefault($data, 'listHotel');
	}
	public function detail($id)
	{
		// if ($this->hero->checkHotel($id)) {
		$data['title'] = "BabyMoon - Hotels";
		$data['detail'] = $this->hero->getDetail($id);
		$data['gambar'] = $this->hero->getPicture($id);
		$this->view->getDefault($data, 'detailHotel');
		// } else {
		// 	redirect('hero');
		// }
	}
}
