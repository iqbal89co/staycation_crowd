<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model("ReviewModel", "reviewModel");
  }

  public function experimentalSendReviewForm($id){
    $url = base_url('Review/addReview/1');
    echo "
      <form action=\"$url\" method=\"POST\">
        <label>Rating</label><br />
        <input type=\"number\" name=\"rating\" min=\"0\" max=\"5\" /><br />
        <label>Review</label><br />
        <textarea name=\"review\"></textarea>
      </form>
    ";
  }

  public function addReview($idHotel){
    // Validate input
    $config = [
      [
        'field' => 'rating',
        'label' => 'Rating',
        'rules' => 'required|greater_than_equal_to[0]|less_than_equal_to[5]',
        'errors' => [
          'required' => 'Please give a rating',
          'greater_than_equal_to' => 'Rate a number from 0 to 5',
          'less_than_equal_to' => 'Rate a number from 0 to 5'
        ]
      ],[
        'field' => 'review',
        'label' => 'Review',
        'rules' => 'required',
        'errors' => [
          'required' => 'Please give a review'
        ]
      ]
    ];
    $this->form_validation->set_rules($config);
    if($this->form_validation->run() === FALSE){
      echo json_encode($this->form_validation->error_array());
      return;
    }
    $this->reviewModel->addReview(
      $this->session->userdata('user')['id_user'],
      $idHotel, $this->input->post('rating'), $this->input->post('review')  
    );
  }

  public function reviewList($idHotel){
    echo json_encode($this->reviewModel->reviewList($idHotel));
  }
}

?>