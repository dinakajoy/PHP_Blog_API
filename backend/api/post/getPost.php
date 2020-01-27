<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once '../../config/Database.php';
  require_once '../../models/Post.php';
  $post = new Post();
  $id = isset($_GET['id']) ? $_GET['id'] : die();
  $post = $post->getPost($id);
  if($post) {
    $post_arr = array(
      'id' => $post->id,
      'title' => $post->title,
      'body' => $post->body,
      'author' => $post->author,
      'category_id' => $post->category_id,
      'category_name' => $post->category_name,
      'created_at' => $post->created_at
    );
  } else {
    $post_arr = array(
      "status" => false,
      "message" => "Invalid Post Identifier!"
    );
  }
// make it json format
print_r(json_encode($post_arr));