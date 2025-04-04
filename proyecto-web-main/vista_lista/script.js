$(document).ready(function () {
	document.title = "Lista de Convenios";
	
	// DataTable initialization
	var table = $("#example").DataTable({
		dom: '<"dt-top"<"dt-length"l><"dt-buttons-container"B><"dt-search"f>>rt<"dt-bottom"ip>',
		responsive: true,
		language: {
			url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
		},
		buttons: [
			// 'copy' button removed
			'excel',
			'pdf',
			'print'
		]
	});
});
