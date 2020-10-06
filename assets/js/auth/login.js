(function($){
    $("#frm_login").submit(function(ev){
        ev.preventDefault();
        $.ajax({
            url:'login/validate',
            type: 'POST',
            data: $(this).serialize(),
            success: function(data){
                var json = JSON.parse(data);
               //console.log(json.email);
               window.location.replace(json.url);
            },
            error: function(xhr){
                if(xhr.status == 400){
                    $("#email > input").removeClass('is-invalid');
                    $("#password > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if(json.email.length != 0){
                        $("#email > div").html(json.email);
                        $("#email > input").addClass('is-invalid');
                    }
                        if(json.password.length != 0){
                            $("#password > div").html(json.password);
                            $("#password > input").addClass('is-invalid');
                        }
                    }else if(xhr.status == 401){
                        var json = JSON.parse(xhr.responseText);
                        console.log(json);
                    }

            },

        });
        ev.preventDefault();
    });
})(jQuery)