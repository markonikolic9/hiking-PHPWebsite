$(document).ready(function() {
  $("#btnKupi").click(function() {
     // alert();
    var ime = $("#tIme").val();
    var prezime = $("#tPrezime").val();
    var adresa = $("#tbAdresa").val();
    var brojTelefona = $("#tbTelefon").val();

    var greske = [];

    var regIme = /^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/;
    if (!regIme.test(ime)) {
      $("#tIme").css("border-color", "red");
      greske.push(ime);
    } else {
      $("#tIme").css("border-color", "green");
    }

    var regPrezime = /^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/;
    if (!regPrezime.test(prezime)) {
      $("#tPrezime").css("border-color", "red");
      greske.push(prezime);
    } else {
      $("#tPrezime").css("border-color", "green");
    }

    var regBrojTelefona = /^06[0-9]{1}[0-9]{6}([0-9]{1})?$/;
    if (!regBrojTelefona.test(brojTelefona)) {
      $("#tbTelefon").css("border-color", "red");
      greske.push(brojTelefona);
    } else {
      $("#tbTelefon").css("border-color", "green");
    }

    var regAdresa = /^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/;
    if (!regAdresa.test(adresa)) {
      $("#tbAdresa").css("border-color", "red");
      greske.push(adresa);
    } else {
      $("#tbAdresa").css("border-color", "green");
    }

    if (greske == 0) {
      $.ajax({
        url: "models/obradaKupovina.php",
        method: "POST",
        data: {
          ime: ime,
          prezime: prezime,
          adresa: adresa,
          brojTelefona: brojTelefona,
          btn: true
        },
        success: function(data) {
          $("#poruka").html(data);
          //alert("Uspesno ste obavili kupovinu!");
          //window.location = "index.php";
        },
        error: function(xhr, status, error) {
          if (xhr.status == 400) {
            alert("Vasa kupovina nije realizovana!");
          }
        }
      });
    } else {
    }
  });
});
