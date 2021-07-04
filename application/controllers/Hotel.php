<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('HotelModel', 'hotelModel');
  }

  public function experimentalPhotoUpload($id){
    $url = base_url("/Hotel/hotelPictures/add/$id");
    echo "
      <form action=\"$url\" method=\"POST\" enctype=\"multipart/form-data\">
        <input type=\"file\" name=\"pictures[]\" multiple />
        <button type=\"submit\">Kirim</button>
      </form>
    ";
  }

  public function hotel($action, $id = null){
    if($action === 'add' || $action === 'edit'){
      // Validate data
      $config = [
        [
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required|max_length[128]',
          'errors' => [
            'required' => 'Please provide a hotel name',
            'max_length' => 'Maximum length for a hotel name is 128 characters'
          ]
        ],[
          'field' => 'rules',
          'label' => 'Rules',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide hotel rules'
          ]
        ],[
          'field' => 'stars',
          'label' => 'Stars',
          'rules' => 'required|greater_than[0]|less_than_equal_to[5]',
          'errors' => [
            'required' => 'Please provide hotel stars',
            'greater_than' => 'Only 1 to 5 star is acceptable',
            'less_than_equal_to' => 'Only 1 to 5 star is acceptable'
          ]
        ],[
          'field' => 'price',
          'label' => 'Price',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide hotel staying price'
          ]
        ],[
          'field' => 'city_location',
          'label' => 'City',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide hotel city location'
          ]
        ],[
          'field' => 'address',
          'label' => 'Address',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide the hotel address'
          ]
        ],[
          'field' => 'nearest_hospital_distance',
          'label' => 'Nearest Hospital',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide the time (in minutes) required to reach the nearest hospital'
          ]
        ]
      ];
      $this->form_validation->set_rules($config);
      if($this->form_validation->run() === FALSE){
        echo json_encode($this->form_validation->error_array());
        return;
      }
      $data = [
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'rules' => $this->input->post('rules'),
        'stars' => $this->input->post('stars'),
        'price' => $this->input->post('price'),
        'city_location' => $this->input->post('city_location'),
        'address' => $this->input->post('address'),
        'nearest_hospital_distance' => $this->input->post('nearest_hospital_distance')
      ];
      if($action === 'add'){
        $this->hotelModel->addHotel($data); 
      } else if($action === 'edit'){
        $this->hotelModel->editHotel($id, $data);
      }
    } else if($action === 'delete'){
      $this->hotelModel->deleteHotel($id);
    } else {
      http_response_code(404);
    }
  }

  public function hotelPictures($action, $id = null){
    if($action === 'add'){
      $config = [
        'upload_path' => './database/hotel-pictures/',
        'allowed_types' => 'gif|jpg|png|jpeg',
        'max_size' => 8192
      ];
      $data = [];
      $files = $_FILES;
      $filesCount = count($_FILES['pictures']['name']);
      $this->load->library('upload');
      for($i = 0; $i < $filesCount; $i++){
        $_FILES['pictures']['name'] = $files['pictures']['name'][$i];
        $_FILES['pictures']['type'] = $files['pictures']['type'][$i];
        $_FILES['pictures']['tmp_name']= $files['pictures']['tmp_name'][$i];
        $_FILES['pictures']['error']= $files['pictures']['error'][$i];
        $_FILES['pictures']['size']= $files['pictures']['size'][$i];
        $explodedFilename = explode('.', $_FILES['pictures']['name']);
        $filename = bin2hex(random_bytes(10)) . '.' . end($explodedFilename);
        $data[] = [
          'id_hotel' => $id,
          'name' => $filename
        ];
        $config['file_name'] = $filename;
        $this->upload->initialize($config);
        $this->upload->do_upload('pictures');
      }
      $this->hotelModel->addPictures($data);
    } else if($action === 'remove'){
      $ids = json_decode(file_get_contents('php://input'))->ids;
      $filenames = $this->hotelModel->getPictures($ids);
      $fileCount = count($filenames);
      for($i = 0; $i < $fileCount; $i++){
        $pathname = "./database/hotel-pictures/{$filenames[$i]->name}";
        if(file_exists($pathname)){
          unlink($pathname);
        }
        $this->hotelModel->removePictures($ids);
      }
    } else {
      http_response_code(404);
    }
  }

  public function hotelRooms($action, $idHotel, $id = null){
    if($action === 'add' || $action === 'edit'){
      // Validate data
      $config = [
        [
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required|max_length[128]',
          'errors' => [
            'required' => 'Please provide a name for the room',
            'max_length' => 'Maximum length for a room name is 128 characters'
          ] 
        ],[
          'field' => 'beds',
          'label' => 'Beds',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide number for beds available'
          ]
        ],[
          'field' => 'capacity',
          'label' => 'Capacity',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide number for capacity available'
          ]
        ],[
          'field' => 'size',
          'label' => 'Size',
          'rules' => 'required',
          'errors' => [
            'required' => 'Please provide number for room size'
          ]
        ]
      ];
      $this->form_validation->set_rules($config);
      $errors = $this->form_validation->error_array();

      $picture = [];
      if($action === 'add' || $_FILES['picture']['error'] !== 4){
        $explodedFilename = "";
        $filename = "";
        if($action === 'add'){
          $explodedFilename = explode('.', $_FILES['picture']['name']);
          $filename = bin2hex(random_bytes(10)) . '.' . end($explodedFilename);
        } else {
          $pictureId = $this->hotelModel->getRoomTypePictureId($id);
          $filename = $this->hotelModel->getPictures([$pictureId])[0]->name;
        }
        $upload = [
          'upload_path' => './database/hotel-pictures/',
          'allowed_types' => 'gif|jpg|png|jpeg',
          'max_size' => 8192,
          'file_name' => $filename,
          'overwrite' => $action === 'edit'
        ];
        $this->library->load('upload', $upload);
        if(!$this->upload->do_upload('picture')){
          $errors['picture'] = $this->upload->display_errors();
        }
        $picture = ['name' => $filename];
      }

      if(count($errors) > 0){
        echo json_encode($errors);
        return;
      }

      $room = [
        'id_hotel' => $idHotel,
        'name' => $this->input->post('name'),
        'beds' => $this->input->post('beds'),
        'capacity' => $this->input->post('capacity'),
        'size' => $this->input->post('size'),
        'count' => $this->input->post('count')
      ];

      if($action == 'add'){
        $this->hotelModel->addRoomType($idHotel, $room, $picture);
      }else if($action == 'edit'){
        $this->hotelModel->editRoomType($id, $idHotel, $room,);
      }
    } else if($action == 'remove'){
      $this->hotelModel->removeRoomType($id, $idHotel);
    } else {
      return http_response_code(404);
    }
  }

  public function bookRoom($id){
    $data = [
      'id_room' => $id,
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'phone_number' => $this->input->post('phone_number'),
      'check_in' => $this->input->post('check_in'),
      'check_out' => $this->input->post('check_out'),
      'pregnant_mothers' => $this->input->post('pregnant_mothers'),
      'adults' => $this->input->post('adults'),
      'children' => $this->input->post('children')
    ];
    $bookingId = $this->hotelModel->bookRoom($data);
    redirect(base_url("/Hero/invoice/$bookingId"));
  }
}

?>