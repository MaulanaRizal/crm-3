$('.hide').hide();

$('.submit').click(function() {
    var val = $(':checkbox').is(':checked');
    console.log(val);
    if(val==false){
        $('.alert-checkbox').show();
        $(".alert-checkbox").fadeOut(1500);
    }
});