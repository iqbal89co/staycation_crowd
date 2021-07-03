<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model("AuthModel", "authModel");
    $this->load->model("UserModel", "userModel");
  }

  public function registerPage(){
    if($this->session->userdata('user') !== NULL){
      redirect(base_url());
    }
    $this->load->view('auth/register');
  }

  public function loginPage(){
    if($this->session->userdata('user') !== NULL){
      redirect(base_url());
    }
    $this->load->view('auth/login');
  }

  /*
    POST BODY: {
      username: new username,
      email: new email,
      password: plain text password,
      confirm password: identical with given password
    }
  */
  public function doRegister(){
    // Validate registration
    $validation = [
      [
        'field' => 'username',
        'label' => 'username',
        'rules' => 'required|max_length[64]',
        'errors' => [
          'required' => 'Please provide a username',
          'max_length' => 'Maximum length for a username is 64 characters'
        ]
      ],[
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|is_unique[user.email]',
        'errors' => [
          'required' => 'Please provide an email',
          'valid_email' => 'Invalid email. (Correct format: your_email@example.com)',
          'is_unique' => 'Email is already registered'
        ]
      ],[
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => 'Please provide a password'
        ]
      ],[
        'field' => 'confPassword',
        'label' => 'Confirm Password',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Please confirm your password',
          'matches' => 'Password mis-match'
        ]
      ]
    ];
    $this->form_validation->set_rules($validation);
    // Respond with error list if validation fails
    if($this->form_validation->run() === FALSE){
      echo json_encode($this->form_validation->error_array());
      return;
    }
    // Store data in database
    $data = [
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_ARGON2ID),
      'level' => 2
    ];
    $this->authModel->registerUser($data);
  }

  public function doLogin(){
    // Validate login
    $this->form_validation->set_rules('email', 'Email', [
      'required',
      ['email_exists', [$this->authModel, 'emailExists']]
    ],[
      'required' => 'Please provide your registered email',
      'email_exists' => 'Email not found'
    ]);
    $this->form_validation->set_rules('password', 'password', [
      'required',
    ], [
      'required' => 'Please provide your account password'
    ]);
    $this->form_validation->run();
    $errors = $this->form_validation->error_array();
    $id = null;
    if(!isset($errors['email'])){
      $id = $this->userModel->idUser($this->input->post('email'));
      if(!$this->authModel->passwordIsCorrect($id, $this->input->post('password'))){
        $errors['password'] = "Incorrect password";
      }
    }
    if(count($errors) > 0){
      echo json_encode($errors);
      return;
    }
    $userdata = [
      'id_user' => $this->userModel->idUser($this->input->post('email')),
      'level' => $this->userModel->userLevel($id)
    ];
    $this->session->set_userdata('user', $userdata);
    print_r($this->session->userdata('user'));
  }

  public function doLogout(){
    $this->session->unset_userdata('user');
    redirect(base_url());
  }
}

?>