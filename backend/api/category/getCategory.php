<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  $category = new Category();

  // Get ID
  $id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $category = $category->getCategory($id);
  if($category) {
    $category_arr = array(
      'id' => $category->id,
      'name' => $category->name
    );
  } else {
    $category_arr = array(
      "status" => false,
      "message" => "Invalid Category Identifier!"
    );
  }
// make it json format
print_r(json_encode($category_arr));