window.onload = function() {
  var imgDom = document.getElementById("mainImg");
  let img = new Image();
  img.src = imgDom.src;

  maxHeight = img.height;
  imgDom.width = img.width;

  var appear = setInterval(frame, 10);
  let height = 0;
  function frame() {
    if (height < maxHeight) {
      height += 8;
      imgDom.height = height;
    } else {
      clearInterval(appear);
    }
  }
};
