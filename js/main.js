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
    console.log(tag);
    $.ajax({
        type: 'get',
        url: '../php/img_select.php',
        data: tag,
        dataType: 'json',
        success: function(response) {
            console.log(response);
        }
    });
    $.get( "../php/img_select.php", function( data ) {
        $( ".result" ).html( data );
        alert( "Load was performed." );
      });
}