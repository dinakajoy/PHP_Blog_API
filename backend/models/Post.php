<?php
  class Post extends DBConnection {
    private $table = 'posts';

    // Get Posts
    public function getPosts() {
      $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at 
        FROM ' . $this->table . ' p 
        LEFT JOIN 
          categories c ON p.category_id = c.id 
        ORDER BY 
          p.created_at DESC';
      $stmt = $this->connectToDB()->prepare($query);
      if($stmt->execute()) {
        return $stmt;
      }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Get Single Post
    public function getPost($id) {
      $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at 
        FROM ' . $this->table . ' p 
        LEFT JOIN 
          categories c ON p.category_id = c.id 
        WHERE 
          p.id = ? 
        LIMIT 0,1';
      $stmt = $this->connectToDB()->prepare($query);
      $stmt->bindParam(1, $id);
      if($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
      }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Create Post
    public function createPost($title, $body, $author, $category_id) {
      $query = 'INSERT INTO ' . $this->table . '(category_id, title, body, author) VALUES (:category_id, :title, :body, :author)';
      $stmt = $this->connectToDB()->prepare($query);
      $validated_title = htmlspecialchars(strip_tags($title));
      $validated_body = htmlspecialchars(strip_tags($body));
      $validated_author = htmlspecialchars(strip_tags($author));
      $validated_category_id = htmlspecialchars(strip_tags($category_id));

      $stmt->bindParam(':title', $validated_title);
      $stmt->bindParam(':body', $validated_body);
      $stmt->bindParam(':author', $validated_author);
      $stmt->bindParam(':category_id', $validated_category_id);

      if($stmt->execute()) {
        return true;
      }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Update Post
    public function updatePost($category_id, $title, $body, $author, $id) {
      $query = 'UPDATE ' . $this->table . '
                SET category_id = :category_id, title = :title, body = :body, author = :author 
                WHERE id = :id';
      $stmt = $this->connectToDB()->prepare($query);

      $validated_category_id = htmlspecialchars(strip_tags($category_id));
      $validated_title = htmlspecialchars(strip_tags($title));
      $validated_body = htmlspecialchars(strip_tags($body));
      $validated_author = htmlspecialchars(strip_tags($author));    
      $validated_id = htmlspecialchars(strip_tags($id));

      $stmt->bindParam(':category_id', $validated_category_id);
      $stmt->bindParam(':title', $validated_title);
      $stmt->bindParam(':body', $validated_body);
      $stmt->bindParam(':author', $validated_author);
      $stmt->bindParam(':id', $validated_id);

      if($stmt->execute()) {
        return true;
      }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Delete Post
    public function deletePost($id) {
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
      $stmt = $this->connectToDB()->prepare($query);
      $validated_id = htmlspecialchars(strip_tags($id));
      $stmt->bindParam(':id', $validated_id);
      if($stmt->execute()) {
        return true;
      }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
  }