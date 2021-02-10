$(document).on('click', '#editCoup', function (event) {
    event.preventDefault();
    var id = $(this).attr('data-modal');
    $.get('coupon/edit/' + id, function (data) {
        $('#submit').val("Edit category");
        $('#practice_modal').modal('show');
        $('#id_coupon').val(data.data.id);
        $('#CouponName').val(data.data.coupon);
        $('#CouponDiscount').val(data.data.discount);
    });
});

$('#couponSubmit').on( "click", function(e) {
    e.preventDefault();
    $(this).html('Sending..');
    var id = $("#id_coupon").val();
    var nameCoupon = $("#CouponName").val();
    var discount = $("#CouponDiscount").val();

$.ajax({
    url: 'coupon/update/' + id,
    type: "POST",
    data: {
        id: id,
        nameCoupon: nameCoupon,
        discount: discount,
    },
    dataType: 'json',
    success: function (data) {
        console.log(data)
        $('#editCoupon').trigger("reset");
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