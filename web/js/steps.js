
class Steps {
  constructor(number) {
    this.number = number;
  }
  stepAnimation(){
    $("#wizard_verticle > ul > li:nth-child(1) > a").removeClass("selected").addClass("done");
    for (var i = 0; i < this.number; i++) {
      $("#wizard_verticle > ul > li:nth-child("+i+") > a").removeClass("disabled").addClass("done");
    }
    $("#wizard_verticle > ul > li:nth-child("+this.number+") > a.disabled ").first().removeClass("disabled").addClass("selected")
  }
}
