$(document).ready(function() {
  $(".dodajUKorpu").click(function(e) {
    e.preventDefault();
    var data = $(this).data("id");
    var idP = data;

    $.ajax({
      url: "models/dodajUKorpu.php",
      method: "POST",
      data: {
        idP: idP,
        btn: true
      },
      success: function(data) {
        console.log(data);
        //alert(data);
        $(".dodajUKorpu").html("Ubačeno u korpu");
        $(".dodajUKorpu").attr("disabled", true);
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
});
