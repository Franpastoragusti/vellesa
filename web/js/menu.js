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


function checkCompleted(){
    let representant = '{{ representant }}';
    let witness1 = '{{ witness1 }}';
    let witness2 = '{{ witness1 }}';
    let witness3 = '{{ witness1 }}';
    let applicant = '{{ applicant }}';

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

