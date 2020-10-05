(function ($) {
	$("#form_login").submit(function (ev) {
		ev.preventDefault();
		$.ajax({
			url: 'login/validate',
			type: 'POST',
			data: $(this).serialize(),
			success:function (err) {
				var json = JSON.parse(err);
				window.location.replace(json.url);
			},
			statusCode:{
				400:function (xhr) {
					$("#username > input").removeClass('is-invalid');
					$("#password > input").removeClass('is-invalid');
					var json = JSON.parse(xhr.responseText);
					if(json.username.length !=0){
						$("#username > div").html(json.username);
						$("#username > input").addClass('is-invalid');
					}
					if(json.password.length !=0){
						$("#password > div").html(json.password);
						$("#password > input").addClass('is-invalid');
					}
				},
				401:function (xhr) {
					$("#username > input").removeClass('is-invalid');
					$("#password > input").removeClass('is-invalid');
					var json = JSON.parse(xhr.responseText);
					$("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg +'</div>');
				}
			}

		});
	})
})(jQuery)
