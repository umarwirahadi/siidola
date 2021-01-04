$(document).ready(function () {
	var url = $("body").attr('data-url');

	$("#btn-filter").click(function () {
		var filter_tahun = $("#filter_tahun").val();
		var filter_bulan = $("#filter_bulan").val();
		var filter_dokumen = $("#filter_dokumen").val();
		var filter_status_dokumen = $("#filter_status_dokumen").val();
		$("#tblaporandisetujui").DataTable().destroy();
		show_data(filter_tahun, filter_bulan, filter_dokumen, filter_status_dokumen)

	})

	$("#filter_dokumen_form").on("click", "#btn-reset", function (e) {
		e.preventDefault();
		$("#filter_dokumen_form")[0].reset();
		window.location.reload()
	})

	show_data();

	function show_data(filter_tahun = '', filter_bulan = '', filter_dokumen = '', filter_status_dokumen = '') {

		var laporanDokumen = $("#tblaporandisetujui").DataTable({
			"retrieve": true,
			"processing": true,
			"serverSide": true,
			"searching": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				url: url + 'laporanbidang/show',
				type: 'POST',
				data: {
					filter_tahun: filter_tahun,
					filter_bulan: filter_bulan,
					filter_dokumen: filter_dokumen,
					filter_status_dokumen: filter_status_dokumen
				}
			},
			"dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
			buttons: {
				buttons: [{
					extend: 'excel',
					className: 'btn btn-sm btn-success',
					text: '<i class="fa fa-file-excel-o"></i> Excel',
					title: 'Data dokumen'
				}
				]
			},
			"columnDefs": [{
				"targets": [1, 2, 3, 4, 5, 6],
				"orderable": true,
				"searchable": true
			}
			],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		});
	}


	$("#tblaporandisetujui").on("click", ".detail-lap", function () {
		var iddokumen = $(this).attr('data-iddok');
		$.ajax({
			url: url + 'laporanbidang/getDetail',
			method: 'post',
			dataType: 'json',
			data: { id_document: iddokumen },
			success: function (res) {
				console.log(res);
				if (res.status == 1) {
					var content = '';
					var no = 1;
					for (let i = 0; i < res.data.length; i++) {
						content += '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + res.data[i].file_name + '</td>' +
							'<td><a href="' + url + 'laporanbidang/download/' + res.data[i].file_name + '" class=" ">Download</a></td>' +
							'</tr>';
						no++
					}
				} else {
					console.log(res.pesan)
				}
				$("#data_files").html(content);
				$(".formDetailLap").modal({ backdrop: false });
			}

		})
	})
})
