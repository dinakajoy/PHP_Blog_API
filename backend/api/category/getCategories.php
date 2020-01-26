<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once '../../config/Database.php';
  require_once '../../models/Category.php';
  $category = new Category();
  $result = $category->getCategories();
  $num = $result->rowCount();
  if($num > 0) {
    $categories_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $category_item = array(
        'id' => $id,
        'name' => $name
      );
      array_push($categories_arr, $category_item);
    }
    echo json_encode($categories_arr);
  } else {
    echo json_encode(
      array('message' => 'No Category Found')
    );
  }