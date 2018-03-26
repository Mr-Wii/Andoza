$('[name="exercice"]').change(function() {
  $(this).closest('form').submit();
});
