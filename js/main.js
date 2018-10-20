function changeHoverState(i){
    if(i===0){
        document.getElementById("inspire").style.opacity = 0.9;
        document.getElementById("inspire").style.filter = "grayscale(0%)";

        document.getElementById("beinspired").style.opacity = 0.4;
        document.getElementById("beinspired").style.filter = "grayscale(100%)";
    } else {
        document.getElementById("inspire").style.opacity = 0.4;
        document.getElementById("inspire").style.filter = "grayscale(100%)";

        document.getElementById("beinspired").style.opacity = 0.9;
        document.getElementById("beinspired").style.filter = "grayscale(0%)";
    }
}

function loadImages(tag){
      $.get( "../php/img_select.php",{ tag: tag } ,function( data ) {
        console.log(data);
        clearImages();
        let imgDiv = document.getElementById("imgDiv");
        for(let i=0; i<data.length; i++){
            let img = document.createElement("img");
            img.className = "hubble-img";
            img.src = data[i];
            imgDiv.appendChild(img);
        }
      });
}

function clearImages(){
    let images = document.getElementsByClassName("hubble-img");
    while (images.firstChild) {
        images.removeChild(images.firstChild);
      }
}