// Date picker
$(".datepicker").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    todayHighlight: true,
});

// Timepicker
$(".timepicker").timepicker({
    showInputs: false,
    minuteStep: 10,
    showMeridian: false,
});

$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
});

$('form').submit(function () {
    $(this).find(':button[type=submit]').prop('disabled', true);
});

$('.btn-delete').click(function () {
    var url = $(this).data('url');
    var id = $(this).data('id');
    var token = $(this).data('token');

    $.ajax({
        url: url + '/' + id,
        type: 'post',
        data: {_method: 'delete', _token :token},
        success: function(result) {
            location.reload();
        }
    });
});