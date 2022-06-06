$(function () {
    $(".closePopup").on('click', function(){
    closePopup($(this).attr("id"));
    });

});


/* DISPLAY ERROR */
function getErrorHtml(elemErrors, update) {
    let first, second = '';
    if(update){
        first='errDomandaUpdate';
        second='errRispostaUpdate';
    }
    else {
        first='errDomanda';
        second='errRisposta';
    }


    $.each(elemErrors.domanda, function (id){
        $("#"+first).empty();
        $("#"+first).append(elemErrors.domanda[id]+ "<br>");
    });

    $.each(elemErrors.risposta, function (id){
        $("#"+second).empty();
        $("#"+second).append(elemErrors.risposta[id] + "<br>");
    });
}

/* MANAGE POPUP CLOSE AND OPEN */
function closePopup(idpopup) {
    const body = document.querySelector("body");
    var overlay = document.getElementById("overlay");
    let pop = document.getElementById(idpopup.split('-')[0]);
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

function sendMessageFromPopup(URL, id_talking) {
    var form = new FormData(document.getElementById('formSendMessage'));
    form.append("destinatario",id_talking); 
    $.ajax({
        type: 'POST',
        url: URL,
        data: form,
        dataType: "json",
        error: function (data) {
            $("#errMessaggio").text("Devi scrivere un messaggio");
        },
        success: function (data) {
            closePopup("popupMessage-close");
        },
        contentType: false,
        processData: false
    });
}

function sendMessageFromPopup(URL, id_talking) {
    var form = new FormData(document.getElementById('formSendMessage'));
    form.append("destinatario",id_talking); 
    $.ajax({
        type: 'POST',
        url: URL,
        data: form,
        dataType: "json",
        error: function (data) {
            $("#errMessaggio").text("Devi scrivere un messaggio");
        },
        success: function (data) {
            closePopup("popupMessage-close");
        },
        contentType: false,
        processData: false
    });
}


/* FUNCTIONS FAQ */

function addNewFaq(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    getErrorHtml(errMsgs[id], false);
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });

}

function requestPopup(id_Faq) {

    $.ajax({
        type: 'GET',
        url: 'faqmanager/load?id='+id_Faq,
        dataType: "json",
        error: function (data) {
            alert("errore");
        },
        success: function (data) {
            openPopup(popupUpdate, data.domanda, data.risposta);
        },
        contentType: false,
        processData: false
    });

}

function UpdateFaq(actionUrl, formId, id_Faq) {

    var form = new FormData(document.getElementById(formId));
    form.append("id", id_Faq);
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    getErrorHtml(errMsgs[id], true);
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });

}

function deleteFaq(id_Faq) {
    $.ajax({
        type: 'GET',
        url: 'faqmanager/delete?id='+id_Faq,
        dataType: "json",
        error: function (data) {
            alert("errore");
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });

}


/* FUNCTIONS CHAT */
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
                    $("#errMessaggio").text('');
                    $("#errMessaggio").append(errMsgs.errors.destinatario[0]);
                }
                else {
                    $("#errMessaggio").text('');
                    $("#errMessaggio").append(errMsgs.errors.messaggio[0]);}
            }
        },
        success: function (data) {
        $("#errMessaggio").text();
        $("#messaggio").val("");
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


/* INSERIMENTO OFFERTA FUNCTIONS */
function showAppartamentoFields(){  
    document.getElementById("postoLettoFields").style.display = "none";
    document.getElementById("appartamentoFields").style.display = "block";
    clearPostoLettoFields() 
}

function showPostoLettoFields(){
    document.getElementById("appartamentoFields").style.display = "none";
    document.getElementById("postoLettoFields").style.display = "block";
    clearAppartamentoFields();
}

function clearAppartamentoFields(){
    document.getElementById("superficie").value =" ";
    document.getElementById("npostiletto").value ="1";
    document.getElementById("ncamere").value ="1";
    document.getElementById("nbagni").value ="1";  
    document.getElementById("loc_ricr").checked = false;  
    document.getElementById("loc_ricr1").checked = false;  
    document.getElementById("cucina").checked = false;
    document.getElementById("cucina1").checked = false;  
    document.getElementById("terrazzo").checked = false;  
    document.getElementById("terrazzo1").checked = false;  
}

function clearPostoLettoFields(){
    document.getElementById("doppia").checked = false;  
    document.getElementById("doppia1").checked = false; 
    document.getElementById("superficie_postoletto").value =" ";
    document.getElementById("luogoStudio").checked = false;  
    document.getElementById("luogoStudio1").checked = false; 
    document.getElementById("finestra").checked = false;  
    document.getElementById("finestra1").checked = false; 
}

/* RICERCA OPZIONAMENTO FUNCTIONS */

function sendFilter(){
    var inputs=$('.campo');
    console.log(inputs);
    var json= jsonifier(inputs);
    $.ajax({
        type: 'POST',
        url: 'TODO',
        data: inputs,
        dataType: "json",
        error: function (data) {
        alert("errore");
        },
        success: function (data) {
        displayChat(data.messaggi, data.user);
        },
        contentType: false,
        processData: false
        });
    return null;
}
function test(){
    var inputs=$('.campo');
    console.log(inputs);
    var json= jsonifier(inputs);
    console.log(json);
}

function jsonifier(inputs){
    jsonobj={};

    inputs.each ( function(){
        var type= $(this).attr("id");
        var value= $(this).val();
        jsonobj[type]=value;
    }
    )
    console.log(jsonobj);
    return jsonobj;
}

function createOpzionamento(id){
    if(confirm("Sei sicuro di voler opzionare quest'offerta ?")){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type:'POST',
            url: "{{route('opziona_offerta')}}",
            data: {
                    id: id},

            dataType: 'json',
            error: function(    ){
                alert("non puoi opzionare due volte la stessa offerta");
            },
            success:function(data){
                window.location.replace(data.redirect);
            },
        })
    }
 }

 function deleteOpzionamento(id, offerta_id){
    if(confirm("sicuro di voler eliminare?")){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type:'POST',
            url: "{{route('delete.Opzionamento')}}",
            data: {
                    id: id,
                    offerta: offerta_id},
            dataType: 'json',
            error: function(response){
                alert("errore");
            },
            success:function(data){
                window.location.replace(data.pippo);
            },
        })
    }
}

