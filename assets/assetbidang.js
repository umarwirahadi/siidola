$(document).ready(function () {
	var url = $("body").attr('data-url');
	const namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

	var counti = 0;

	$("#resetform").on("click", function () {
		$("#form-upload")[0].reset();
		$(".jenis").select2({ allowClear: true });
		$(".tahun").select2({ allowClear: true });
		$(".bulan").select2({ allowClear: true });
	})



	$("#data-file").on("click", ".remove", function () {
		$(this).parent().parent().remove();
		//alert('test');
	})

	// tambah upload file untuk dinamis component
	$("#tambahDokumen").on("click", function () {
		counti += 1;
		$("#file1:last").before(`<div class="item form-group" id="file${counti}">` +
			`<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Dokumen <button type="button" class="btn btn-sm btn-danger remove"><i class="fa fa-times"></i></button></label>` +
			`<div class="col-md-9 col-sm-9 ">` +
			`<input type="file" name="file_source[]" class="form-control">` +
			`</div>` +
			`</div>`);
	})

	// upload form
	$("#form-upload").on("submit", function (e) {
		e.preventDefault();
		var dataupload = new FormData(this);
		$.ajax({
			url: url + 'uploadbidang/do_upload',
			type: 'POST',
			dataType: 'json',
			data: dataupload,
			processData: false,
			contentType: false,
			success: function (res) {
				showDraft();
				for (let index = 0; index < res.length; index++) {
					if (res[index].status === 0) {
						new PNotify({
							// title: 'Error',
							text: res[index].pesan,
							type: 'error',
							styling: 'bootstrap3'
						});
					} else {
						new PNotify({
							// title: 'success',
							text: res[index].pesan,
							type: 'success',
							styling: 'bootstrap3'
						});
					}
				}
			}
		}).done(function () {
			$(".addFormupload").modal('toggle');
			setTimeout(function () {
				window.location.reload()
			}, 1000)
			// console.log('proses close');
		})
	})



	$('.jenis').select2({
		placeholder: 'Pilih dokumen',
		allowClear: true
	});
	// $('.kategori').select2({placeholder:'Pilih item'});
	$('.tahun').select2({
		placeholder: 'Pilih Tahun',
		allowClear: true
	});
	$('.bulan').select2({
		placeholder: 'Pilih Bulan',
		allowClear: true
	});



	showDraft();
	showAjuan();
	showDisetujui();

	function showDisetujui() {
		$.ajax({
			url: url + 'uploadbidang/showdisetujui',
			type: 'get',
			async: true,
			dataType: 'json',
			success: function (result) {
				$("#jml3").html(result.length);
				console.log(result);
				if (result.length > 0) {
					var html = '';
					var i = 0;
					var no = 1;
					for (i; i < result.length; i++) {
						var jatuh_tempo = new Date(result[i].duedate)
						var jatuh_tempo1 = jatuh_tempo.getDate() + ' ' + namaBulan[jatuh_tempo.getMonth()] + ' ' + jatuh_tempo.getFullYear()
						html += '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + result[i].jenis + '</td>' +
							'<td>' + namaBulan[result[i].bulan] + ' ' + result[i].tahun + '</td>' +
							'<td>' + result[i].created + '</td>' +
							'<td>' + result[i].tanggapan + '</td>' +
							'<td>' +
							'<a href="uploadbidang/detailajuan/' + result[i].id + '" class="btn btn-sm btn-primary view-detail-ajuan" title="Detail dokumen"><i class="fa fa-eye"></i></a>' +
							'<a href = "javascript:void(0)" class="btn btn-sm btn-danger" id ="' + result[i].id + '" title ="log proses dokumen" > <i class="fa fa-recycle"></i></a> ' +
							'</td>' +
							'</tr>';
						no++;
					}
				}
				console.log(html);
				$("#tbdisetujui").html(html);
			}
		}).done(function () {
			$("#tb_disetujui").DataTable({
				retrieve: true,
				searching: true,
				paging: true,
				"dom": "<'row '<'col-sm-3'li> <'col-sm-6'>  <'col-sm-3'fB>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
				buttons: {
					buttons: [{
						extend: 'excel',
						className: 'btn btn-sm btn-primary',
						text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
						title: 'Data dokumen'
					}
					]
				}
			});
		})
	}

	// show datadraft
	function showDraft() {
		$.ajax({
			url: url + 'uploadbidang/showDraft',
			type: 'get',
			async: true,
			dataType: 'json',
			success: function (result) {
				$("#jml1").html(result.length);
				if (result.length > 0) {
					var html = '';
					var i = 0;
					var no = 1;
					for (i; i < result.length; i++) {
						html += '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + result[i].jenis + '</td>' +
							'<td>' + namaBulan[result[i].bulan] + ' ' + result[i].tahun + '</td>' +
							'<td>' + result[i].created + '</td>' +
							'<td>' + result[i].nama_status + '</td>' +
							'<td>' + result[i].keterangan + '</td>' +
							'<td>' +
							'<a href="javascript:void(0)" data-id="' + result[i].id + '" id="' + result[i].id + '" class="btn btn-sm btn-primary view-detail" title = "Detail dokumen" > <i class="fa fa-eye"></i></a >' +
							'<a href="javascript:void(0)" data-id-dok="' + result[i].id_document + '" id="' + result[i].id + '" class="btn btn-sm btn-success ajukan" title="kirim dokumen"><i class="fa fa-paper-plane"></i></a>' +
							'<a href="javascript:void(0)" data-id="' + result[i].id + '" id="' + result[i].id + '" class="btn btn-sm btn-danger delete-item" title="Hapus dokumen"><i class="fa fa-trash"></i></a>' +
							'</td>' +
							'</tr>';
						no++;
					}
				}
				$("#tbdraft").html(html);
			}
		}).done(function () {
			$("#draftTable").DataTable({
				retrieve: true,
				searching: false,
				paging: true
			});
		})
	}

	// show ajuan
	function showAjuan() {
		$.ajax({
			url: url + 'uploadbidang/showajuan',
			type: 'get',
			async: true,
			dataType: 'json',
			success: function (result) {
				$("#jml2").html(result.length);
				if (result.length > 0) {
					var html = '';
					var i = 0;
					var no = 1;
					for (i; i < result.length; i++) {
						var bln = namaBulan[result[i].bulan] + ' ' + result[i].tahun;
						html += '<tr class="even pointer">' +
							'<td>' + no + '</td>' +
							'<td>' + result[i].jenis + '</td>' +
							'<td>' + bln + '</td>' +
							'<td>' + result[i].created + '</td>' +
							'<td>' + result[i].nama_status + '</td>' +
							'<td>' + result[i].tanggapan + '</td>' +
							'<td>' +
							'<a href="uploadbidang/detailajuan/' + result[i].id + '" class="btn btn-sm btn-primary view-detail-ajuan" title="Detail dokumen"><i class="fa fa-eye"></i></a>' +
							'<a href = "javascript:void(0)" class="btn btn-sm btn-danger" id ="' + result[i].id + '" title ="log proses dokumen" > <i class="fa fa-recycle"></i></a> ' +
							'</td >' +
							'</tr >';
						no++;
					}
				}
				$("#tbajuan").html(html);
			}
		}).done(function () {
			$("#tb_ajuan").DataTable({
				retrieve: true,
				"dom": "<'row '<'col-sm-3'li> <'col-sm-6'>  <'col-sm-3'fB>>    <'row'<'col-sm-12'tr>>    <'row'<'col-sm-12'p>>",
				buttons: {
					buttons: [{
						extend: 'excel',
						className: 'btn btn-sm btn-primary',
						text: '<span class="glyphicon glyphicon-download-alt"></span> Excel',
						title: 'Data dokumen'
					}
					]
				}

			});
		})
	}


	// selected data row from draft table for edit document
	$("#tbdraft").on("click", ".view-detail", function () {
		var id = $(this).attr('id');
		$.ajax({
			url: url + 'uploadbidang/getDetail',
			type: 'post',
			data: { id: id },
			dataType: 'json',
			success: function (data) {
				const bln = namaBulan[data[0].data.bulan - 1]
				$('#edit_iddok').val(id);
				$('#edit_id_document').val(data[0].data.id_document);
				$('#edit_jenis').val(data[0].data.jenis);
				$('#edit_tahun').val(data[0].data.tahun);
				$('#edit_bulan').val(namaBulan[data[0].data.bulan]);
				$('#edit_created').val(data[0].data.created);
				$("#edit_keterangan").val(data[0].data.keterangan);
				if (data[1].status === 1) {
					const dataArray = data[1].data2;
					var no = 1;
					var html = '';
					for (let index = 0; index < dataArray.length; index++) {
						html += '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + dataArray[index].file_name + '</td>' +
							'<td><button type="button" class="btn btn-sm btn-danger deletedoc" id="' + dataArray[index].id + '"><i class="fa fa-remove"></i></button></td>' +
							'</tr>';
						no++;
					}
					$("#content-file").html(html);
				} else {
					const rowempty = "<tr><td colspan='3'><span class='badge badge-danger'>belum ada dokumen yang diupload</span></td></tr>"
					$("#content-file").html(rowempty);
				}
				$(".uploadFormupload").modal('show');
			}
		})
	});


	// selected data row from draft table for edit document
	$("#tbdraft").on("click", ".view-detail-ajuan", function () {
		var id = $(this).attr('id');
		$.ajax({
			url: url + 'uploadbidang/getDetail',
			type: 'post',
			data: { id: id },
			dataType: 'json',
			success: function (data) {
				console.log(data);
				const bln = namaBulan[data[0].data.bulan - 1]
				$('#iddok').val(id);
				$('#id_document').val(data[0].data.id_document);
				$('#edit_jenis').val(data[0].data.jenis);
				$('#edit_tahun').val(data[0].data.tahun);
				$('#edit_bulan').val(data[0].data.bulan);
				$('#edit_created').val(data[0].data.created);
				$("#edit_keterangan").val(data[0].data.keterangan);
				if (data[1].status === 1) {
					const dataArray = data[1].data2;
					var no = 1;
					var html = '';
					for (let index = 0; index < dataArray.length; index++) {
						html += '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + dataArray[index].file_name + '</td>' +
							'<td><button type="button" class="btn btn-sm btn-danger deletedoc" id="' + dataArray[index].id + '"><i class="fa fa-remove"></i></button></td>' +
							'</tr>';
						no++;
					}
					$("#content-file").html(html);
				} else {
					const rowempty = "<tr><td colspan='3'><span class='badge badge-danger'>belum ada dokumen yang diupload</span></td></tr>"
					$("#content-file").html(rowempty);
				}
				$(".uploadFormupload").modal('show');
			}
		})
	});

	// ajukan dokumen
	$("#tbdraft").on("click", ".ajukan", function () {
		var id = $(this).attr("id");
		var iddoc = $(this).attr("data-id-dok");
		swal({
			title: `Yakin dokumen ini akan dikirim ?`,
			text: "Pastikan format dan data yang akan dikirim sudah benar",
			icon: "success",
			buttons: true,
			dangerMode: false,
		}).then((willAprove) => {
			if (willAprove) {
				$.ajax({
					type: "POST",
					url: url + 'uploadbidang/ajukan',
					data: { id: id, id_document: iddoc },
					dataType: 'json',
					success: function (res) {
						if (res[0].status === 1) {
							new PNotify({
								// title: 'success',
								text: res[0].pesan,
								type: 'success',
								styling: 'bootstrap3'
							})
						}
						else {
							swal({
								title: 'dokumen gagal dikirim',
								text: res[i].pesan,
								icon: 'error'
							});
						}
						setTimeout(() => {
							window.location.reload()
						}, 2000)
					}
				});
			}
		})
	});

	$('#tbdraft').on('click', '.delete-item', function () {
		const id = $(this).attr('id');
		const judul = $(this).parent().parent().find('td:eq(1)').text();
		swal({
			title: `Yakin data ${judul} akan dihapus ?`,
			text: "Pastikan dan periksa data yang akan dihapus benar",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: url + 'uploadbidang/delete',
					data: { iddok: id },
					dataType: 'json',
					success: function (res) {
						showDraft();
						for (let i = 0; i < res.length; i++) {
							if (res[i].status === 1) {
								new PNotify({
									//title: 'success',
									text: res[i].pesan,
									type: 'success',
									styling: 'bootstrap3'
								});
							} else {
								new PNotify({
									// title: 'error',
									text: res[i].pesan,
									type: 'error',
									styling: 'bootstrap3'
								});
							}
						}
					}
				});
			}
		})
	});

	// selected data row from ajuan table for review document
	$("#tb_ajuan").on("click", ".review-doc", function () {
		var id = $(this).attr('id');
		$.ajax({
			url: url + 'uploads/getDetail',
			type: 'post',
			data: { id: id },
			dataType: 'json',
			success: function (data) {
				const bln = namaBulan[data[0].data.bulan - 1]
				$('#iddok').val(id);
				$('#id_document').val(data[0].data.id_document);
				$('#edit_kategori').val(data[0].data.document_name);
				$('#edit_kelompok').val(data[0].data.NAMA_KELOMPOK);
				$('#edit_tahun').val(data[0].data.tahun);
				$('#edit_bulan').val(bln);
				$('#edit_jtuhtempo').val(data[0].data.duedate);
				$("#edit_keterangan").val(data[0].data.keterangan);
				if (data[1].status === 1) {
					const dataArray = data[1].data2;
					var no = 1;
					var html = '';
					for (let index = 0; index < dataArray.length; index++) {
						html += '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + dataArray[index].file_name + '</td>' +
							'<td><button type="button" class="btn btn-sm btn-danger deletedoc" id="' + dataArray[index].id + '"><i class="fa fa-remove"></i></button></td>' +
							'</tr>';
						no++;
					}
					$("#content-file").html(html);
				} else {
					const rowempty = "<tr><td colspan='3'><span class='badge badge-danger'>belum ada dokumen yang diupload</span></td></tr>"
					$("#content-file").html(rowempty);
				}
				$(".form-review-doc").modal('show');
			}
		})
	});



	// tombol delete pada modal detail dokumen
	$("#content-file").on("click", ".deletedoc", function () {
		var iddoc = $(this).attr("id");
		swal({
			title: `Yakin lampiran dokumen akan dihapus ?`,
			text: "Pastikan dan periksa data yang akan dihapus benar",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: url + 'uploadbidang/deletedocument',
					data: { iddok: iddoc },
					dataType: 'json',
					success: function (res) {
						$("#" + iddoc).parent().parent().remove();
						for (let i = 0; i < res.length; i++) {
							if (res[i].status === 1) {
								new PNotify({
									// title: 'success',
									text: res[i].pesan,
									type: 'success',
									styling: 'bootstrap3'
								});
							} else {
								new PNotify({
									// title: 'error',
									text: res[i].pesan,
									type: 'error',
									styling: 'bootstrap3'
								});
							}
						}
					}
				});
			}
		})
	});

	// tombol ubah untuk perbaikan file 
	$("#tableLampiran").on("click", ".show-perbaikan", function () {
		var id = $(this).attr('data-idfile');
		$.ajax({
			url: url + 'uploadbidang/perbaikan_file',
			type: 'post',
			data: { idfile: id },
			dataType: 'json',
			success: function (data) {
				// console.log(data[0].data.file_name);
				$('#idfile').val(data[0].data.id);
				$('#id_document').val(data[0].data.id_document);
				$('#file_name').val(data[0].data.file_name);
				$('#file_type').val(data[0].data.file_type);
				$('#file_size').val(data[0].data.file_size);
				$('#desc').val(data[0].data.deskripsi);
				$('#keterangan').val(data[0].data.catatan_perbaikan);
				$(".addFormPerbaikanFile").modal('show');
			}
		});
	});


	//aksi perbaikan file PKM
	$("#form-perbaikan-file").on("submit", function (e) {
		e.preventDefault();
		var perbaikanfile = new FormData(this);
		$.ajax({
			url: url + 'uploadbidang/upload_perbaikan_file',
			type: 'POST',
			dataType: 'json',
			data: perbaikanfile,
			processData: false,
			contentType: false,
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						location.reload();
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					})
				}
			}
		})
			.done(function () {
				// $(".addFormPerbaikanFile").modal('toggle');
				// location.reload();
			})
	});

	$("#update_perbaikan_form").on("click", function () {
		const a = $("#id_laporan").val();
		const b = $("#id_dokumen").val();
		const c = $("#keterangan1").val();
		$.ajax({
			url: url + 'uploadbidang/update_status_perbaikan',
			type: 'post',
			data: { ket: c, idlaporan: a, id_dok: b },
			dataType: 'json',
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						// location.reload();
						window.location.href = url + 'uploadbidang'
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					})
				}
			}
		})
		// swal('tesss' + a);
	});



	//button tambah dokumen pada mode detail/update dokument
	$("#tambahDokumen_update").on("click", function () {
		var ad_html = '';
		ad_html += '<tr>' +
			'<td colspan="2"><input type="file" name="file_update[]" /></td>' +
			'<td><button type="button" class="btn btn-sm btn-danger deletedoc" id="123"><i class="fa fa-remove"></i></button></td>' +
			'</tr>';
		console.log(ad_html);
		$("#content-file").append(ad_html);
	});

	//tombol update dokumen
	$("#form-upload-update").on("submit", function (e) {
		e.preventDefault();
		var dataupload = new FormData(this);
		$.ajax({
			url: url + 'uploadbidang/do_upload_update',
			type: 'POST',
			dataType: 'json',
			data: dataupload,
			processData: false,
			contentType: false,
			success: function (res) {
				showDraft();
				for (let index = 0; index < res.length; index++) {
					if (res[index].status === 0) {
						new PNotify({
							// title: 'Error',
							text: res[index].pesan,
							type: 'error',
							styling: 'bootstrap3'
						});
					} else {
						new PNotify({
							// title: 'success',
							text: res[index].pesan,
							type: 'success',
							styling: 'bootstrap3'
						});
					}

				}


			}

		}).done(function () {
			$(".uploadFormupload").modal('toggle');
			console.log('proses close');
		})
	})





})
