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
        <h1>New Post</h1> 
        <p id="message" class="mess"></p>
        <form id="apiformU">
          <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"><br>
          <input type="text" id="title" name="title" placeholder="Title" autocomplete="on" required value="<?php echo $title; ?>"><br>
          <textarea name="body" id="body" cols="30" rows="10" placeholder="Body" autocomplete="on" required><?php echo $body; ?></textarea><br>
          <input type="text" id="author" name="author" placeholder="Author" autocomplete="on" required value="<?php echo $author; ?>"><br>
          <select name="category_id" placeholder="Category Name" autocomplete="on" id="category_id" required></select><br><br>
          <button type="submit" id="UpdateMessage"> Update Post </button>
        </form>
      </div> 

      <div class="right">
        <h1>Recently Added Posts</h1> 
        <div id="postLists"></div>
      </div>
      <div class="clr"></div>
    </div>
    <?php require_once './inc/footer.php'; ?>
    <script>
    window.onload = function(){ 
        //GET REQUEST FOR ALL POSTS TITLE
        let xhr;
        if(window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', 'http://localhost:5000/api/post/read.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                let resp = JSON.parse(this.responseText);
                var postList = '';
                for(var j in resp) {
                    postList += '<p>' +resp[j].title+ '</p>';
                }
                document.getElementById('postLists').innerHTML = postList;
            }
        }
        xhr.onerror = function() {
            console.log('Request Error');
        }
       xhr.send(); 

       //GET REQUEST FOR ALL CATEGORIES NAME
       let xhr2;
        if(window.XMLHttpRequest) {
            xhr2 = new XMLHttpRequest();
        } else {
            xhr2 = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr2.open('GET', 'http://localhost:5000/api/category/read.php', true);
        xhr2.onload = function() {
            if (this.status === 200) {
                let resp2 = JSON.parse(this.responseText);
                var output2 = '<option value="">Select Category</option>';
                for(var i in resp2) {
                    output2 += '<option value="'+resp2[i].id+'">'+resp2[i].name+'</option>'
                }
                document.getElementById('category_id').innerHTML = output2;                        
            }
        }
        xhr2.onerror = function() {
            console.log('Request Error');
        }
        xhr2.send();
    }
    </script>
  </body>
</html>

<?php
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
?>