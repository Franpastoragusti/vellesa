function getImageAsync(imagen, base64) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", imagen, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
                var reader = new FileReader();
                reader.onload = function(event) {
                  var res = event.target.result;
                  if (base64.length != 1) {
                    console.log("Generando imagenes..");
                  }
                  base64.push(res)
                }
                var file = this.response;
                reader.readAsDataURL(file)
        };
        xhr.send()
}
