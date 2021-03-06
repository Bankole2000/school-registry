<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');


  include_once '../../config/Database.php';
  include_once '../../models/Course.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  course object
  $course = new Course($db);
  $course->createTable();

  // Get raw courseed data
  $data = json_decode(file_get_contents("php://input"));

  // Requirements in the Body.
  $course->Name = $data->Name;
  $course->Desription = $data->Desription;
  $course->Credits = $data->Credits;
  $course->Term = $data->Term;

  // Create Course
  if($course->create()) {
    echo json_encode(
      array('message' => 'Course Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Course Not Created')
    );
  }

?>