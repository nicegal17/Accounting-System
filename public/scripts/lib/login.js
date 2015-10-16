$("#form-signin").submit(function(event) {
    if ($('#inputEmail').val() == '') {
        $.notify("Please enter username", "error");
        event.preventDefault();
        return;
    }

    if ($('#inputPassword').val() == '') {
        $.notify("Please enter password", "error");
        event.preventDefault();
        return;
    }

    $.ajax({
        url: '/auth/login',
        type: 'POST',
        dataType: 'json',
        data: {
            username: $('#inputEmail').val(),
            password: $('#inputPassword').val()
        },
        success: function(data, textStatus, xhr) {
            console.log('data: ',data);
            if(data.success == false){
            	$.notify(data.msg, "error");
            	return;
            }
            window.location.href= data.url;
            window.localStorage['acctgToken'] = data.token;
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('textStatus: ',textStatus);
        }
    });
    event.preventDefault();
});
