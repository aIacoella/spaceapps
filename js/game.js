
Window.onload=function (){
    $.get( "../php/shuffle.php", function( data ) {
        console.log(data);
      });
    };