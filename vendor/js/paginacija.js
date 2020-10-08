$('.brojStrana').on("click", function(){
    //alert("Radi");
    var id= $(this).attr("id");
    var kategorija = $(this).attr("data-id");
    
    prikaz(id, kategorija);
    
});

function prikaz(id, kategorija){
    $.ajax({
        url:'models/stranicenje.php',
        type: 'POST',
        data: {
            broj: id,
            kategorija: kategorija,
            btn: true
        },
        dataType: 'json',
        success:function(data){
            prikazKat(data);
            console.log(data);
            
        },
        error:function(xhr, status, error){
            console.log(xhr);
        }
    });
}

function prikazKat(data){
    var ispis = "";
    ispis += '<div class"bikes">';
    ispis += '<div class="mountain-sec">';
    ispis += '<h2>'+data[0]['naziv_kategorija']+'</h2>';
    //console.log(data);

    for(var i=0;i<data.length;i++){
       ispis += '<a href="index.php?page=proizvod&id='+data[i]['id_p']+'">';
       ispis +=		'<div class="bike">';
       ispis +=		 	'<img src="'+data[i]['putanja']+'" alt="'+data[i]['putanja']+'"/>';
       ispis +=			 	'<div class="bike-cost">';
       ispis +=				 	'<div class="bike-mdl">';
       ispis +=					 	'<h4>NAZIV<span>"'+data[i]['naziv']+'"</span></h4>';
       ispis +=				 	'</div>';
       ispis +=				 	'<div class="bike-cart">';
       ispis +=					 	'<a class="buy" href="index.php?page=proizvod&id='+data[i]['id_p']+'">Pogledaj</a>';
       ispis +=				 	'</div>';
       ispis +=				 	'<div class="clearfix"></div>';
       ispis +=				'</div>';
       ispis +=		'</div>';
       ispis +='</a>';
    }
       ispis += '<div class="cleaner"></div>';
       ispis += '</div>';


    $('.mountain-sec').html(ispis);
}