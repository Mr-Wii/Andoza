$(document).ready(function() {
    $("#categorieID").change(function(){
        var categorieID = $(this).val();
        if(categorieID == ""){
          $("#result").html("veuillez choisir un type");
        }else{
              $.ajax({
                url:"fetch_data.php?date=<?= $date; ?>",
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
