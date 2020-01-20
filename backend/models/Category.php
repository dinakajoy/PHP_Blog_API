<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'categories';
    public $id;
    public $name;
    public $created_at;
    public function __construct($db) {
      $this->conn = $db;
    }

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
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    // Get Single Category
  public function getCategory() {
    $query = 'SELECT
          id,
          name
        FROM
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->id = $row['id'];
    $this->name = $row['name'];
  }

  // Create Category
  public function createCategory() {
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      name = :name';
    $stmt = $this->conn->prepare($query);
    $this->name = htmlspecialchars(strip_tags($this->name));
    $stmt-> bindParam(':name', $this->name);
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
  }

  // Update Category
  public function updateCategory() {
    $query = 'UPDATE ' .
      $this->table . '
    SET
      name = :name
      WHERE
      id = :id';
    $stmt = $this->conn->prepare($query);
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt-> bindParam(':name', $this->name);
    $stmt-> bindParam(':id', $this->id);
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
  }

  // Delete Category
  public function deleteCategory() {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt-> bindParam(':id', $this->id);
    if($stmt->execute()) {
      return true;
    }
    printf("Error: $s.\n", $stmt->error);
    return false;
    }
  }
