
function changeTabWitness(number){
      $("#witness"+number).removeClass("active").children().attr("aria-expanded", false);
      $("#witness"+number).next().addClass("active").children().attr("aria-expanded", true);
      $("#testigo"+number).removeClass("active in");
      $("#testigo"+number).next().addClass("active in");
}
