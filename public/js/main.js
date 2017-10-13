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