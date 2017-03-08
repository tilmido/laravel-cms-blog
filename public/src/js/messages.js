
$(document).ready(function () {
    $(".show-message").click(function () {
        $('.modal-body').html($(this).data('message'));
        $('.modal-header').html($(this).data('subject'));
        $('#myModal').modal('show');
    });

    $('.delete_message').click(function (event) {
        event.preventDefault();
        id = $(this).data('id');
        if (confirm('Are you sure you want to delete this message.')) {
            $.ajax({
                url: baseUrl + '/admin/messages/delete',
                type: 'post',
                data: {message_id: id, _token: token},
                dataType: 'jsonp',
                success: function (data) {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
    });
});