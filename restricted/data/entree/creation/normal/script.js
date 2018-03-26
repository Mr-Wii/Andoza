$(document).ready(function() {
    $("#categorieID").change(function(){
        var categorieID = $(this).val();
        if(categorieID == ""){
          $("#result").html("veuillez choisir une catégorie");
        }else{
              $.ajax({
                url:"fetch_data.php",
                method:"GET",
                data:{categorie:categorieID},
                dataType:"text",
                success:function(data)
              {
                $("#numerohidden").val(data); 
                $("#result").html(data);

              }
            });
        }
      });
  });
