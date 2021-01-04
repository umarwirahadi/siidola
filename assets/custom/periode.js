$(document).ready(function () {
	var url = $("body").attr('data-url');
	$("#datatahunlaporan").DataTable();
	$("#datatahunlaporan").on("click", ".updatetahunlaporan", function () {
		var getID = $(this).attr('data-idperiode');
		$.ajax({
			url: url + 'periode/showModalUpdate',
			type: 'POST',
			dataType: 'json',
			data: { iddok: getID },
			success: function (data) {
				$("#edit_id").val(data[0].data.id);
				$("#edit_tahun").val(data[0].data.tahun);
				// $("#edit_status").val(data[0].data.status);
				// $("#edit_isselected").val(data[0].data.isselected);
				if (data[0].data.status)
					$("#edit_status").append(`<option selected value="${data[0].data.status}">${data[0].data.status == 1 ? 'YA' : 'TIDAK'}</option>`);

				if (data[0].data.status)
					$("#edit_isselected").append(`<option selected value="${data[0].data.isselected}">${data[0].data.isselected == 1 ? 'YA' : 'TIDAK'}</option>`);

				$(".updatedokumens").modal('show');
			}
		})
	});


	// delete record
	$("#datatahunlaporan").on("click", ".delete-record", function () {
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
						url: url + 'periode/delete',
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
	$("#formperiode").on("submit", function (event) {
		event.preventDefault();
		console.log('tes');
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'periode/save',
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
	$("#formeditperiode").on("submit", function (event) {
		event.preventDefault();
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'periode/update',
			method: 'post',
			data: formitem,
			dataType: 'json',
			success: function (data) {
				console.log(data);
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
