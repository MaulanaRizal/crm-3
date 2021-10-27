$('.save-button').click(function () {
    // Nama Lengkap
    var val = $('#nama').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#nama-alert').show();
        $('#nama-alert').html('Form tidak boleh kosong')
    } else {
        $('#nama-alert').hide();
    }
    // Pelanggan
    var val = $('#pelanggan').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#pelanggan-alert').show();
        $('#pelanggan-alert').html('Form tidak boleh kosong')
    } else {
        $('#pelanggan-alert').hide();
    }
    // Kategori
    var val = $('#kategori').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#kategori-alert').show();
        $('#kategori-alert').html('Form tidak boleh kosong')
    } else {
        $('#kategori-alert').hide();
    }
    // Tipe Alamat
    var val1 = $('#terminating').is(':checked');
    var val2 = $('#originating').is(':checked');
    // console.log(val1==false&&val2==false);
    if (val1 == false && val2 == false) {
        $('#tipe-alert').show();
        $('#tipe-alert').html('Form tidak boleh kosong')
    } else {
        $('#tipe-alert').hide();
    }
    // SBU
    var val = $('#sbu').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#sbu-alert').show();
        $('#sbu-alert').html('Form tidak boleh kosong')
    } else {
        $('#sbu-alert').hide();
    }
    // Provinsi
    var val = $('#provinsi').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#provinsi-alert').show();
        $('#provinsi-alert').html('Form tidak boleh kosong')
    } else {
        $('#provinsi-alert').hide();
    }
    // Kabupaten
    var val = $('#kabupaten').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#kabupaten-alert').show();
        $('#kabupaten-alert').html('Form tidak boleh kosong')
    } else {
        $('#kabupaten-alert').hide();
    }
    // Kecamatan
    var val = $('#kecamatan').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#kecamatan-alert').show();
        $('#kecamatan-alert').html('Form tidak boleh kosong')
    } else {
        $('#kecamatan-alert').hide();
    }
    // Jalan
    var val = $('#jalan').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#jalan-alert').show();
        $('#jalan-alert').html('Form tidak boleh kosong')
    } else {
        $('#jalan-alert').hide();
    }
});