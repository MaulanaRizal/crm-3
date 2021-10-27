$('.save-button').click(function () {
    // Nomor Pajak
    var val = $('#no_pajak').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#no_pajak-alert').show();
        $('#no_pajak-alert').html('Form tidak boleh kosong')
    } else {
        $('#no_pajak-alert').hide();
    }
    // Pemilik 
    var val = $('#pemilik').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#pemilik-alert').show();
        $('#pemilik-alert').html('Form tidak boleh kosong')
    } else {
        $('#pemilik-alert').hide();
    }
    // ALamat 
    var val = $('#alamat').val();
    // console.log(val);
    if (val == '' || val == null) {
        $('#alamat-alert').show();
        $('#alamat-alert').html('Form tidak boleh kosong')
    } else {
        $('#alamat-alert').hide();
    }
});



$('#alamat').keyup(function () {
    var len = $(this).val().length;
    // console.log(len);
    $('#char-alamat').html(1000 - len);
});
