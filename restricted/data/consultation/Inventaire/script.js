$(document).ready(function() {
    $("#categorieID").change(function(){
        var categorieID = $(this).val();
        if(categorieID == ""){
          $("#result").html("veuillez choisir un type");
        }else{
              $.ajax({
                url:"fetch_data.php",
                method:"GET",
                data:{categorie:categorieID},
                dataType:"text",
                success:function(data)
              {
                $("#result").html(data);

              }
            });
        }
      });
  });
  $(document).ready(function() {
      $("#exercice").change(function(){
          var exercice = $(this).val();
          if(exercice == ""){
            $("#result1").html("");
          }else{
                $.ajax({
                  url:"exercice.php",
                  method:"GET",
                  data:{year:exercice},
                  dataType:"text",
                  success:function(data)
                {
                  $("#result1").html(data);

                }
              });
          }
        });
    });
