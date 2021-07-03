<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
  /**
   * Put user details to user table
   * @param    array   $data    Associative array that contains { field: value }
   * @return   void
  */
  public function registerUser($data){
    $this->db->insert('user', $data);
  }

  /**
   * Check if an email is registered in user table
   * @param    string   $email    User email to be checked
   * @return   bool               Returns FALSE if email is not found, TRUE otherwise
  */
  public function emailExists($email){
    // Required to anticipate unexpected behavior in CodeIgniter3 form_validation
    if(strlen($email) == 0){
      return TRUE;
    }
    $result = $this->db->select('email')->from('user')->where('email', $email)->limit(1)
      ->get()->row()?->email;
    return !!$result;
  }
  
  /**
   * Check if given password of a user is correct
   * @param    string   $id         User id to get saved user password in database
   * @param    string   $password   Given password to be verified
   * @return   bool                 Returns FALSE if password verification failed
  */
  public function passwordIsCorrect($id, $password){
    $userPassword = $this->db->select("password")->from("user")
      ->where("id_user", $id)->get()->row()?->password;
    return password_verify($password, $userPassword);
  }
}

?>