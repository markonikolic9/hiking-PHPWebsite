$(document).ready(function(){
    $('#btnPosalji').click(function(){
    

        //alert("dadasdasdasd");

        var ime = $('#tbIme').val();
        var prezime = $('#tbPrezime').val();
        var email = $('#tbEmail').val();
        var password = $('#tbPassword').val();
        var nizGreske = [];


       var regIme = /^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/;
       if(!regIme.test(ime)){
            $('#tbIme').css('border-color', "red");
            nizGreske.push(ime);
       } else {
            $('#tbIme').css('border-color', "green");
       }

       var regPrezime = /^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/;
       if(!regPrezime.test(prezime)){
            $('#tbPrezime').css('border-color', "red");
            nizGreske.push(prezime);
       } else {
            $('#tbPrezime').css('border-color', "green");
       }


       var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       if(!regEmail.test(email)){
            $('#tbEmail').css('border-color', "red");
            nizGreske.push(email);
       } else {
            $('#tbEmail').css('border-color', "green");
       }


       var regSifra = /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/;
       if(!regSifra.test(password)){
           $('#tbPassword').css('border-color', "red");
           nizGreske.push(password);
       } else {
        $('#tbPassword').css('border-color', "green");
       }


       if(nizGreske==0){
           $.ajax({
                url:'models/obradaRegistracije.php',
                method:'POST',
                data:{
                    ime: ime,
                    prezime: prezime,
                    email: email,
                    pass: password,
                    btn: true
                },
                success: function(){
                    alert("Uspesno ste se registrovali!");
                    window.location="index.php?page=logovanje";
                },
                error: function(xhr, status, error){
                    if(xhr.status == 400){ alert ("Vec postoji korisnik sa tim email-om!");}
                }
           });
       } else {

       }

    
    
    });
});