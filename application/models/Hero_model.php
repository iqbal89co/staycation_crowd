<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero_model extends CI_Model
{
	public function getCity()
	{
		$query = "SELECT * FROM kota";
		return $this->db->query($query)->result_array();
	}
}
