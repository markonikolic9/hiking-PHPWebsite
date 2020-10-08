$(document).ready(function() {
  //alert();
});

function updateKorisnikForma() {
  $(".updateKorisnik").on("click", function() {
    let idK = $(this).data("id");
    $.ajax({
      url: "../php/admin-insertKorisnik.php",
      method: "POST",
      data: {
        idK: idK,
        btnForma: true
      },
      success: function(data) {
        $("#ispisForme").html(data);
        updateKorisnik();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
updateKorisnikForma();

function updateKorisnik() {
  $("#updateKorisnik1").click(function() {
    let idK = $(this).data("id");
    let ime = $("#tbIme").val();
    let prezime = $("#tbPrezime").val();
    let email = $("#tbEmail").val();
    let uloga = $("#uloga").val();

    $.ajax({
      url: "../php/admin-insertKorisnik.php",
      method: "POST",
      data: {
        idK: idK,
        ime: ime,
        prezime: prezime,
        email: email,
        uloga: uloga,
        btnUpdate: true
      },
      success: function(data) {
        $("#ispisForme").html(" ");
        $("#dataTables-example").html(data);
        obrisiKorisnika();
        updateKorisnikForma();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}

function obrisiKorisnika() {
  $(".obrisiKorisnik").on("click", function() {
    let idK = $(this).data("id");
    $.ajax({
      url: "../php/admin-insertKorisnik.php",
      method: "POST",
      data: {
        idK: idK,
        btnObrisi: true
      },
      success: function(data) {
        $("#dataTables-example").html(data);
        obrisiKorisnika();
        updateKorisnikForma();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
obrisiKorisnika();

function insertUloga() {
  $("#insertUloga").on("click", function() {
    let naziv = $("#tbUloga").val();

    $.ajax({
      url: "../php/admin-insertUloga.php",
      method: "POST",
      data: {
        uloga: naziv,
        btnInsertUloga: true
      },
      success: function(data) {
        $("#tbUloga").val(" ");
        $("ispisUloga").html("Dodali ste novu ulogu!");
        $("#dataTables-example").html(data);
        obrisiUlogu();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
insertUloga();

function obrisiUlogu() {
  $(".obrisiUlogu").on("click", function() {
    let idU = $(this).data("id");

    $.ajax({
      url: "../php/admin-insertUloga.php",
      method: "POST",
      data: {
        idU: idU,
        btnObrisiUlogu: true
      },
      success: function(data) {
        $("#dataTables-example").html(data);
        obrisiUlogu();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
obrisiUlogu();

function updateProizvod() {
  $(".updateProizvod").on("click", function() {
    let idP = $(this).data("id");

    $.ajax({
      url: "../php/admin-insertProizvod.php",
      method: "POST",
      data: {
        idP: idP,
        btnUpdateProizvod: true
      },
      success: function(data) {
        $("#noviProizvod").html(data);
        $("#naslov").html("Update");
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
updateProizvod();

function obrisiProizvod() {
  $(".obrisiProizvod").on("click", function() {
    let idP = $(this).data("id");
    $.ajax({
      url: "../php/admin-insertProizvod.php",
      method: "POST",
      data: {
        idP: idP,
        btnObrisiProizvod: true
      },
      success: function(data) {
        $("#dataTables-example").html(data);
        obrisiProizvod();
        updateProizvod();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
obrisiProizvod();

function insertBrend() {
  $("#brendInsert").on("click", function() {
    let naziv = $("#tNaziv").val();

    $.ajax({
      url: "../php/admin-insertBrend.php",
      method: "POST",
      data: {
        naziv: naziv,
        btnInsertBrend: true
      },
      success: function(data) {
        $("#tNaziv").val(" ");
        $("#insertBrend").html("Dodali ste novi brend.");
        $("#dataTables-example").html(data);
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
insertBrend();

function obrisiBrend() {
  $(".obrisiBrend").on("click", function() {
    let idB = $(this).data("id");

    $.ajax({
      url: "../php/admin-insertBrend.php",
      method: "POST",
      data: {
        idB: idB,
        btnObrisiBrend: true
      },
      success: function(data) {
        $("#dataTables-example").html(data);
        obrisiBrend();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
obrisiBrend();

function insertKategorija() {
  $("#kategorijaInsert").on("click", function() {
    let naziv = $("#tbNazivKat").val();

    $.ajax({
      url: "../php/admin-insertKategorija.php",
      method: "POST",
      data: {
        naziv: naziv,
        btnInsertKategorija: true
      },
      success: function(data) {
        $("#tbNazivKat").val(" ");
        $("#insertKategorija").html("Dodali ste novu kategoriju");
        $("#dataTables-example").html(data);
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
insertKategorija();

function obrisiKategoriju() {
  $(".obrisiKategorija").on("click", function() {
    let idKa = $(this).data("id");

    $.ajax({
      url: "../php/admin-insertKategorija.php",
      method: "POST",
      data: {
        idKa: idKa,
        btnObrisiKategoriju: true
      },
      success: function(data) {
        $("#dataTables-example").html(data);
        obrisiKategoriju();
      },
      error: function(xhr, status, error) {
        console.log(xhr.status);
      }
    });
  });
}
obrisiKategoriju();
