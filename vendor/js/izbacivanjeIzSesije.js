$(document).ready(function() {
  $(".close1").on("click", function() {
    var id = $(this).attr("data-id");
    //console.log(id);
    $(this)
      .parent()
      .fadeOut(1000);

    $.ajax({
      url: "models/dodajUKorpu.php",
      method: "POST",

      data: {
        izbaciIzSesijeId: id,
        btnIzbaci: true
      },
      success: function(data) {
        console.log(data);
      },
      error: function(sd) {
        alert(1);
      }
    });
  });
});
