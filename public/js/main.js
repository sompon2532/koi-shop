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
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            var url = $(this).data('url');
            var id = $(this).data('id');
            var token = $(this).data('token');

            $.ajax({
                url: url + '/' + id,
                type: 'post',
                data: {_method: 'delete', _token :token},
                success: function(response) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(function(result) {
                        if (result.value) {
                            location.reload();
                        }
                    })
                },
                error: function(response) {
                    swal(
                        'Oops...',
                        'Something went wrong!',
                        'error'
                    )
                }
            });
        }
    })
});