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
	public function getSafestHotel()
	{
		$query = "SELECT hotel.id_hotel, hotel_pictures.name AS picture, hotel.name, hotel.stars, v_kota.nama_kota,
		nearest_hospital_distance, resiko
		FROM hotel
		JOIN hotel_pictures ON hotel.main_picture=hotel_pictures.id_picture
		JOIN v_kota ON v_kota.id_kota=hotel.city_id
		ORDER BY v_kota.resiko ASC, nearest_rsia ASC, nearest_hospital_distance ASC
		LIMIT 6";
		return $this->db->query($query)->result_array();
	}

	public function searchHotel($city)
	{
		$query = "SELECT hotel_pictures.name AS picture, hotel.id_hotel, hotel.name, hotel.stars,
		nearest_hospital_distance, nearest_rsia, v_kota.nama_kota, v_kota.resiko
		FROM hotel
		JOIN hotel_pictures ON hotel.main_picture=hotel_pictures.id_picture
		JOIN v_kota ON v_kota.id_kota=hotel.city_id
		WHERE hotel.city_id=$city
		ORDER BY v_kota.resiko ASC, nearest_rsia ASC, nearest_hospital_distance ASC";
		return $this->db->query($query)->result_array();
	}
	public function getDetail($id)
	{
		$query = "SELECT *
		FROM hotel
		WHERE hotel.id_hotel=$id";
		return $this->db->query($query)->row_array();
	}
	public function getRooms($id)
	{
		$query = "SELECT hotel_rooms.id_room, hotel_rooms.id_hotel, hotel_rooms.name, 
		hotel_type.type, hotel_rooms.beds, hotel_rooms.capacity, hotel_rooms.size, 
		hotel_rooms.price, hotel_pictures.name AS picture 
		FROM hotel_rooms
		JOIN hotel_type ON hotel_rooms.type=hotel_type.id_type
		JOIN hotel_pictures ON hotel_pictures.id_picture=hotel_rooms.id_picture
		WHERE hotel_rooms.id_hotel=$id";
		return $this->db->query($query)->result_array();
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
