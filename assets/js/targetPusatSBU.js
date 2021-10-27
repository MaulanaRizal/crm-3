$(document).ready(function(){
    console.log('JS Target Pusat SBU - Stand by');

    $('.rupiah').keyup(function(){
        let nominal = $(this).val();

        console.log(nominal)
    });
});