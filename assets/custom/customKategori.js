$(document).ready(function () {
	var url = $("body").attr('data-url');

	showCategory();
	function showCategory() {
		var dataKategori = $("#dataKategori").DataTable({
			"processing": false,
			"serverSide": true,
			"retrieve": true,
			"searching": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				url: url + 'kategori/fetch',
				type: 'POST',
				data: {
					// filter_tahun: filter_tahun,
					// filter_prodi: filter_prodi,
					// filter_program: filter_program,
					// filter_kelas: filter_kelas
				}
			},
			"dom": "<'row '<'col-sm-3'li> <'col-sm-6'f>  <'col-sm-3'B>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
			buttons: {
				buttons: [{
					extend: 'excel',
					className: 'btn btn-sm btn-primary',
					text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
					title: 'Data Dokumen Llaporan'
				},
				{
					extend: 'pdf',
					className: 'btn btn-sm btn-success',
					text: '<span class="glyphicon glyphicon-cloud-download"></span> PDF',
					title: 'Data Dokumen Llaporan'
				},
				{
					extend: 'print',
					className: 'btn btn-sm btn-danger',
					text: '<span class="glyphicon glyphicon-print"></span> Print',
					title: 'Data Dokumen Llaporan'
				}
				]
			},
			"columnDefs": [{
				"targets": [1, 2, 3, 4, 5, 6],
				"orderable": true,
				"searchable": true
			}
			],
		});
	}

	$("#addDokumen").on("click", function () {
		$(".addDokumenModal").modal("show");
	});

	// $("#dataKategori").on("click", ".edit-dokumen", function () {
	// 	$(".editDokumenModal").modal("show");
	// });


	// tambah dokumen 
	$("#formdokumen").on("submit", function (e) {
		e.preventDefault();
		var dataDokumen = $(this).serialize();
		$.ajax({
			url: url + 'kategori/savedocument',
			type: 'POST',
			dataType: 'json',
			data: dataDokumen,
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location.reload();
					});
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					}).then(function () {
						window.location.reload();
					});
				}
			}
		})
	});

	// hapus dokumen 
	$("#dataKategori").on("click", ".hapus-dokumen", function () {
		const id = $(this).attr('data-id-dokumen');
		swal({
			title: `Yakin item dokumen ini akan dihapus ?`,
			text: "periksa dan pastikan terlebih dahulu data yang akan dihapus",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: url + 'kategori/deletedocument',
						type: 'POST',
						dataType: 'json',
						data: { idKategori: id },
						success: function () {
							window.location.reload();
						}
					});
				}
			})
	})

	$("#dataKategori").on("click", ".edit-dokumen", function () {
		const id = $(this).attr('data-id-dokumen');
		$.ajax({
			url: url + 'kategori/getDetailKategori',
			type: 'POST',
			dataType: 'json',
			data: { idKategori: id },
			success: function (data) {
				$("#ID_KATEGORI").val(data[0].data.ID_KATEGORI);
				$("#edit_kode").val(data[0].data.kode);
				$("#edit_kode_idx").val(data[0].data.kode_idx);
				$("#edit_nama_dokumen").val(data[0].data.NAMA_KATEGORI);
				$("#edit_jatuh_tempo").val(data[0].data.title);
				$("#edit_id_kelompok").append(`<option selected value="${data[0].data.id_kelompok}">${data[0].data.NAMA_KELOMPOK}</option>`);
				$("#edit_status").append(`<option selected value="${data[0].data.STATUS}">${data[0].data.STATUS}</option>`);
				$(".editDokumenModal").modal("show");
			}
		});

	})

	$("#formupdatedokumen").on("submit", function (e) {
		e.preventDefault();
		var frmUpdateDokument = $(this).serialize();
		$.ajax({
			url: url + 'kategori/updatedocument',
			type: 'POST',
			dataType: 'json',
			data: frmUpdateDokument,
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location.reload();
					});
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					}).then(function () {
						window.location.reload();
					});
				}
			}
		})
	})

});
