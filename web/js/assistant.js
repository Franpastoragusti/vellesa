$(function() {
    $("#addClass").click(function() {
        $('#qnimate').addClass('popup-box-on');
    });

    $("#removeClass").click(function() {
        $('#qnimate').removeClass('popup-box-on');
    });
})

var cambiarHoraUser = $("#tiempo_user");
var cambiarHoraApp = $("#tiempo_app");
var tiempo = new Date();
var hora = tiempo.getHours();
var minuto = tiempo.getMinutes();
var hora_local = "" + hora + " : " + minuto

var posicion = window.location.href.indexOf("/app");
var pantalla = window.location.href.substring(posicion);

console.log(pantalla);

var textoApp = $("#texto_app");
var textoUser = $("#texto_user");

var popupUser = $("#popup_user").css("display", "none");

function responder() {
    $("#textoEscritoUser").keypress(function(e) {
        if (e.which == 13) {
            var textAreaUser = $("#textoEscritoUser").val();
            popupUser.css("display", "block");
            textoUser.append("<p>" + textAreaUser + "</p>");
            $("#textoEscritoUser").val("");
            //responderPuntos().delay(4000);
            tiempo = new Date();
            hora = tiempo.getHours();
            minuto = tiempo.getMinutes();
            hora_local = "" + hora + " : " + minuto
            cambiarHoraUser.text(hora_local);
        }
    });
}

switch (pantalla) {
    case "/app/testRoom":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estas en chatRoom</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/areas/health":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en health</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/areas/personal":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en personal</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/areas/family":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en familia</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en datos</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en datos</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/0":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en tus datos personales</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/1":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en testigo 1</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/2":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en testigo 2</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/3":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en testigo 3</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/4":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en representante</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "/app/bureaucracy/instance":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en instance</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    default:
}
