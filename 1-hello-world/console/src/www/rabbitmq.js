$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            switch(clickBtnValue) {
              case 'produce':
                var message='Raport #' + response;
                $("#queue")
                  .append(
                    $("<li>")
                      .attr('data-raport', response)
                      .text(message)
                    );
                break;
              case 'consume':
                if (response.length > 0) {
                  $('[data-raport='+ response +']').remove();
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