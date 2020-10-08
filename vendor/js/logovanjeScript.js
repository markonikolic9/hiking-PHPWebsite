$(document).ready(function(){
   $('#btnLog').click(function(){

    var email = $('#tbEmail').val();
    var password = $('#tbPassword').val();

    var nizGreske = [];

    var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!regEmail.test(email)){
        $('#tbEmail').css('border-color', "red");
        nizGreske.push(email);
    } else {
        $('#tbEmail').css('border-color', "green");
    }

    var regPass = /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/;
    if(!regPass.test(password)){
        $('#tbPassword').css('border-color', "red");
        nizGreske.push(password);
    } else {
        $('#tbPassword').css('border-color', "green");
    }

    if(nizGreske==0){
        $.ajax({
            url:'models/obradaLogovanje.php',
            method:'POST',
            data:{
                email: email,
                pass: password,
                btn:true
            },
            success:function(podaci)
            {
                 window.location='index.php';
            },
            error: function(xhr, status, error){
                console.log(status);
            }
        });
    } else {

    }
   }); 
});