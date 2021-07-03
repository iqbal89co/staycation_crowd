<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero_model extends CI_Model
{
	public function getCity()
	{
		$query = "SELECT * FROM kota";
		return $this->db->query($query)->result_array();
	}
	public function getPopularHotel()
	{
		$query = "SELECT hotel_pictures.name AS picture, hotel.name, hotel.stars, kota.nama_kota,
		nearest_hospital_distance
		FROM hotel
		JOIN hotel_pictures ON hotel.id_hotel=hotel_pictures.id_hotel
		JOIN kota ON kota.id_kota=hotel.city_id
		LIMIT 6";
		return $this->db->query($query)->result_array();
	}

	public function searchHotel($city, $checkIn, $checkOut, $capacity)
	{
		$query = "";
	}
}
