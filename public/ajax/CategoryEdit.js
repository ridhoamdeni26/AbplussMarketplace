$('body').on('click', '#editCat', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    // console.log(id)
        $.get('category/edit/' + id, function (data) {
            $('#submit').val("Edit category");
            $('#practice_modal').modal('show');
            $('#id_category').val(data.data.id);
            $('#categoryName').val(data.data.category_name);
        });
    });

    $('#editSubmit').on( "click", function(e) {
        e.preventDefault();
        $(this).html('Sending..');
        var id = $("#id_category").val();
        var name = $("#categoryName").val();

        $.ajax({
            url: 'category/update/' + id,
            type: "POST",
            data: {
                id: id,
                name: name,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $('#companydata').trigger("reset");
                $('#practice_modal').modal('hide');
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success For Your Update Data',
                    timer: 1500
                }).then((success) => {
                    window.location.reload(true)
                })
            },
            error: function (data) {
                swal({
                    position: 'top-end',
                    icon: 'error',
                    title: 'error for update data! Check Your data Before Update',
                    timer: 1500
                }).then((success) => {
                    window.location.reload(true)
                })
            }
        });
    });