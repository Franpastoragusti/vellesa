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

var pantalla = window.location.href.substring(22, 100);

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
    case "app/testRoom":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estas en chatRoom</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "app/instance":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en instance</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "app/areas":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en instance</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    case "app/bureaucracy/instance":
        //Escribir el texto de nuestro "bot"
        textoApp.append("<p>Hola estoy en instance</p>");
        cambiarHoraApp.append(hora_local);
        responder();
        break;
    default:
}
