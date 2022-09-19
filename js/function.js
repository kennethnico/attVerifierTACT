function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
function enviarDatosAsistente(){
    //donde se mostrará lo resultados
    divResultado = document.getElementById('testeo');
    //valores de los inputs
    nom=document.checker.nom.value;
    mail=document.checker.email.value;
    adsc=document.checker.ads.value;
    edad=document.checker.edad.value;
    sexo=document.checker.sex.value;
    tyc=document.checker.tyc.value;
    ub=document.getElementById('location').innerText;
    //instanciamos el objetoAjax
    ajax=objetoAjax();
    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "action.php",true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
            //llamar a funcion para limpiar los inputs
            limpiarCampos();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores
    ajax.send("nnn="+nom+"&eee="+mail+"&ads="+adsc+"&edad="+edad+"&sex="+sexo+"&tyc="+tyc+"&loca="+ub)
}
function limpiarCampos(){
    document.checker.nom.value="";
    document.checker.email.value="";
    document.checker.ads.value="";
    document.checker.edad.value="";
    document.checker.sex.value="";
    document.checker.tyc.value="";
    document.checker.nom.focus();
}