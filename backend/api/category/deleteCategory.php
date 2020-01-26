<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  $category = new Category();
  $id = isset($_GET['id']) ? $_GET['id'] : die();

  // Delete post
  if($category->deleteCategory($id)) {
    echo json_encode(
      array('message' => 'Category deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Category not deleted')
    );
  }