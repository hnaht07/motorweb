let fileInput = document.getElementById("imgFiles");
let imageContainer = document.getElementById("preImages");



function chooseFile(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

function preview() {
    imageContainer.innerHTML = "";
    
    for(i of fileInput.files){
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.innerText = i.name;
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.setAttribute("src", reader.result);
            img.setAttribute("id", "imgPre");
            figure.insertBefore(img,figCap);

        }
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);

    }
}