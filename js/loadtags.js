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
                let tagDiv = document.createElement("div");
                tagDiv.className = "tag-div";
                let tag = document.createElement("h4");
                tag.className = "tag";
                let span = document.createElement("span");
                span.className = "badge badge-secondary";
                span.appendChild(document.createTextNode(tags[i]));
                tag.appendChild(span);
                tagDiv.appendChild(tag);

                tagSelection.appendChild(tagDiv);
            }
        }
    });
}