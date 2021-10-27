$('.save-button').click(function () {
	// TanggalAgreement
	var val = $('#agreement_date').val();
	if (val == '') {
		// console.log('form tidak boleh kosong.')
		$('#agreement_date-alert').show();
		$('#agreement_date-alert').html("form tidak boleh kosong.");
	} else {
		$('#agreement_date-alert').hide();
	}
	// Pelanggan
	var val = $('#pelanggan').val();
	// console.log(val)
	if (val == null) {
		$('#pelanggan-alert').show();
		$('#pelanggan-alert').html("form tidak boleh kosong.");
	} else {
		$('#pelanggan-alert').hide();
	}
	// Tanggal Mulai
	var val = $('#tanggal_mulai').val();
	// console.log(val)
	if (val == '') {
		$('#tanggal_mulai-alert').show();
		$('#tanggal_mulai-alert').html("form tidak boleh kosong.");
	} else {
		$('#tanggal_mulai-alert').hide();
	}
	// Tanggal Selesai 
	var val = $('#tanggal_selesai').val();
	// console.log('tanggal selesai'+val)
	if (val == '') {
		$('#tanggal_selesai-alert').show();
		$('#tanggal_selesai-alert').html("form tidak boleh kosong.");
	} else {
		$('#tanggal_selesai-alert').hide();
	}
	// Tipe Billing Agreement
	var val = $('#billing_agreement').val();
	// console.log('billing_agreement ='+val)
	if (val == '') {
		$('#billing_agreement-alert').show();
		$('#billing_agreement-alert').html("form tidak boleh kosong.");
	} else {
		$('#billing_agreement-alert').hide();
	}
	// Jenis Pembayaran
	var val = $('#billing_type').val();
	// console.log('billing_type ='+val)
	if (val == '') {
		$('#billing_type-alert').show();
		$('#billing_type-alert').html("form tidak boleh kosong.");
	} else {
		$('#billing_type-alert').hide();
	}
	// Tipe Periode
	var val = $('#periode_type').val();
	// console.log('periode_type ='+val)
	if (val == '') {
		$('#periode_type-alert').show();
		$('#periode_type-alert').html("form tidak boleh kosong.");
	} else {
		$('#periode_type-alert').hide();
	}
	// Jumlah Periode
	var val = $('#jumlah_perode').val();
	// console.log('jumlah_perode ='+val)
	if (val == '') {
		$('#jumlah_perode-alert').show();
		$('#jumlah_perode-alert').html("form tidak boleh kosong.");
	} else {
		$('#jumlah_perode-alert').hide();
	}
	// Tipe Faktur
	var val = $('#Faktur').val();
	// console.log('Faktur ='+val)
	if (val == '') {
		$('#Faktur-alert').show();
		$('#Faktur-alert').html("form tidak boleh kosong.");
	} else {
		$('#Faktur-alert').hide();
	}
	// Jangka Waktu Pembayaran
	var val = $('#jangka_waktu').val();
	// console.log('jangka_waktu ='+val)
	if (val == null) {
		$('#jangka_waktu-alert').show();
		$('#jangka_waktu-alert').html("form tidak boleh kosong.");
	} else {
		$('#jangka_waktu-alert').hide();
	}
	// Isi Agreement
	var val = $('#task_agreement').val();
	// console.log('task_agreement ='+val)
	if (val == '') {
		$('#task_agreement-alert').show();
		$('#task_agreement-alert').html("form tidak boleh kosong.");
	} else {
		$('#task_agreement-alert').hide();
	}
	// Rekening Bank
	var val = $('#rekening').val();
	// console.log('rekening ='+val)
	if (val == '') {
		$('#rekening-alert').show();
		$('#rekening-alert').html("form tidak boleh kosong.");
	} else {
		$('#rekening-alert').hide();
	}
	// Nomor Rekening Bank
	var val = $('#no_rekening').val();
	// console.log('no_rekening ='+val)
	if (val == '') {
		$('#no_rekening-alert').show();
		$('#no_rekening-alert').html("form tidak boleh kosong.");
	} else {
		$('#no_rekening-alert').hide();
	}
	// Nomor Rekening Bank
	var val = $('#npwp').val();
	// console.log('npwp ='+val)
	if (val == '' || val == null) {
		$('#npwp-alert').show();
		$('#npwp-alert').html("form tidak boleh kosong.");
	} else {
		$('#npwp-alert').hide();
	}
	// Alamat Penagihan
	var val = $('#alamat').val();
	// console.log('alamat ='+val)
	if (val == '' || val == null) {
		$('#alamat-alert').show();
		$('#alamat-alert').html("form tidak boleh kosong.");
	} else {
		$('#alamat-alert').hide();
	}
});
// Hukuman
$('#hukuman').keyup(function () {
	var len = $(this).val().length;
	// console.log(len);
	$('#char-hukuman').html(1000 - len);
});

$('#no_rekening').bind('keyup paste', function () {
	this.value = this.value.replace(/[^0-9]/g, '');
});
// submit Instuksi form
$('#submit-instruksi').click(function () {
	// Subjek
	var val = $('#in-subjek').val();
	// console.log('in-subjek ='+val)
	if (val == '' || val == null) {
		$('#in-subjek-alert').show();
		$('#in-subjek-alert').html("form tidak boleh kosong.");
	} else {
		$('#in-subjek-alert').hide();
	}
	// Tenggang Waktu
	var val = $('#in-waktu').val();
	// console.log('in-waktu ='+val)
	if (val == '' || val == null) {
		$('#in-waktu-alert').show();
		$('#in-waktu-alert').html("form tidak boleh kosong.");
	} else {
		$('#in-waktu-alert').hide();
	}
});

