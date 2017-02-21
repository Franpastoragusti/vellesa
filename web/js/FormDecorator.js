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
        $("form > div:last > i").css('display', 'none')

    }


    static offerInfo(icon, event){
        if (!$('#info').length) {
             $(icon).parent('div').prepend("<div id='info' class='panel panel-default'><div class='panel-body'>texto de ayuda<i id='audioController' onclick='FormDecorator.audioManager()' class='fa fa-volume-up fa-2x pull-right' aria-hidden='true'></i></div></div>")
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
