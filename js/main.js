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

function activateTag(tag){
    console.log(tag);
    $.ajax({
        type: 'post',
        url: '../php/img_select.php',
        data: tag,
        dataType: 'json',
        success: function(response) {
            console.log(response);
        }
    });
}