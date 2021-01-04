$(document).ready(function () {
	var url = $("body").attr('data-url');
	$("#datadokumenbidang").DataTable();
	$("#datadokumenbidang").on("click", ".updatedokumen", function () {
		var getID = $(this).attr('data-iddokumen');
		$.ajax({
			url: url + 'jenis/showModalUpdate',
			type: 'POST',
			dataType: 'json',
			data: { iddok: getID },
			success: function (data) {
				console.log(data[0].data.jenis);
				$("#edit_id_jenis").val(data[0].data.id_jenis);
				$("#edit_jenis").val(data[0].data.jenis);
				if (data[0].data.status)
					$("#edit_status").append(`<option selected value="${data[0].data.status}">${data[0].data.status}</option>`);
				$(".updatedokumens").modal('show');
			}
		})
	});


	// delete record
	$("#datadokumenbidang").on("click", ".delete-record", function () {
		var id = $(this).attr("data-iddokumen");
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
						url: url + 'jenis/delete',
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
	$("#frmjenis").on("submit", function (event) {
		event.preventDefault();
		console.log('tes');
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'jenis/save',
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
	$("#frmeditjenis").on("submit", function (event) {
		event.preventDefault();
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'jenis/update',
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
