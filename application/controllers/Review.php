<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model("ReviewModel", "reviewModel");
  }

  public function addReview($idHotel){
    // Validate input
    $config = [
      [
        'field' => 'rater',
        'label' => 'Rater',
        'rules' => 'required',
        'errors' => [
          'required' => 'Please provide your a name'
        ]
      ],[
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
    $data = [
      'rater' => $this->input->post('rater'),
      'rating' => $this->input->post('rating'),
      'review' => $this->input->post('review')
    ];
    $this->reviewModel->addReview($idHotel, $data);
    redirect(base_url("/hero/detail/$idHotel"));
  }
}
