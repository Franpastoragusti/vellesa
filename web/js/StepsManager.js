function getNumberByRoute() {
    let location= window.location.pathname;
    let number;
    switch (location){
        case '/app/areas/health':
            number = 1;
            break;
        case '/app/areas/enviroment':
            number = 2;
            break;
        case '/app/areas/personal':
            number = 3;
            break;
        case '/app/areas/family':
            number = 4;
            break;
        case '/app/bureaucracy/':
            number = 5;
            break;

    }

    return parseInt(number);
}

function stepAnimation(number) {

    $("ul > li:nth-child("+number+")").addClass('selected');
    $("ul > li:nth-child("+number+") > a > span.step_no").addClass('selected');
    $("ul > li:nth-child("+number+") > a > span.step_descr").addClass('selected');

}