<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once '../../config/Database.php';
  $database = new Database();
  $db = $database->connect();

  require_once '../../models/Category.php';
  $category = new Category($db);
  $result = $category->getCategories();
  $num = $result->rowCount();
  if($num > 0) {
    $cat_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $cat_item = array(
        'id' => $id,
        'name' => $name
      );
      array_push($cat_arr, $cat_item);
    }
    echo json_encode($cat_arr);
  } else {
    echo json_encode(
      array('message' => 'No Categories Found')
    );
  }