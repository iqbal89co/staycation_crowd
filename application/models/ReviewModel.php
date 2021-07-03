<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewModel extends CI_Model{
  /**
   * Add a review to database
   * @param    string   $email      Email of user
   * @return   int                  User id
  */
  public function addReview($idUser, $idHotel, $rating, $review){
    $this->db->insert('review', [
      "id_user" => $idUser,
      "id_hotel" => $idHotel,
      "rating" => $rating,
      "review" => $review
    ]);
  }

  public function reviewList($idHotel){
    return $this->db->select('rating, review, username')->from('review')
      ->join('user', 'review.id_user = user.id_user')
      ->where('review.id_hotel', $idHotel)->get()->result();
  }
}

?>