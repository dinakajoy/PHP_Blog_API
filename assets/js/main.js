//FORM POST REQUEST For BLOG POST
    $(document).ready(function() {
        $("#apiform").submit(function(e) {
            e.preventDefault();
            $.ajax( {
                url: "http://localhost:5000/api/post/createP.php",
                method: "POST",
                data: $("form").serialize(),
                dataType: "text",
                success: function() {
                    alert("Successfully Added");
                    $("#apiform")[0].reset();
                    window.location.reload(true);
                }
            });
        });
    });

//FORM POST REQUEST FOR CATEGORY
    $(document).ready(function() {
        $("#apiformC").submit(function(e) {
            e.preventDefault();
            $.ajax( {
                url: "http://localhost:5000/api/category/createC.php",
                method: "POST",
                data: $("form").serialize(),
                dataType: "text",
                success: function() {
                    alert("Successfully Added");
                    $("#apiformC")[0].reset();
                    window.location.reload(true);
                }
            });
        });
    });

    //GET REQUEST FOR ALL CATEGORIES
    window.onload = function(){   
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

// DELETE REQUEST FOR POST
    function myFunction(id) {
        if (confirm("Are You Sure You Want To Delete Me?")) {
          // DELETE REQUEST FOR POST
          let xhr3;
          if(window.XMLHttpRequest) {
            xhr3 = new XMLHttpRequest();
          } else {
            xhr3 = new ActiveXObject('Microsoft.XMLHTTP');
          }
          xhr3.open('GET', 'http://localhost:5000/api/post/delete.php?id='+id, true);
          alert("Post Has Been Deleted!");
          window.location.replace("./");
          xhr3.send(); 
        } else {
          alert("You Cancelled!");
        }
    }

// UPDATE REQUEST FOR POST
$(document).ready(function() {
    $("#apiformU").submit(function(e) {
        e.preventDefault();
        $.ajax( {
            url: "http://localhost:5000/api/post/updateP.php",
            method: "POST",
            data: $("form").serialize(),
            dataType: "text",
            success: function() {
                $('#id').val('');
                $('#title').val('');
                $('#body').val('');
                $('#author').val('');
                $('#category_id').val('');
                alert('Successfully Updated');
                // Simulate an HTTP redirect:
                window.location.replace("./");
            }
        });
    });
});
