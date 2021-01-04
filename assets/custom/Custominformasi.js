$(document).ready(function () {
	var url = $("body").attr('data-url');

	var tajuan = $("#tinfo").DataTable({
		"retrieve": true,
		"processing": true,
		"serverSide": true,
		"searching": true,
		"autoWidth": true,
		"order": [],
		"ajax": {
			url: url + 'informasi/show',
			type: 'POST',
		},
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	}
	);

	// save data
	$("#form-upload").on("submit", function (event) {
		event.preventDefault();
		var formitem = $(this).serialize();
		$.ajax({
			url: url + 'informasi/save',
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

	// update form
	$("#tinfo").on("click", ".detail-info", function () {
		var getID = $(this).attr('data-id');
		console.log(getID);
		$.ajax({
			url: url + 'informasi/get',
			type: 'POST',
			dataType: 'json',
			data: { id_informasi: getID },
			success: function (data) {
				console.log(data);
				$("#edit_id").val(data[0].data.id);
				$("#edit_judul").val(data[0].data.judul);
				$("#edit_isi").val(data[0].data.isi);
				if (data[0].data.status)
					$("#edit_status").append(`<option selected value="${data[0].data.status}">${data[0].data.status}</option>`);

				if (data[0].data.showmodal)
					$("#edit_isselected").append(`<option selected value="${data[0].data.showmodal}">${data[0].data.showmodal == 1 ? 'YA' : 'TIDAK'}</option>`);

				$(".updateinfo").modal('show');
			}
		})
	});


});
