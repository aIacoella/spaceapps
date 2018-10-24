var score = 0;
var correct_answer = -1;
var img = " ";

window.onload=function (){
  updateGame();
};

function updateGame(){
  score++;
  $.get( "../php/shuffle.php", function( data ) {
    data = JSON.parse(data);
    if(data[0] === undefined){
      console.log(data);
      return;
    }
    document.getElementById("mainImg").src = "../img/"+data[0];
    document.getElementById("mainImg").style.margin = "auto";
    img = data[0];
    indexes = [1, 2, 3, 4];
    for(let i=1; i<=4; i++){
      let index = indexes[Math.floor(Math.random()*indexes.length)];
      console.log(index);
      document.getElementById("answer" + i).innerText = data[index];
      if(index === 1){
        correct_answer = i;
      }
      for(let f=0; f<indexes.length; f++){
        if(index === indexes[f]){
          indexes.splice(f, 1);
          break;
        }
      }
    }
  });
}

function answer(answer){
  if(answer!==correct_answer){
    document.getElementById("scoreInput").value=score-1;
    document.getElementById("gameForm").submit();
  } else {
    updateGame();
  }
}



