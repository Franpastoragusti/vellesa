/**
 * Created by fran on 2/15/17.
 */
class FormDecorator {

  constructor() {
      this.playing = false;
    }


    static addIconForInfoLabels(){

        $(".form-group").prepend('<i class="fa fa-info-circle fa-2x" onclick="FormDecorator.offerInfo(this, event, format)" aria-hidden="true"></i>')
        $("label.control-label").width('95%').css('padding-bottom', '10px')
        $("div.form-group i").css('color','#5A738E').css('opacity','0.9').addClass('pull-right').width('2%').css('data-toggle','collapse').css('z-index','999')
        $(".form-group:last").children('i').remove()
        $(".form-group:last").prev().children('i').remove()

    }



    static offerInfo(icon, event, format){
        if (format == 'texto') {
            var text = "La persona que elijas para esta respuesta será la responsable de hablar con tus médicos sobre tu estado de salud y evolución. Puede, o no, ser la misma que tu representante. Si no coinciden, debe existir una buena relación de comunicación y coordinación entre ellas para que su objetivo común sea que se cumplan tus deseos y tu voluntad. Te aconsejo que elijas a una persona con disponibilidad. Lo ideal es que tenga habilidades comunicativas y de comprensión de información técnica.Cuando avances en el proceso, podrás elegir a las personas que se encarguen de tus cuidados, pero en este momento, recuerda que la misión es únicamente gestionar tus asuntos de salud a nivel médico. Piénsatelo con calma y recuerda que siempre podrás modificarlo si así lo consideras";
            if (!$('#info').length) {
                $(icon).parent('div').prepend("<div id='info' class='panel panel-default'><div class='panel-body'>"+text+"</div></div>")
            }else{
                $('#info').remove();
            }
        }else{

            $(icon).parent('div').prepend("<audio id='audio'><source src='/audio/HealthAreaLbl3.mp3' type='audio/mpeg'>")
            $(icon).attr('id','audioController').attr('onclick', 'FormDecorator.audioManager()')
            var audio = document.getElementById('audio');
            audio.play();
            this.playing=true;

        }

    }

    static setClassButtonSubmit(){
        $('button[type="submit"]').addClass('btn btn-warning start')
    }




    static audioManager(){
      var audio = document.getElementById('audio');
        if (this.playing == true) {
          
          audio.pause();
          this.playing = false;
        }else{
          audio.play();
          
          this.playing=true;
        }
    }


    static decorateMenu(representant, witness1, witness2, witness3, applicant){

        if (witness1 == 1){
            $('#witness1').children('a').addClass('completed');
        }
        if (witness2 == 1){
            $('#witness2').children('a').addClass('completed');
        }
        if (witness3 == 1){
            $('#witness3').children('a').addClass('completed');
        }
        if (representant == 1){
            $('#representant').children('a').addClass('completed');
        }
        if (applicant == 1){
            $('#applicant').children('a').addClass('completed');
        }
    }
}


