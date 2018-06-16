


$('#Playlist').change(function(){
    bloq = false;
    $('#Playlist').each(function(){
        value = $(this).val();
        if(value == ""){ bloq = true; }
    })
    if(!bloq){
        //Lancement de la recher Ajax !
        music = $('#playermusic');
        
        var jObj = $("option", this).filter(":selected"), id = jObj.get(0).id;
        $.ajax({
            url: "{{ path('PlaylisteAutomate') }}",
            type: "POST",
            dataType: "html",
            data: {
                id : id
            },
            success: function (data) {
                var tab = JSON.parse(data);
                document.getElementById('playermusic').innerHTML = "";
                    for(var i=0; i < tab.length; i++ ){ 
                        //music.append('<img src="'+tab[i].image+'" height="45" width="45">');
                        music.append('<audio id="audio" controls="controls"> <source src="'+tab[i].src+'" type="audio/mp3"> </audio> <br>');
                         
                    }
            }
        });
    }
});