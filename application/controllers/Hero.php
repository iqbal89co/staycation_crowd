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
	}
}
