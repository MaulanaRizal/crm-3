// var daftar;
$('#daftar').ready(function () {
	// daftar = document.getElementById('activityContent');
	$('#tableActivity').show();
	$('#formActivity').hide();
	$('#formTelepon').hide();
	return false;

});
$('#instruksi').click(function () {
	console.log('instruksi');
	// $('#activityContent').html(show);
	$('#tableActivity').hide();
	$('#formActivity').show();
	$('#formTelepon').hide();

	return false;
});
$('#daftar').click(function () {
	console.log('daftar');
	// $('#activityContent').html(show);
	$('#tableActivity').show();
	$('#formActivity').hide();
	$('#formTelepon').hide();

	return false;
});
$('#telepon').click(function () {
	console.log('daftar');
	// $('#activityContent').html(show);
	$('#tableActivity').hide();
	$('#formActivity').hide();
	$('#formTelepon').show();
	return false;
});
// jquery panel activity

// $(document).ready(function () {
// 	$('.table-deskripsi').hide();
// 	var status = [];
// 	$('.show-deskripsi').click(function () {
// 		var show = $(this).index('.show-deskripsi');
// 		var len = $('.show-deskripsi').length;
// 		for (var i = 0; i < len; i++) {
// 			if (i == show) {
// 				console.log(i)
// 				if (status[i] == 'show') {
// 					$('.show-deskripsi:eq(' + i + ')').css({
// 						"transform": ""
// 					})
// 					$('.table-deskripsi:eq(' + i + ')').hide();
// 					status[i] = '';
// 					continue;
// 				} else {
// 					$('.show-deskripsi:eq(' + i + ')').css({
// 						"transform": "rotate(180deg)"
// 					})
// 					$('.table-deskripsi:eq(' + i + ')').show();
// 					status[i] = 'show';
// 					continue;
// 				}
// 			}
// 		}
// 		return false;
// 	})
// });
