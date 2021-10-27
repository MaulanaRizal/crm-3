$('#submit-target').click(function () {
	// Masukan Nominal Target
	var val = $('#input-target').val();
	console.log(val)
	if (val == '' || val == null) {
		$('#input-target-alert').show();
		$('#input-target-alert').html("form tidak boleh kosong.");
	} else {
		$('#input-target-alert').hide();
		$('#modal-target').modal('show');
		$('#target').val(val);
		$('#terbilang').val($('#input-terbilang').text())
	}
});
	
$('#modal-submit-target').click(function () {
	console.log($('#check-target').is(':checked'));
	if (!($('#check-target').is(':checked'))) {
		$('#check-target-alert').show();
		$('#check-target-alert').html("form tidak boleh kosong.");
	} else {
		$('#check-target-alert').hide();
	}
});


var terbilang;
$('#input-target').keyup(function () {
	var val = $('#input-target').val();
	$('#input-target-alert').hide();
	val = val.replace(/\./g, "")
	val = val.replace(/Rp/g, "")
	val = val.replace(/,00/g, "")
	// console.log(val);
    if(val>0){
        $('#input-terbilang').html(terbilang(val)+' Rupiah');
    }else{
        $('#input-terbilang').html('');
    }
});

function terbilang(a) {
	var bilangan = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];

	// 1 - 11
	if (a < 12) {
		i = parseInt(a);
		var kalimat = bilangan[i];
	}
	// 12 - 19
	else if (a < 20) {
		var kalimat = bilangan[a - 10] + ' Belas';
	}
	// 20 - 99
	else if (a < 100) {
		var utama = a / 10;
		var depan = parseInt(String(utama).substr(0, 1));
		var belakang = a % 10;
		var kalimat = bilangan[depan] + ' Puluh ' + bilangan[belakang];
	}
	// 100 - 199
	else if (a < 200) {
		var kalimat = 'Seratus ' + terbilang(a - 100);
	}
	// 200 - 999
	else if (a < 1000) {
		var utama = a / 100;
		var depan = parseInt(String(utama).substr(0, 1));
		var belakang = a % 100;
		var kalimat = bilangan[depan] + ' Ratus ' + terbilang(belakang);
	}
	// 1,000 - 1,999
	else if (a < 2000) {
		var kalimat = 'Seribu ' + terbilang(a - 1000);
	}
	// 2,000 - 9,999
	else if (a < 10000) {
		var utama = a / 1000;
		var depan = parseInt(String(utama).substr(0, 1));
		var belakang = a % 1000;
		var kalimat = bilangan[depan] + ' Ribu ' + terbilang(belakang);
	}
	// 10,000 - 99,999
	else if (a < 100000) {
		var utama = a / 100;
		var depan = parseInt(String(utama).substr(0, 2));
		var belakang = a % 1000;
		var kalimat = terbilang(depan) + ' Ribu ' + terbilang(belakang);
	}
	// 100,000 - 999,999
	else if (a < 1000000) {
		var utama = a / 1000;
		var depan = parseInt(String(utama).substr(0, 3));
		var belakang = a % 1000;
		var kalimat = terbilang(depan) + ' Ribu ' + terbilang(belakang);
	}
	// 1,000,000 - 	99,999,999
	else if (a < 100000000) {
		var utama = a / 1000000;
		var depan = parseInt(String(utama).substr(0, 4));
		var belakang = a % 1000000;
		var kalimat = terbilang(depan) + ' Juta ' + terbilang(belakang);
	} else if (a < 1000000000) {
		var utama = a / 1000000;
		var depan = parseInt(String(utama).substr(0, 4));
		var belakang = a % 1000000;
		var kalimat = terbilang(depan) + ' Juta ' + terbilang(belakang);
	} else if (a < 10000000000) {
		var utama = a / 1000000000;
		var depan = parseInt(String(utama).substr(0, 1));
		var belakang = a % 1000000000;
		var kalimat = terbilang(depan) + ' Milyar ' + terbilang(belakang);
	} else if (a < 100000000000) {
		var utama = a / 1000000000;
		var depan = parseInt(String(utama).substr(0, 2));
		var belakang = a % 1000000000;
		var kalimat = terbilang(depan) + ' Milyar ' + terbilang(belakang);
	} else if (a < 1000000000000) {
		var utama = a / 1000000000;
		var depan = parseInt(String(utama).substr(0, 3));
		var belakang = a % 1000000000;
		var kalimat = terbilang(depan) + ' Milyar ' + terbilang(belakang);
	} else if (a < 10000000000000) {
		var utama = a / 10000000000;
		var depan = parseInt(String(utama).substr(0, 1));
		var belakang = a % 10000000000;
		var kalimat = terbilang(depan) + ' Triliun ' + terbilang(belakang);
	} else if (a < 100000000000000) {
		var utama = a / 1000000000000;
		var depan = parseInt(String(utama).substr(0, 2));
		var belakang = a % 1000000000000;
		var kalimat = terbilang(depan) + ' Triliun ' + terbilang(belakang);
	} else if (a < 1000000000000000) {
		var utama = a / 1000000000000;
		var depan = parseInt(String(utama).substr(0, 3));
		var belakang = a % 1000000000000;
		var kalimat = terbilang(depan) + ' Triliun ' + terbilang(belakang);
	} else if (a < 10000000000000000) {
		var utama = a / 1000000000000000;
		var depan = parseInt(String(utama).substr(0, 1));
		var belakang = a % 1000000000000000;
		var kalimat = terbilang(depan) + ' Kuadriliun ' + terbilang(belakang);
	}

	var pisah = kalimat.split(' ');
	var full = [];
	for (var i = 0; i < pisah.length; i++) {
		if (pisah[i] != "") {
			full.push(pisah[i]);
		}
	}
	return full.join(' ');

}
