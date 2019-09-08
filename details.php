<?php 
  $id = $_GET["id"];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $table = 'posts';

  try {
     $conn = new PDO("mysql:host=$servername;dbname=myblog", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // Select Statement
     $stmt = $conn->prepare('SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at 
                 FROM ' . $table . ' p 
                     LEFT JOIN 
                         categories c ON p.category_id = c.id 
                     WHERE 
                         p.id = ? 
                     LIMIT 0,1');

     // Bind ID
     $stmt->bindParam(1, $id);
     // Execute query
     $stmt->execute();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
       // Set properties
       $title = $row['title'];
       $body = $row['body'];
       $author = $row['author'];
       $category_id = $row['category_id'];
       $category_name = $row['category_name'];
       $created_at = $row['created_at'];
?>
<?php require_once './inc/header.php'; ?>
    <div class="container">
      <div class="left">
        <div id="posts"><br>
          <small>Tag: <em><?php echo $category_name; ?></em></small>
          <h1><?php echo $title; ?></h1><br>
          <div class="down">
            <span class="lft"><strong>Author: </strong><?php echo $author; ?></span>
            <span class="rgt"><strong>Date: </strong><?php echo $created_at; ?></span>
          </div><br><br>
          <div class="clr"></div>
          <p><?php echo $body; ?></p><br><br>
          <div class="down2">
            <span class="lft"><strong><a href="./updatePost.php?id=<?php echo $id; ?>"> EDIT </a></strong></span>
            <span class="rgt"><strong><a onclick="myFunction(this.id)" id='<?php echo $id; ?>'> DELETE </a></strong></span></div>
          </div>
          <div class="clr"></div>
        </div>

      <div class="right">
        <h2>Categories</h2> 
        <div id="categ"></div>
        <button style="width: 100%;"><a href="addCategory.php"> Add Category </a></button>
      </div>
      <div class="clr"></div>
    </div>
    <?php require_once './inc/footer.php'; ?>
  </body>
</html>
<?php
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
?>