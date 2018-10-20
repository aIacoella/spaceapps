
Window.onload=function (){
    $.ajax({
        url: '../php/shuffle.php',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            }
        })};