function getImageAsync(rutas, base64) {
  for (var i = 0; i < rutas.length; i++) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", rutas[i], true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
                var reader = new FileReader();
                reader.onload = function(event) {
                  var res = event.target.result;
                  if (base64.length != rutas.length) {
                    console.log("Generando imagenes..");
                  }
                  base64.push(res);
                }
                var file = this.response;
                reader.readAsDataURL(file)
        };
        xhr.send()
    }
}
