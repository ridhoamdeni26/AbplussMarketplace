$('body').on('click', '#editBlogCat', function (event) {
    event.preventDefault();
    var id = $(this).attr('data-id-blog');
        $.get( APP_URL + '/' + "admin/edit/blog/category/" + id, function (data) {
            $('#submit').val("Edit Blog category");
            $('#practice_modal').modal('show');
            $('#id_blog').val(data.data.id);
            $('#blogNameEn').val(data.data.category_name_en);
            $('#blogNameId').val(data.data.category_name_id);
        });
    });

    $('#editBlogSubmit').on( "click", function(e) {
        e.preventDefault();
        $(this).html('Sending..');
        var id = $("#id_blog").val();
        var name_en = $("#blogNameEn").val();
        var name_id = $("#blogNameId").val();

        $.ajax({
            url: APP_URL + '/' + "admin/update/blog/category/" + id,
            type: "POST",
            data: {
                id: id,
                category_name_en: name_en,
                category_name_id: name_id,
            },
            dataType: 'json',
            success: function (data) {
                $('#companydata').trigger("reset");
                $('#practice_modal').modal('hide');
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success For Your Update Blog Category',
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