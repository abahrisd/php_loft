$('input#submitButton').click( function() {

    $("form").each(function(){

        $.ajax({
            url: 'http://php-loft/burgers/php/order.php',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                console.log('Success!!!1111111oneoneone');
            }
        });
    });

});