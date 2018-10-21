var score = 1;
var correct_answer = -1;

window.onload=function (){
  updateGame();
};

function updateGame(){
  $.get( "../php/shuffle.php", function( data ) {
    console.log(data);
    data = JSON.parse(data);
    console.log(data[0]);
    document.getElementById("mainImg").src = "../img/"+data[0];
    document.getElementById("answer1").innerHTML = data[1];
    document.getElementById("answer2").innerHTML = data[2];
    document.getElementById("answer3").innerHTML = data[3];
    document.getElementById("answer4").innerHTML = data[4];
  });
}

function answer(answer){
  if(answer==correct_answer){

  }
}