<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

    public function invoice() {
        $data['title'] = "BabyMoon - Login";
        $this->view->getDefault($data, 'invoice');
    }
}
