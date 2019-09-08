<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Set ID to update
  $id = $_GET["id"];

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name,
    'created_at' => $created_at
  );

  // Make JSON
  print_r(json_encode($post_arr));