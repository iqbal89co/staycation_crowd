<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
  /**
   * Check if given password of a user is correct
   * @param    string   $email      Email of user
   * @return   int                  User id
  */
  public function idUser($email){
    return $this->db->select('id_user')->from('user')->where('email', $email)->limit(1)
      ->get()->row()->id_user;
  }

  /**
   * Check if given password of a user is correct
   * @param    string   $email      Email of user
   * @return   int                  User id
  */
  public function userLevel($id){
    return $this->db->select('level')->from('user')->where('id_user', $id)->limit(1)
      ->get()->row()->level;
  }
}

?>