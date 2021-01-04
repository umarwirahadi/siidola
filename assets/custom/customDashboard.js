$(document).ready(function () {
	var url = $("body").attr('data-url');

	$(window).on('load', function () {
		const status_modal = parseInt($("#showmodal").attr("data-id"));
		if (status_modal === 1) {
			setTimeout(function () {
				$('.addInfo').modal('show')
			}, 2000)
		}
	});
});
