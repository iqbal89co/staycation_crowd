<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HotelModel extends CI_Model{
  public function addHotel($data){
    $this->db->insert('hotel', $data);
  }

  public function editHotel($id, $data){
    $this->db->set($data)->where('id_hotel', $id)->update('hotel');
  }

  public function deleteHotel($id){
    $this->db->where('id_hotel', $id)->delete('hotel');
  }

  public function addPictures($data){
    $this->db->insert_batch('hotel_pictures', $data);
  }

  public function getPictures($ids){
    return $this->db->select('name')->from('hotel_pictures')->where_in('id_picture', $ids)
      ->get()->result();
  }

  public function removePictures($ids){
    $this->db->where_in('id_picture', $ids)->delete('hotel_pictures');
  }
}

?>