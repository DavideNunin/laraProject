
$(function () {
    $("#addfaq").on('click', function(){
    openPopup(popupAdd);
    });
    
    $(".closePopup").on('click', function(){
    closePopup(popupDel, popupAdd, popupUpdate);
    });
});

function closePopup(first, second, third) {
    const body = document.querySelector("body");
    var overlay = document.getElementById("overlay");
    overlay.style.display = 'none';
	first.style.display = 'none';
    second.style.display = 'none';
    third.style.display = 'none';
    body.style.overflow = 'auto';
}

function openPopup(nomePopup, domanda, risposta) {
    console.log(nomePopup);
    const body = document.querySelector("body");
    var overlay = document.getElementById("overlay");
    //var popupDel = document.getElementById(nomePopup);
    overlay.style.display = 'block';
    nomePopup.style.display = 'block';
    body.style.overflow = 'hidden';

    if(domanda!='' && risposta!=''){
        $('#domanda_update').attr('value',domanda);
        $('#risposta_update').text(risposta);
    }
}

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

function doFormValidation(actionUrl, formId) {

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
            console.log(data.id);
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
            console.log(data);
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
            console.log(data.domanda);
            console.log(data.risposta);
            console.log(data.idupdate);
            openPopup(popupUpdate, data.domanda, data.risposta);
        },
        contentType: false,
        processData: false
    });

}