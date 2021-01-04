$(document).ready(function () {
	var url = $("body").attr('data-url');

	// load table puskesmas-dinas
	$("#data-puskesmas").DataTable();

	// simpan data intansi 
	$("#form-addintansi").on("submit", function (e) {
		e.preventDefault();
		var frmdataintansi = $(this).serialize();
		$.ajax({
			url: url + 'users/saveintansi',
			type: 'POST',
			dataType: 'json',
			data: frmdataintansi,
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location.reload();
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					}).then(function () {
						window.location.reload();
					})
				}
			}
		});
	});



	//hapus data puskesmas dan dinas
	$("#data-puskesmas").on("click", ".delete-record-pkm", function () {
		const id = $(this).attr('data-idintansi');
		swal({
			title: `Yakin intansi ini akan dihapus ?`,
			text: "periksa dan pastikan terlebih dahulu data yang akan dihapus",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: url + 'users/deleteintansi',
						type: 'POST',
						dataType: 'json',
						data: { id_intansi: id },
						success: function () {
							window.location.reload();
						}
					});
				}
			})
	});

	$("#data-puskesmas").on("click", ".update-record-pkm", function () {
		const id = $(this).attr('data-idintansi');
		$.ajax({
			url: url + 'users/getDetailIntansi',
			type: 'POST',
			dataType: 'json',
			data: { id_intansi: id },
			success: function (data) {
				$("#edit_id_intansi").val(data[0].data.id_intansi);
				$("#edit_jenis").append(`<option selected value="${data[0].data.jenis}">${data[0].data.jenis}</option>`);
				$("#edit_nama_intansi").val(data[0].data.nama_intansi);
				$("#edit_alamat").val(data[0].data.alamat);
				$("#edit_email").val(data[0].data.email);
				$("#edit_telp").val(data[0].data.telp);
				$("#edit_hp").val(data[0].data.hp);
				$("#edit_fax").val(data[0].data.fax);
				$("#edit_website").val(data[0].data.website);
				$("#edit_status").append(`<option selected value="${data[0].data.status}">${data[0].data.status}</option>`);
			}
		}).then(function () {
			$(".UpdatePuskesmasDinas").modal('show');
		})
	});

	$("#form-updateintansi").on("submit", function (e) {
		e.preventDefault();
		var formdataintansi = $(this).serialize();
		$.ajax({
			url: url + 'users/updateintansi',
			type: 'POST',
			dataType: 'json',
			data: formdataintansi,
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


	$("#logOutUser").on("click", function () {
		swal({
			title: `Yakin anda akan keluar ?`,
			text: "sesi anda akan berakhir setelah menekan tombol ok",
			icon: "warning",
			buttons: true,
			dangerMode: false,
		}).then((willAprove) => {
			if (willAprove) {
				window.location.href = 'users/logout';
				// $.post(url + 'users/logout', function (data) {
				// 	window.location = 'login';
				// });
			}
		})
	});


	// $(".add-user-modal").on("click", function () {
	// 	$.ajax({
	// 		url: url + 'users/add',
	// 		type: 'post',
	// 		dataType: 'json',
	// 		success: function (data) {
	// 			$(".form-modal").html(data);
	// 		}
	// 	}).done(function () {
	// 		// $(".").modal({ backdrop: false });
	// 		$(".addUsers").modal("show");
	// 	})
	// })

	$("#form-adduser").on("submit", function (e) {
		e.preventDefault();
		// var dataupload = new FormData($('form')[0]);
		var dataupload = new FormData(this);
		$.ajax({
			url: url + 'users/save',
			type: 'POST',
			dataType: 'json',
			data: dataupload,
			processData: false,
			contentType: false,
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location = url + 'users';
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					}).then(function () {
						window.location = url + 'users';
					})
				}
			}
		});
		// $.ajax({
		// 	url: url + 'users/add',
		// 	type: 'post',
		// 	dataType: 'json',
		// 	success: function (data) {
		// 		$(".form-modal").html(data);
		// 	}
		// }).done(function () {
		// 	// $(".").modal({ backdrop: false });
		// 	$(".addUsers").modal("show");
		// })
	})


	// $("#save-users").on("click", function (e) {
	// 	e.preventDefault();
	// 	var dataupload = new FormData(this);

	// 	$.ajax({
	// 		url: url + 'users/save',
	// 		type: 'POST',
	// 		dataType: 'json',
	// 		data: dataupload,
	// 		processData: false,
	// 		contentType: false,
	// 		success: function (res) {
	// 			console.log(res);
	// 		}
	// 	});
	// })

	$("#form-profile").on("submit", function (e) {
		e.preventDefault();
		var data_user = $(this).serialize();
		$.ajax({
			url: url + 'users/updateprofile',
			type: 'post',
			data: data_user,
			dataType: 'json',
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location = 'profile';
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					}).then(function () {
						window.location = 'profile';
					})
				}

			}
		});

	})

	$("#change-pass").on("submit", function (e) {
		e.preventDefault();
		var formChangePass = $(this).serialize();
		$.ajax({
			url: url + 'users/updatePass',
			type: 'post',
			data: formChangePass,
			dataType: 'json',
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location = 'logout';
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					}).then(function () {
						window.location = 'changepassword';
					})
				}

			}
		});
	})


})
