<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero_model extends CI_Model
{
	public function getCity()
	{
		$query = "SELECT * FROM kota";
		return $this->db->query($query)->result_array();
	}
	public function getCityById($city)
	{
		$query = "SELECT id_kota, nama_kota FROM kota
		WHERE id_kota=$city";
		return $this->db->query($query)->row_array();
	}
	public function getPopularHotel()
	{
		$query = "SELECT hotel_pictures.name AS picture, hotel.name, hotel.stars, kota.nama_kota,
		nearest_hospital_distance
		FROM hotel
		JOIN hotel_pictures ON hotel.main_picture=hotel_pictures.id_picture
		JOIN kota ON kota.id_kota=hotel.city_id
		LIMIT 6";
		return $this->db->query($query)->result_array();
	}

	public function searchHotel($city, $capacity)
	{
		$query = "SELECT hotel_pictures.name AS picture, hotel.id_hotel, hotel.name, hotel.stars,
		nearest_hospital_distance
		FROM hotel
		JOIN hotel_pictures ON hotel.main_picture=hotel_pictures.id_picture
		WHERE hotel.city_id=$city";
		return $this->db->query($query)->result_array();
	}
	public function getDetail($id)
	{
		$query = "SELECT hotel.*,
		kota.nama_kota
		FROM hotel
		JOIN kota ON kota.nama_kota=hotel.city_id
		WHERE hotel.id_hotel=$id";
		return $this->db->query($query)->row_array();
	}
	public function checkHotel($id)
	{
		$query = "SELECT hotel.name FROM hotel WHERE id_hotel=$id";
		if ($this->db->query($query)->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function getPicture($id)
	{
		$query = "SELECT * FROM hotel_pictures
		WHERE id_hotel=$id";
		return $this->db->query($query)->result_array();
	}
}
