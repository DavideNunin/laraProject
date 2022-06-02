$(document).ready(function () {
    let id_talking;

    $(".display-chat").click(function () {
        $(".display-chat").removeClass("active-chat");
        $(".display-chat").find("a:last").css('color', '#000');
        $(this).toggleClass("active-chat");
        $(this).find("a:last").css('color', '#f9f9f9');
        id_talking = $(this).attr("id");
        startChat(id_talking);
    });

    /*$("#sendMessage-form").on('submit', function (event) {
        event.preventDefault();
        sendMessage(id_talking);
    });*/
});


function sendMessage(URL, id_talking) {

    var form = new FormData(document.getElementById('sendMessage-form'));
    form.append("destinatario", id_talking);
    $.ajax({
        type: 'POST',
        url: URL,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                if(errMsgs.errors.messaggio==undefined){
                    console.log("entrato");
                    $("#errMessaggio").append(errMsgs.errors.destinatario[0]);
                }
                else {$("#errMessaggio").append(errMsgs.errors.messaggio[0]);}
                console.log(errMsgs.errors.messaggio);
                //$("#errMessaggio").append(errMsgs.errors.messaggio[0]);
                //$("#errMessaggio").append(errMsgs.errors.messaggio[1]);
            }
        },
        success: function (data) {
        $("#errMessaggio").text();
        $("#messaggio").val("");
        console.log(data.destinatario);
        startChat(data.destinatario);
        },
        contentType: false,
        processData: false
    });

}

// questa funzione parte dopo la partenza della chat, alla selezione di un utente
function startChat(id_user) {

    $.ajax({
        type: 'GET',
        url: 'chat/cliccato?id=' + parseInt(id_user),
        dataType: "json",
        error: function () {
            alert("errore");
        },
        success: function (data) {
            console.log(data.messaggi);
            console.log(data.user);
            displayChat(data.messaggi, data.user);
        },
        contentType: false,
        processData: false
    });
}









function displayChat(messaggi, user) {
    $("#container-message").empty();
    $("#container-message").append("<span class='row mb-2 chat-subtitle'> Stai parlando con " + user.username + "</span>");
    $.each(messaggi, function (i, messaggio) {
        if(messaggio.mittente == user.id) {
            console.log("mittente" + messaggio.mittente);
            console.log("user id" + user.id);
            $("#container-message").append("<div class='row d-flex justify-content-start'>");
        }
        else{
            console.log("entrato");
            $("#container-message").append("<div class='row d-flex justify-content-end'>");

        }
        $("#container-message").find("div:last").append("<div class='col-lg-4 single-message mb-1'>"+
        "<div class='row body-message'><span>"+
            (messaggio.testo)+
        "</span></div>"+
        "<div class='row footer-message d-flex justify-content-end info-message'>");
        if(messaggio.letto) {
        $("#container-message").find("div:last").append(
        "<div class='col-lg-6 d-flex justify-content-end'><span>"+ messaggio.data_ora_invio +"</span></div>"+
        "<div class='col-lg-1 d-flex justify-content-end'><i class='fa-solid fa-check-double'></i></div>"+
        "</div></div></div>");
        }
        else {
            $("#container-message").find("div:last").append(
            "<div class='col-lg-6 d-flex justify-content-end'><span>"+ messaggio.data_ora_invio +"</span></div>"+
            "<div class='col-lg-1 d-flex justify-content-end'><i class='fa-solid fa-check'></i></div>"+
            "</div></div></div>");
        }
    
});
}