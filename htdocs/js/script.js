    $('#reg-btn').click(function () {
        $.ajax({
            type: 'POST',
            url: '/site/signin',
            dataType: 'json',
            data: $('#auth').serialize(),
            success: 
        });
    });
    
    
    $('#reg-btn').click(function () {
        $.ajax({
            type: 'POST',
            url: '/site/signup',
            dataType: 'json',
            data: $('#register').serialize(),
            success: 
        });
    });