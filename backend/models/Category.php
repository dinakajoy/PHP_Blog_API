<?php
  class Category extends DBConnection {
    private $table = 'categories';

    // Get categories
    public function getCategories() {
      $query = 'SELECT
        id,
        name,
        created_at
      FROM
        ' . $this->table . '
      ORDER BY
        created_at DESC';
      $stmt = $this->connectToDB()->prepare($query);
      if($stmt->execute()) {
        return $stmt;
      }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Get Single Category
  public function getCategory($id) {
    $query = 'SELECT
          id,
          name
        FROM
          ' . $this->table . '
      WHERE id = ?
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

  // Create Category
  public function createCategory($name) {
    $query = 'INSERT INTO ' .
      $this->table . '(name)
      VALUES (:name)';
    $stmt = $this->connectToDB()->prepare($query);
    $validated_name = htmlspecialchars(strip_tags($name));
    $stmt-> bindParam(':name', $validated_name);
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
  }

  // Update Category
  public function updateCategory($name, $id) {
    $query = 'UPDATE ' .
        $this->table . '
      SET
        name = :name
        WHERE
        id = :id';
    $stmt = $this->connectToDB()->prepare($query);
    $validated_name = htmlspecialchars(strip_tags($name));
    $validated_id = htmlspecialchars(strip_tags($id));
    $stmt-> bindParam(':name', $validated_name);
    $stmt-> bindParam(':id', $validated_id);
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
  }

  // Delete Category
  public function deleteCategory($id) {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    $stmt = $this->connectToDB()->prepare($query);
    $validated_id = htmlspecialchars(strip_tags($id));
    $stmt-> bindParam(':id', $validated_id);
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
    }
  }
