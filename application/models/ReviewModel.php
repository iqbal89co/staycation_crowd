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
  public function addReview($idHotel, $data){
    $data['id_hotel'] = $idHotel;
    $this->db->insert('review', $data);
  }

  /**
   * Add a review to database
   * @param    int      $idHotel     Hotel that has reviews
   * @return   array                 Array of reviews
  */
  public function reviewList($idHotel){
    return [
      'data' => $this->db->select('rating, review, rater, time')->from('review')
        ->where('review.id_hotel', $idHotel)->get()->result(),
      'count' => $this->db->select('COUNT(id_hotel) total')->from('review')
        ->where('review.id_hotel', $idHotel)->get()->row()->total
    ];
  }
}
