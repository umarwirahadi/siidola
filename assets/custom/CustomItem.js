$(document).ready(function () {
	var url = $("body").attr('data-url');

	var tbitem = $("#master-item").DataTable({
		"processing": true,
		"serverSide": true,
		"searching": true,
		"autoWidth": false,
		"order": [],
		"ajax": {
			url: url + 'items/fetch',
			type: 'POST',
			data: {
				// filter_tahun: filter_tahun,
				// filter_prodi: filter_prodi,
				// filter_program: filter_program,
				// filter_kelas: filter_kelas
			}
		},
		"dom": "<'row '<'col-md-3'li> <'col-md-6'f>  <'col-lg-2'B>>    <'row'<'col-md-12'tr>>    <'row'<'col-md-12'p>>",
		buttons: {
			buttons: [{
				extend: 'excel',
				className: 'btn btn-round btn-primary',
				text: '<span class="glyphicon glyphicon-floppy-save"></span> export to excel',
				title: 'master item'
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

	// show form add 	
	$("#addItem").on("click", function () {
		$(".addformitem").modal('show');
	});

	$("#master-item").on("click", ".edit-item", function () {
		var id = $(this).attr("data-id-item");
		$.ajax({
			url: url + 'items/showModalUpdate',
			type: 'POST',
			dataType: 'json',
			data: { iditem: id },
			success: function (data) {
				$("#edit_jenis").append(`<option selected value="${data[0].data.nama_kategori}">${data[0].data.nama_kategori}</option>`);
				$("#edit_ID").val(data[0].data.ID);
				$("#edit_namaitem").val(data[0].data.namaitem);
				$("#edit_keterangan").val(data[0].data.keterangan);
				$("#edit_TglBerlaku").val(data[0].data.TglBerlaku);
				$("#edit_status").append(`<option selected value="${data[0].data.status}">${data[0].data.status}</option>`);
				$(".updateformitem").modal("show");
			}
		});

	})

	// delete record
	$("#master-item").on("click", ".hapus-item", function () {
		var id = $(this).attr("data-id-item");
		swal({
			title: `Yakin data item ini akan dihapus ?`,
			text: "periksa dan pastikan terlebih dahulu data yang akan dihapus",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: url + 'items/delete',
						type: 'POST',
						dataType: 'json',
						data: { iditem: id },
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
					});
				}
			})
	})


	// save data
	$("#form-addintansi").on("submit", function (event) {
		event.preventDefault();
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'items/save',
			method: 'post',
			data: formitem,
			dataType: 'json',
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
		});
	});

	// update data
	$("#form-updateitem").on("submit", function (event) {
		event.preventDefault();
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'items/update',
			method: 'post',
			data: formitem,
			dataType: 'json',
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
		});
	});

});
