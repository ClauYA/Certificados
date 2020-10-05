</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/summernote/summernote-lite.js');?>"></script>
<script>
	$('#summernote').summernote({
		placeholder: 'Por su participación en condición de Tipo participante ' +
				'en el taller de "Evento", realizado en la ciudad de La Paz,' +
				' del 27 de julio al 5 de agosto de 2020. En sesiones virtuales con una duración' +
				' de 20 horas académicas. En cuanto se certifica en honor a la verdad.',
		tabsize: 2,
		height: 120,
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'clear']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video']],
			['view', ['fullscreen', 'codeview', 'help']]
		]
	});
</script>
<!-- jQuery Plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/jquery.fancybox.min.js' );?>"></script>
</body>
</html>
