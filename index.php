  <?php require_once './inc/header.php'; ?>
    <div class="container">
      <div class="left">
        <h1>Recent Post</h1>
        <div id="posts"></div>
      </div> 

      <div class="right">
        <h2>Categories</h2> 
        <div id="categ"></div>
        <button style="width: 100%;"><a href="addCategory.php"> Add Category </a></button>
      </div>
      <div class="clr"></div>
    </div>
    <?php require_once './inc/footer.php'; ?>

    <script>
      //GET REQUEST FOR ALL
      window.onload = function() { 
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
            var output = '';
            for(var i in resp) {
              let string = resp[i].body;
              if(string.length > 180) {
                string = string.substring(0,180) + "...";
              } else {
                string = resp[i].body;
              }
              output += '<div class="well">' + 
                  '<small>'+resp[i].category_name+'</small>' + 
                  '<h2><a href="details.php?id='+resp[i].id+'">' +resp[i].title+ '</a></h2>' +
                  '<p>' +string + '<a href="./details.php?id='+resp[i].id+'">... Read More</a></p>' +
                  '<div class="down"><span class="lft"><strong>Author: </strong>' +resp[i].author+ '</span><span class="rgt"><strong>Date: </strong>' +resp[i].created_at+ '</span></div><div class="clr"></div>' + 
                '</div>';
            }
            document.getElementById('posts').innerHTML = output;
          }
        }
        xhr.onerror = function() {
          console.log('Request Error');
        }
       xhr.send();     
    
        //GET REQUEST FOR ALL CATEGORIES
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
            var output2 = '';
            for(var i in resp2) {
              output2 += '<p>'+resp2[i].name+'</p>';
            }
            document.getElementById('categ').innerHTML = output2;                        
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






