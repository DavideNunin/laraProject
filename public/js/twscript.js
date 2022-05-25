function getErrorHtml(elemErrors) {
	if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
		return;
	var out = '<ul class="errors">';
	for (var i = 0; i < elemErrors.length; i++) {
		out += '<li>' + elemErrors[i] + '</li>';
	}
	out += '</ul>';
	return out;
}

function doElemValidation(id, actionUrl, formId) {

	var formElems;

	function addFormToken() {
		var tokenVal = $("#" + formId + " input[name=_token]").val();
		formElems.append('_token', tokenVal);
	}

	function sendAjaxReq() {
		var $j = jQuery.noConflict();
		$j.ajax({
			type: 'POST',
			url: actionUrl,
			data: formElems,
			dataType: "json",
			error: function (data) {
				if (data.status === 422) {
					var errMsgs = JSON.parse(data.responseText);
					$("#" + id).parent().find('.errors').html(' ');
					$("#" + id).after(getErrorHtml(errMsgs[id]));
				}
			},
			contentType: false,
			processData: false
		});
	}

	var elem = $("#" + formId + " :input[name=" + id + "]");
	inputVal = elem.val();
	
	formElems = new FormData();
	formElems.append(id, inputVal);
	addFormToken();
	sendAjaxReq();

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
					$("#" + id).parent().find('.errors').html(' ');
					$("#" + id).after(getErrorHtml(errMsgs[id]));
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


document.addEventListener("DOMContentLoaded", function () {  
    var closePopup = document.getElementById("popupclose");
	var popup = document.getElementById("popup");
	var addfaq = document.getElementById("addfaq");
	var popuptitle = document.getElementById("popuptitle");
	// Close Popup Event
	closePopup.onclick = function() {
		overlay.style.display = 'none';
		popup.style.display = 'none';
	  };
	  // Show Overlay and Popup
	  addfaq.onclick = function() {
		overlay.style.display = 'block';
		popup.style.display = 'block';
		popuptitle.textContent= 'Aggiungi';
	  }

});