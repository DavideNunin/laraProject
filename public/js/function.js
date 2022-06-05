$(function () {
    $(".closePopup").on('click', function(){
    closePopup($(this).attr("id"));
    });
});

function closePopup(idpopup) {
    const body = document.querySelector("body");
    var overlay = document.getElementById("overlay");
    let pop = document.getElementById(idpopup.split('-')[0]);
    console.log(pop);
    overlay.style.display = 'none';
	pop.style.display = 'none';
    body.style.overflow = 'auto';
}

function openPopup(nomePopup, domanda, risposta) {
    console.log(nomePopup);
    const body = document.querySelector("body");
    var overlay = document.getElementById("overlay");
    //var popupDel = document.getElementById(nomePopup);
    overlay.style.display = 'block';
    nomePopup.style.display = 'block';
    //body.style.overflow = 'hidden';

    if(domanda!='' && risposta!=''){
        $('#domanda_update').attr('value',domanda);
        $('#risposta_update').text(risposta);
    }
}

function sendMessage(URL, id_talking) {
    var form = new FormData(document.getElementById('formSendMessage'));
    form.append("destinatario",id_talking); 
    $.ajax({
        type: 'POST',
        url: URL,
        data: form,
        dataType: "json",
        error: function (data) {
            alert("errore");
        },
        success: function (data) {
            closePopup("popupMessage-close");
        },
        contentType: false,
        processData: false
    });
}




