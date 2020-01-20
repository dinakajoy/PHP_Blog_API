<?php require_once './inc/header.php'; ?>
    <div class="container">
      <div class="left">
      <br><br>
        <h1>New Category</h1> 
        <p id="message" class="mess"></p>
        <form id="apiformC">
          <input type="text" name="name" placeholder="Category Title" autocomplete="on" required><br><br>
          <button type="submit" id="postCat"> Add Category </button><br><br>
        </form>
      </div> 

      <div class="right">
        <h1>Categories</h1> 
        <div id="categ"></div>
      </div>
      <div class="clr"></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php require_once './inc/footer.php'; ?>
    <script>
    
    </script>
  </body>
</html>