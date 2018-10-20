window.onload = function () { 
    $.ajax({
        type: 'post',
        url: '../php/tag_select.php',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            let tagSelection = document.getElementById("tagSelection");
            for(let i = 0; i<response.length; i++){
                let tagDiv = document.createElement("div");
                tagDiv.class = "tag-div";
                let tag = document.createElement("h4");
                tag.class = "tag";
                let span = document.createElement("span");
                span.class = "badge badge-secondary";
                span.appendChild(document.createTextNode(response[i]));
                tag.appendChild(span);
                tagDiv.appendChild(tag);

                tagSelection.appendChild(tagDiv);
            }
        }
    });
}