window.onload = function () { 
    $.ajax({
        type: 'post',
        url: '../php/tag_select.php',
        dataType: 'json',
        success: function(response) {
            console.log(response);
        }
    });
}