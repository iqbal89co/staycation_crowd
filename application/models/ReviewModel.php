<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewModel extends CI_Model{
  /**
   * Add a review to database
   * @param    int      $idUser      User that gives the review
   * @param    int      $idHotel     Hotel that receives the review
   * @param    int      $rating      Rating number
   * @param    string   $review      Review text
   * @return   void 
  */
  public function addReview($idUser, $idHotel, $rating, $review){
    $this->db->insert('review', [
      "id_user" => $idUser,
      "id_hotel" => $idHotel,
      "rating" => $rating,
      "review" => $review
    ]);
  }

  /**
   * Add a review to database
   * @param    int      $idHotel     Hotel that has reviews
   * @return   array                 Array of reviews
  */
  public function reviewList($idHotel){
    return $this->db->select('rating, review, username')->from('review')
      ->join('user', 'review.id_user = user.id_user')
      ->where('review.id_hotel', $idHotel)->get()->result();
  }
}

?>