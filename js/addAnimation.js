window.onload = function() {
  var imgDom = document.getElementById("mainImg");
  let img = new Image();
  img.src = imgDom.src;

  maxWidth = img.width;
  maxHeight = img.height;

  imgDom.height = 2;

  var appear = setInterval(frame, 10);
  let width = 0;
  let height = 0;
  function frame() {
    if (width < maxWidth) {
      width += 10;
      imgDom.width = width;
    } else if (height < maxHeight) {
      height += 10;
      imgDom.height = height;
    } else {
      clearInterval(appear);
    }
  }
};
