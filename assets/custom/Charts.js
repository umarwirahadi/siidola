$(document).ready(function () {
	var url = $("body").attr('data-url');


	// chart ketepatan
	var data1 = $("#datatepatwaktu").val();
	var data2 = $("#dataterlambat").val();
	var data3 = $("#databelummengirim").val();
	var ctx = document.getElementById('pieketepatan').getContext('2d');
	var myDoughnutChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ["Tepat waktu", "terlambat,", "Belum mengirim"],
			datasets: [{
				label: 'Grafik ketepatan waktu pengiriman laporan',
				data: [data1, data2, data3],
				backgroundColor: [
					'green',
					'blue',
					'red'
				]
			}]
		}
	});


})
