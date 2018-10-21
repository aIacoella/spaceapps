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
        const imgs = JSON.parse(data).img;
        clearImages();
        let imgDiv = document.getElementsByClassName("imgDiv")[0];
        for(let i=0; i<imgs.length; i++){
            let aimg = document.createElement("a");
            aimg.href = "./inspireAdd.php?name=" + imgs[i];
            let img = document.createElement("img");
            img.className = "hubble-img";
            img.src = "../img/"+imgs[i];
            aimg.appendChild(img);
            imgDiv.appendChild(aimg);
        }
      });
}

function clearImages(){
    let images = document.getElementsByClassName("imgDiv")[0];
    console.log(images);
    while (images.firstChild) {
        images.removeChild(images.firstChild);
      }
}