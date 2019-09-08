<?php require_once './inc/header.php'; ?>
    <div class="container">
      <div class="left">
        <h1>New Post</h1> 
        <p id="message" class="mess"></p>
        <form id="apiform">
          <input type="text" id="title" name="title" placeholder="Title" autocomplete="on" required><br>
          <textarea name="body" id="body" cols="30" rows="10" placeholder="Body" autocomplete="on" required></textarea><br>
          <input type="text" id="author" name="author" placeholder="Author" autocomplete="on" required><br>
          <select name="category_id" placeholder="Category Name" autocomplete="on" id="category_id" required></select><br><br>
          <button type="submit" id="postMessage"> Post </button>
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