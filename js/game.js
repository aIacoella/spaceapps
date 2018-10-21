var score = 0;
var correct_answer = -1;

window.onload=function (){
  updateGame();
};

function updateGame(){
  score++;
  document.getElementById("current-score").innerText = score;
  $.get( "../php/shuffle.php", function( data ) {
    console.log(data);
    data = JSON.parse(data);
    console.log(data[0]);
    document.getElementById("mainImg").src = "../img/"+data[0];
    indexes = [1, 2, 3, 4];
    for(let i=1; i<=4; i++){
      let index = Math.floor(Math.random()*indexes.length) + 1;
      document.getElementById("answer" + i).innerText = data[index];
      if(index === 1){
        correct_answer = i;
      }
      indexes.splice(index, 1);
    }
  });
}

function answer(answer){
  if(answer!==correct_answer){
    $.ajax({
      type: 'post',
      url: '../php/leaderboard.php',
      score: score-1,
      dataType: 'json',
    });
  } else {
    updateGame();
  }
}