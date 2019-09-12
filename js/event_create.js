//chiamata ajax per la creazione degli eventi
$(document).ready(function() {

    $('#submit').click(function(e){//si attiva quando viene cliccato il bottone con id Submit 
        
        e.preventDefault()
        //prende i valori che gli servono
        var titolo = $("#titolo").val();
        var descrizione = $("#descrizione").val();
        var data = $("#data").val();
        var ora = $("#ora").val();
        var durata = $("#durata").val();
        var posti = $("#posti").val();
        var privacy = $("#privacy").val();
        var tag = $("#tag").val();
        var UId = $("#UId").val();

        var response = '';
        $.ajax({

            url: "php/events/insert_event.php",
            method: 'POST',
            data: "titolo=" + titolo + "&descrizione=" + descrizione + "&data=" + data + "&ora=" + ora + "&durata=" + durata + "&posti=" + posti + "&privacy=" + privacy + "&tag=" + tag + "&UId=" + UId,
            dataType: "html",
            success: function(data) {
                response = data
                alert('Evento creato con successo!');
                window.location.href='https://localhost/Smartlab2.0/events.php'
            }
        })

    })

})

