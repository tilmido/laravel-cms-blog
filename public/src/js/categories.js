$(document).ready(function () {


    //add cat
    $('#add_cat').click(function (event) {
        event.preventDefault();
        var name = $('#name').val();
        if (name === '') {
            alert('Please enter a value ');
        } else {

            $.ajax({
                url: baseUrl + '/admin/categories/create',
                type: 'post',
                data: {name: name, _token: token},
                success: function (data) {
                    location.reload();
                },
                error: function (jqXHR) {
                    alert("Somthing Wrong ! look to console log");
                    console.log(jqXHR);
                }
            });
        }

    });
    //edit category
    $('.btn-edit').click(function () {
        id = $(this).data('id');
        if ($(this).val() == 'edit') {
            $('#input-' + id).slice().show(1000);
            $('#input-' + id).val($('#title-' + id).html());
            $('#button-' + id).attr('value', 'save');
            $('#button-' + id).html('save');
        } else if ($(this).val() == 'save') {
            name = $('#input-' + id).val();
            $.ajax({
                url: baseUrl + '/admin/categories/update',
                data: {category_id: id, name: name, _token: token},
                type: 'post',
                dataType: 'text',
                success: function (data) {
                    $('#title-' + id).css({border: "solid 1px green"});
                    timeout = setTimeout(function () {
                        $('#title-' + id).css({border: "none"});
                        clearTimeout(timeout);
                    }, 2000)
                    $('#input-' + id).slice().hide(1000);
                    $('#button-' + id).attr('value', 'edit');
                    $('#title-' + id).html($('#input-' + id).val());
                    $('#button-' + id).html('Edit');
                    console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
        console.log(id);
    });
    //delete category
    $('.delete').click(function (event) {
        event.preventDefault();
        id = $(this).data('id');
        if (confirm('Are you sure you want to delete this category.')) {
            $.ajax({
                url: baseUrl + '/admin/categories/delete',
                type: 'post',
                data: {category_id: id, _token: token},
                dataType: 'text',
                success: function (data) {
                        location.reload();
                }
            });
        }
    });
});