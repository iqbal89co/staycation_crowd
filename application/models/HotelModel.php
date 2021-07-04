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

  public function getRoomTypePictureId($id){
    return $this->db->select('id')->from('hotel_rooms')->where('id_room', $id)
      ->get()->row()->id;
  }

  public function addRoomType($id, $room, $picture){
    $this->db->trans_start();
    $this->db->insert('hotel_pictures', $picture);
    $room['id_hotel'] = $id;
    $room['id_picture'] = $this->db->insert_id();
    $this->db->insert('hotel_rooms', $room);
    $this->db->trans_commit();
  }

  public function editRoomType($id, $idHotel, $room){
    $this->db->set($room)->where(['id_room' => $id, 'id_hotel' => $idHotel])
      ->update('hotel_rooms');
  }

  public function removeRoomType($id, $idHotel){
    $this->db->where(['id_room' => $id, 'id_hotel' => $idHotel])->delete('hotel_rooms');
  }

  public function bookRoom($data){
    $this->db->insert('booking', $data);
  }
}

?>