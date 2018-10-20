window.onload = function () { 
    $.ajax({
        type: 'post',
        url: '../php/tag_select.php',
        data: tags,
        dataType: 'json',
        success: function(response) {
            console.log(tags);
        }
    });
}