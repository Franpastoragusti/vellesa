/**
 * Created by fran on 2/10/17.
 */
(function(){

    var button = document.getElementById('cn-button'),
        wrapper = document.getElementById('cn-wrapper');

    //open and close menu when the button is clicked
    var open = false;
    button.addEventListener('click', handler, false);

    function handler(){
        if(!open){

            classie.add(wrapper, 'opened-nav');
        }
        else{

            classie.remove(wrapper, 'opened-nav');
        }
        open = !open;
    }
    function closeWrapper(){
        classie.remove(wrapper, 'opened-nav');
    }

})();
