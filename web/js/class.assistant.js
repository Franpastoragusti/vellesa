class Assistant {

    constructor() {
        this.cambiarHoraUser = $("#tiempo_user");
        this.cambiarHoraApp = $("#tiempo_app");
        this.tiempo = new Date();
        this.hora_local = "" + this.tiempo.getHours() + " : " + this.tiempo.getMinutes();
        this.pantalla = window.location.href.substring(window.location.href.indexOf("/app"));
        this.textoApp = $("#texto_app");
        this.textoUser = $("#texto_user");
        this.popupUser = $("#mensaje_user").css("display", "none");
        this.id = 1;
        this.texts = {
            default:"Hola, recuerda que tienes al asistente durante todo el proceso para ayudarte",
            timeMessages:{
              first:{
                time:300,
                message:"Estás teniendo alguna complicación? Recuerda que abajo tienes un boton para iniciar videollamada"
              },
              second:{
                time:30,
                message:"Estás teniendo alguna complicación? Recuerda que abajo tienes un boton para iniciar videollamada"
              }
            },
            areaText:{
              family:"Texto por defecto en famili",
              health:"Texto por defecto en salud",
              personal:"Texto por defecto en personal",
              environment:"Texto por defecto en entorno"
            }
        };
    }

    getRoute(){
      var posicion = window.location.href.indexOf("/app");
      var pantalla = window.location.href.substring(posicion);
      return pantalla;
    }


    showAssistant() {
        $(function() {
            $("#addClass").click(function() {
              $('#qnimate').addClass('popup-box-on');
              $("#addClass").css('display', 'none');
            });

            $("#removeClass").click(function() {
                $('#qnimate').removeClass('popup-box-on');
                $("#addClass").css('display', 'block');
            });
        });
    }

    //Funcion que clona el mensaje escrito por el usuario y lo añade al asistente
    answer() {
      var cloneCount = 1;
      var tiempo = new Date()
      var responder = true;
        $("#textoEscritoUser").keypress(function(e) {
            if (e.which == 13) {
              //Cojo popup_user que vale 1 lo clono y le incremento la id
                var textAreaUser = $("#textoEscritoUser").val();
                //$("#mensaje_user").clone().attr('id', 'mensaje_user'+ +cloneCount).insertAfter("#mensajeApp"+cloneCount);
                $("#mensaje_user").clone().attr('id', 'mensaje_user'+ +cloneCount).insertBefore(".popup-messages-footer")
                $("#mensaje_user" + cloneCount).css("display", "block");
                $("#mensaje_user"+cloneCount + " #texto_user").attr('id', 'texto_user'+ +cloneCount);
                $("#texto_user" + cloneCount).attr('class', 'direct-chat-text pull-left').css("width", "80%");
                $("#texto_user"+ cloneCount).append("<p>"+textAreaUser+"</p>");
                $("#textoEscritoUser").val("");
                $("#tiempo_user").text("" + tiempo.getHours() + " : " + tiempo.getMinutes());
                if (responder == true) {
                  setTimeout(function(){
                    $("#mensajeApp1").clone().attr('id', 'mensajeApp'+ ++cloneCount).insertBefore(".popup-messages-footer");
                    $("#mensajeApp"+cloneCount +" #texto_app").attr('id', 'texto_app'+ cloneCount).empty();
                    $("#texto_app"+cloneCount).append("<p>Utiliza el boton de abajo para iniciar una videollamada</p>");
                    $("#tiempo_app").text("" + tiempo.getHours() + " : " + tiempo.getMinutes());
                  }, 5000);
                  responder = false;
                }

            }
        });
    }

    appAnswer(text){
      this.textoApp.append(text);
      this.cambiarHoraApp.append(this.hora_local);
      this.cambiarHoraUser.append(this.hora_local);
      this.answer();
    }

    showAppLongMessage(text, time/*in secs*/){
      var id = 10;
      //Despues del tiempo que quiera, fuerzo la aparicion del asistente
      setTimeout(function(){
        $('#qnimate').addClass('popup-box-on');
        $(function() {
            $("#removeClass").click(function() {
                $('#qnimate').removeClass('popup-box-on');
            });
        });
        $("#mensajeApp1").clone().attr('id', 'mensajeApp'+ ++id).insertBefore(".popup-messages-footer");
        $("#mensajeApp"+id +" #texto_app").attr('id', 'texto_app'+ id).empty();
        $("#texto_app"+id).append("<p>"+text+"</p>");
      }, time*1000);

    }
}
