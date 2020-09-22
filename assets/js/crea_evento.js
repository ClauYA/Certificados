(function ($){
$("#form_crea_evento").submit(function (ev){

	$.ajax(
		{
			url: 'evento/validate',
			type: 'POST',
			data: $(this).serialize(),
			success: function (data){

				var json=JSON.parse(data);
				window.location.replace(json.url);
			},
			error: function (xhr){
				if(xhr.status == 400){
					$("#nombre_evento>input").removeClass('is-invalid');
					var json=JSON.parse(xhr.responseText);
					if (json.nombre_evento.length!=0){
						$("#nombre_evento>div").html(json.nombre_evento);
						$("#nombre_evento>input").addClass('is-invalid');
					}
				}else if (xhr.status == 401){
					var json=JSON.parse(xhr.responseText);
					console.log(json);

				}
			},
		});
	});
	ev.preventDefault();
})(jquery)
