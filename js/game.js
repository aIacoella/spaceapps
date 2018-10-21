var score = 1;
var correct_answer = -1;

window.onload=function (){
    $.get( "../php/shuffle.php", function( data ) {
        console.log(data);
      });
    };


