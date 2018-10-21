var score = 1;
var correct_answer = -1;

window.onload=function (){
  updateGame();
};

function updateGame(){
  $.get( "../php/shuffle.php", function( data ) {
    console.log(data);
    document.getElementById("mainImg").src = data[0];
    document.getElementById("answer1").src = data[1];
    document.getElementById("answer2").src = data[2];
    document.getElementById("answer3").src = data[3];
    document.getElementById("answer4").src = data[4];
  });
}

function answer(answer){
  if(answer==correct_answer){

  }
}