window.onload = function () { 
    $.ajax({
        type: 'post',
        url: '../php/tag_select.php',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            let tagSelection = document.getElementById("tagSelection");
            let tags = response.tag;
            for(let i = 0; i<tags.length; i++){
                let tag = document.createElement("div");
                tag.className = "tag";
                let span = document.createElement("span");
                span.className = "badge badge-secondary";

                span.addEventListener("click", function(){
                    loadImages(tags[i]);
                });

                span.appendChild(document.createTextNode(tags[i]));

                tag.appendChild(span);

                tagSelection.appendChild(tag);
            }
        }
    });
}

function clearSpans(){
    let spans = document.getElementsByClassName("badge");
    for(let i=0; i<spans.length; i++){
        spans.style.backgroundColor = "#AAAAAA"
    }
}