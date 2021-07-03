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
		$data['title'] = "slipAway - Your StayCation Solution !";
		$data['city'] = $this->hero->getCity();
		$this->view->getDefault($data, 'hero');
	}
}
