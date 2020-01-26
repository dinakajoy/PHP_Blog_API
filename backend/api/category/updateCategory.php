<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  $category = new Category();

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $id = isset($_GET['id']) ? $_GET['id'] : die();
  $name = $data->name;

  // Update post
  if($category->updateCategory($name, $id)) {
    echo json_encode(
      array('message' => 'Category Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Category not updated')
    );
  }
