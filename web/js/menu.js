/**
 * Created by fran on 2/10/17.
 */
(function(){

    var button = document.getElementById('cn-button'),
        wrapper = document.getElementById('cn-wrapper');

    //open and close menu when the button is clicked
    var open = false;

    function handler(){
        if(!open){

            classie.add(wrapper, 'opened-nav');
        }
        
    }

})();


function checkProcessToChangeMenuDisplay(witness1, witness2, witness3, representant, applicant){
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


function checkingProcessToFinish(witness1, witness2, witness3, representant, applicant) {
    var checkingProcces = setInterval(function () {
        var delay = 2000;
        if (applicant == 1 && representant == 1 && witness1 == 1 && witness2 == 1 && witness3 == 1) {
            $('#cn-wrapper').removeClass('opened-nav');
            $('#cn-button').empty().text('FIN').addClass('completed');

            var finishingProces = setTimeout(function () {
                var finish = confirm("Este es el ultimo paso, tras acceptar no podrás hacer cambios, ¿estas seguro que quieres terminar?");
                if (finish) {
                    window.location = '/app/bureaucracy/instance';
                } else {
                    clearInterval(checkingProcces)
                }
            }, delay);

        }
    }, 2000);
}