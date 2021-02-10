$('body').on('click', '#editDur', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    // console.log(id)
        $.get('duration/edit/' + id, function (data) {
            $('#submit').val("Edit Duration");
            $('#practice_modal').modal('show');
            $('#id_duration').val(data.data.id);
            $('#durationTime').val(data.data.time_duration);
        });

    $('#SubmitDuration').on( "click", function(e) {
        e.preventDefault();
        $(this).html('Sending..');
        var id = $("#id_duration").val();
        var name = $("#durationTime").val();

        $.ajax({
            url: 'duration/update/' + id,
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
});