$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            switch(clickBtnValue) {
              case 'produce':
                $("#producer-list").append($("<li>").text(response));
                break;
              case 'consume':
                if (response.length > 0) {
                  $("#consumer-list").append($("<li>").text(response));
                } else {
                  alert('Queue is empty; Nothing to consume');
                }
                break;
              default:
                console.log('unknow action');
            }
        });
    });
});