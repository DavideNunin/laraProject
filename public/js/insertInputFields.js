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