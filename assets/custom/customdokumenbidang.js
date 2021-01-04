$(document).ready(function () {

	var url = $("body").attr('data-url');

	show_data();


	var counti = 0;

	$("#btn-filter").click(function () {
		var filter_tahun = $("#filter_tahun").val();
		var filter_bulan = $("#filter_bulan").val();
		var filter_dokumen = $("#filter_dokumen").val();
		var filter_status_dokumen = $("#filter_status_dokumen").val();
		var filter_puskesmas = $("#filter_puskesmas").val();
		$("#tb_ajuan").DataTable().destroy();
		show_data(filter_tahun, filter_bulan, filter_dokumen, filter_status_dokumen, filter_puskesmas)

	})

	$("#filter_dokumen_form").on("click", "#btn-reset", function (e) {
		e.preventDefault();
		$("#filter_dokumen_form")[0].reset();
		window.location.reload()
	})

	$('.status_dokumen').select2({
		placeholder: 'Pilih dokumen',
		allowClear: true
	});

	function show_data(filter_tahun = '', filter_bulan = '', filter_dokumen = '', filter_status_dokumen = '', filter_puskesmas = '') {
		var tajuan = $("#tb_ajuan").DataTable({
			"retrieve": true,
			"processing": true,
			"serverSide": true,
			"searching": true,
			"autoWidth": true,
			"order": [],
			"ajax": {
				url: url + 'documentbidang/showajuan',
				type: 'POST',
				data: {
					filter_tahun: filter_tahun,
					filter_bulan: filter_bulan,
					filter_dokumen: filter_dokumen,
					filter_status_dokumen: filter_status_dokumen,
					filter_puskesmas: filter_puskesmas,
				},
			},

			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		}
		);
	}


	$("#ttanggapan").on("click", "#tanggapan_file", function () {
		const id_dok = $(this).attr("data-iddok");
		$.ajax({
			url: url + 'documentbidang/modalTanggapan',
			type: 'post',
			data: { id_dokument: id_dok },
			dataType: 'json',
			success: function (data) {
				$("#tanggapan-files").html(data);
				$(".tanggapan").modal({ backdrop: false });
			}
		})
	});

	$("#btn_update").on("click", function (e) {
		e.preventDefault();
		const id = $("#_id").val();
		const status_dokumen = $("#status_dokumen").val();
		const desc = $("#editor1").val();
		console.log(id)
		$.ajax({
			url: url + 'documentbidang/updatetanggapan',
			type: 'post',
			data: { id: id, status_dokumen: status_dokumen, message: desc },
			dataType: 'json',
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(function () {
						window.location.href = 'documentbidang'
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					})
				}
			}
		}
		)
	})

	$("#apdet").on("click", function (e) {
		e.preventDefault();
		var id_ok1 = $("#id_dok").val();
		const tanggapan_file = $("#keterangan1").val();
		console.log(id_ok1);
		$.ajax({
			url: url + 'documentbidang/act_tanggapanfile',
			type: 'post',
			data: { id_dokk: id_ok1, ket: tanggapan_file },
			dataType: 'json',
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(() => {
						window.location.reload()
					})
				} else {
					swal({
						title: `Gagal`,
						text: data[0].pesan,
						icon: "warning",
					})
				}
			}
		}
		)
	});

	$("#btn_review").on("click", function () {
		const id = $(this).attr('data-id-document');
		$.ajax({
			url: url + 'documentbidang/review',
			method: 'POST',
			data: { id_document: id },
			dataType: 'json',
			success: function (res) {
				if (res.status === 0) {
					$(".form-review-lap").modal({ backdrop: false });
					$("#id_dokumen_for_review").val(id);
				} else {
					$("#data_item_review").children().remove();
					var content = '';
					var status = '';
					var no = 1;
					for (let i = 0; i < res.data.length; i++) {
						if (res.data[i].status_penilaian == "ya") {
							content += '<tr>' +
								'<td>' +
								'<span class="label label-primary">' + res.data[i].indikator_penilaian + '</span>' +
								'<input class="form-control" type="hidden" id="isi" name="item' + no + '" value="' + res.data[i].indikator_penilaian + '" readonly>' +
								'</td>' +
								'<td>' +
								'<input type="radio" name="status' + no + '" id="status" value="ya" checked><label for="ya" class="text text-primary">Ya</label>' +
								'<input type="radio" name="status' + no + '" id="status" value="tidak" ><label for="tidak" class="text text-danger">Tidak</label>' +
								'</td>' +
								'<td>' +
								'<textarea name="comment' + no + '" cols="20" rows="1" class="form-control">' + res.data[i].comment + '</textarea>' +
								'</td>' +
								'</tr>';
						} else {
							content += '<tr>' +
								'<td>' +
								'<span class="label label-primary">' + res.data[i].indikator_penilaian + '</span>' +
								'<input class="form-control" type="hidden" id="isi" name="item' + no + '" value="' + res.data[i].indikator_penilaian + '" readonly>' +
								'</td>' +
								'<td>' +
								'<input type="radio" name="status' + no + '" id="status" value="ya" ><label for="ya" class="text text-primary">Ya</label>' +
								'<input type="radio" name="status' + no + '" id="status" value="tidak" checked><label for="tidak" class="text text-danger">Tidak</label>' +
								'</td>' +
								'<td>' +
								'<textarea name="comment' + no + '" cols="20" rows="1" class="form-control">' + res.data[i].comment + '</textarea>' +
								'</td>' +
								'</tr>';
						}
						no = no + 1
					}
					$("#data_item_review").html(content);
					$("#id_dokumen_for_review").val(id);
					$("#id_jenis_proses").val(1);
					$("#btn_proses_review").text('Update');
					$(".form-review-lap").modal({ backdrop: false });
				}
			}
		})
	});

	$("#loging").on("click", function () {
		const id = $(this).attr('data-id-document');
		$.ajax({
			url: url + 'documentbidang/logactivity',
			method: 'post',
			dataType: 'json',
			data: { id_dok: id },
			success: function (data) {
				var isi = '';
				for (let i = 0; i < data.length; i++) {
					isi += `<li><div class="block">` +
						`<div class="block_content">` +
						`<h2 class="title"><a>${data[i].catatan} oleh ${data[i].nama_lengkap}</a></h2>` +
						`<div class="byline"> ` +
						`<span> pada tanggal ${data[i].date}</span></div></div></li>`
				}
				$("#list-timeline").html(isi);
				$(".form-log").modal({ backdrop: false });
			}
		})


	});

	$('#hapus-dokumen').on('click', function () {
		const id = $(this).attr('data-id-document');
		// const judul = $(this).parent().parent().find('td:eq(1)').text();
		const judul = $("#nama_dokumen").val();

		swal({
			title: `Yakin data ${judul} akan dihapus ? `,
			text: "Pastikan dan periksa data yang akan dihapus benar",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: url + 'documentbidang/delete',
					data: { iddok: id },
					dataType: 'json',
					success: function (a) {
						window.location.href = url + 'documentbidang'
					}
				});
			}
		})
	});
	$('#tb_ajuan').on("click", "#hapus-dokumen2", function () {
		const id = $(this).attr('data-id-document');
		const judul = $(this).parent().parent().find('td:eq(1)').text();
		swal({
			title: `Yakin data ${judul} akan dihapus ? `,
			text: "Pastikan dan periksa data yang akan dihapus benar",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: url + 'documentbidang/delete',
					data: { iddok: id },
					dataType: 'json',
					success: function () {
						window.location.href = url + 'documentbidang'
					}
				});
			}
		})
	});


	$("#tb_ajuan").on("click", ".review-doc", function () {
		const id_laporan = $(this).attr('id');
	});

	$("#form_review").on("submit", function (e) {
		e.preventDefault();
		var formRev = $(this).serialize();
		$.ajax({
			url: url + 'document/proccessReview',
			data: formRev,
			type: 'post',
			dataType: 'json',
			success: function (data) {
				if (data[0].status === 1) {
					swal({
						title: `Sukses`,
						text: data[0].pesan,
						icon: "success",
					}).then(() => {
						window.location.href = url + 'document'
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
	})
})
