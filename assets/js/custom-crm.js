// menyembunyikan lesan alert dalam 2 detik
window.setTimeout(function () {
	$(".alert").fadeTo(500, 0).slideUp(500, function () {
		$(this).remove();
	});
}, 3000);

// table data
$(document).ready(function () {
	$('#myTable').DataTable();
	$(document).ready(function () {
		var table = $('#example').DataTable({
			"columnDefs": [{
				"visible": false,
				"targets": 2
			}],
			"order": [
				[2, 'asc']
			],
			"displayLength": 15,
			"drawCallback": function (settings) {
				var api = this.api();
				var rows = api.rows({
					page: 'current'
				}).nodes();
				var last = null;
				api.column(2, {
					page: 'current'
				}).data().each(function (group, i) {
					if (last !== group) {
						$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
						last = group;
					}
				});
			}
		});
		// Order by the grouping
		$('#example tbody').on('click', 'tr.group', function () {
			var currentOrder = table.order()[0];
			if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
				table.order([2, 'desc']).draw();
			} else {
				table.order([2, 'asc']).draw();
			}
		});
	});
});

$('#example23').DataTable({
	dom: 'Bfrtip',
	buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
	]
});

// input number only
function numberInput(evt) {
	var char = String.fromCharCode(evt.which);
	if (!/[0-9]/.test(char)) {
		evt.preventDefault();
	}
}

// var rupiah = document.getElementsByClassName("nominal");
// rupiah.addEventListener("keyup", function(e) {
//   // tambahkan 'Rp.' pada saat form di ketik
//   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
//   rupiah.value = formatRupiah(this.value, "Rp. ");
// });

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}