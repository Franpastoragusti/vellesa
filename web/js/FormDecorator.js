/**
 * Created by fran on 2/15/17.
 */
class FormDecorator {

  constructor() {
      //this.audiolbl3 = new Audio("/audio/HealthAreaLbl3.mp3");
      this.playing = false;
    }

    static addIconForInfoLabels(){

        $(".form-group").prepend('<i class="fa fa-info-circle fa-2x" onclick="FormDecorator.offerInfo(this, event)" aria-hidden="true"></i>')
        $("label.control-label").width('95%').css('padding-bottom', '10px')
        $("div.form-group i").css('color','#5A738E').css('opacity','0.9').addClass('pull-right').width('2%').css('data-toggle','collapse').css('z-index','999')
        $(".form-group:last").children('i').remove()
        $(".form-group:last").prev().children('i').remove()

    }



    static offerInfo(icon, event, id){

        var text = "La persona que elijas para esta respuesta será la responsable de hablar con tus médicos sobre tu estado de salud y evolución. Puede, o no, ser la misma que tu representante. Si no coinciden, debe existir una buena relación de comunicación y coordinación entre ellas para que su objetivo común sea que se cumplan tus deseos y tu voluntad. Te aconsejo que elijas a una persona con disponibilidad. Lo ideal es que tenga habilidades comunicativas y de comprensión de información técnica.Cuando avances en el proceso, podrás elegir a las personas que se encarguen de tus cuidados, pero en este momento, recuerda que la misión es únicamente gestionar tus asuntos de salud a nivel médico. Piénsatelo con calma y recuerda que siempre podrás modificarlo si así lo consideras";

        if (!$('#info').length) {
            $(icon).parent('div').prepend("<div id='info' class='panel panel-default'><div class='panel-body'>"+text+"<i id='audioController' onclick='FormDecorator.audioManager()'class='fa fa-volume-up fa-2x pull-right' aria-hidden='true'></i></div></div>")
        }else{
            $('#info').remove();
        }
    }

    static setClassButtonSubmit(){
        $('button[type="submit"]').addClass('btn btn-warning start')
    }


    static audioManager(){
        if (this.playing == true) {
          audiolbl3.stop();
          this.playing = false;
        }else{
          var audiolbl3 = new Audio("/audio/HealthAreaLbl3.mp3");
          audiolbl3.play();
          this.playing=true;
        }
    }


}


$(".form-group:last").prev(function(){
  conosole.log($this.next())
})