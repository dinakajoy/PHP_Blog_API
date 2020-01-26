<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';
  $post = new Post();

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  $id = isset($_GET['id']) ? $_GET['id'] : die();
  $title = $data->title;
  $body = $data->body;
  $author = $data->author;
  $category_id = $data->category_id;

  // Update post
  if($post->updatePost($category_id, $title, $body, $author, $id)) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }