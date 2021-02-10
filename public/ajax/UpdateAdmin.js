$(document).on('click', '#editAdm', function (event) {
    event.preventDefault();
    var id = $(this).attr('data-show-id');
    $.get( APP_URL + '/' + "user/edit/admin/" + id, function (data) {
        $('#editCoupon').modal('show');
        $("input[name*='id_admin']").val(data.data.id);
        $("input[name*='name_admin']").val(data.data.name);
        $("input[name*='phone_admin']").val(data.data.phone);
        $("input[name*='email']").val(data.data.email);

        // Category
        if (data.data.category == 1) {
            $("input[name*='category_admin']").prop("checked", true);
        }else{
            $("input[name*='category_admin']").prop("checked", false);
        }
        
        // Coupon
        if (data.data.coupon == 1) {
            $("input[name*='coupon_admin']").prop("checked", true);
        }else{
            $("input[name*='coupon_admin']").prop("checked", false);
        }

        // product
        if (data.data.product == 1) {
            $("input[name*='product_admin']").prop("checked", true);
        }else{
            $("input[name*='product_admin']").prop("checked", false);
        }

        // blog
        if (data.data.blog == 1) {
            $("input[name*='blog_admin']").prop("checked", true);
        }else{
            $("input[name*='blog_admin']").prop("checked", false);
        }

        // order
        if (data.data.order == 1) {
            $("input[name*='order_admin']").prop("checked", true);
        }else{
            $("input[name*='order_admin']").prop("checked", false);
        }

        // Newsletter
        if (data.data.newsletter == 1) {
            $("input[name*='newsletter_admin']").prop("checked", true);
        }else{
            $("input[name*='newsletter_admin']").prop("checked", false);
        }

        // Report
        if (data.data.report == 1) {
            $("input[name*='report_admin']").prop("checked", true);
        }else{
            $("input[name*='report_admin']").prop("checked", false);
        }

        // role
        if (data.data.role == 1) {
            $("input[name*='role_admin']").prop("checked", true);
        }else{
            $("input[name*='role_admin']").prop("checked", false);
        }

        // return
        if (data.data.return == 1) {
            $("input[name*='return_admin']").prop("checked", true);
        }else{
            $("input[name*='return_admin']").prop("checked", false);
        }

        // contact
        if (data.data.contact == 1) {
            $("input[name*='contact_admin']").prop("checked", true);
        }else{
            $("input[name*='contact_admin']").prop("checked", false);
        }

        // contact
        if (data.data.comment == 1) {
            $("input[name*='comment_admin']").prop("checked", true);
        }else{
            $("input[name*='comment_admin']").prop("checked", false);
        }

        // setting
        if (data.data.setting == 1) {
            $("input[name*='setting_admin']").prop("checked", true);
        }else{
            $("input[name*='setting_admin']").prop("checked", false);
        }

        // stock
        if (data.data.stock == 1) {
            $("input[name*='stock_admin']").prop("checked", true);
        }else{
            $("input[name*='stock_admin']").prop("checked", false);
        }
    });
});

$('#UpdateAdmin').on( "click", function(e) {
    e.preventDefault();
    $(this).html('Sending..');
    var id = $("#id_admin").val();
    var nameAdmin = $("#name_admin").val();
    var phoneAdmin = $("#phone_admin").val();
    var emailAdmin = $("#email_admin").val();
    var passwordAdmin = $("#new_password_admin").val();
    var catAdmin = $("input[name*='category_admin']").is(":checked") ? 1 : null;
    var coupon_admin = $("input[name*='coupon_admin']").is(":checked") ? 1 : null;
    var product_admin = $("input[name*='product_admin']").is(":checked") ? 1 : null;
    var blog_admin = $("input[name*='blog_admin']").is(":checked") ? 1 : null;
    var order_admin = $("input[name*='order_admin']").is(":checked") ? 1 : null;
    var newsletter_admin = $("input[name*='newsletter_admin']").is(":checked") ? 1 : null;
    var report_admin = $("input[name*='report_admin']").is(":checked") ? 1 : null;
    var role_admin = $("input[name*='role_admin']").is(":checked") ? 1 : null;
    var return_admin = $("input[name*='return_admin']").is(":checked") ? 1 : null;
    var contact_admin = $("input[name*='contact_admin']").is(":checked") ? 1 : null;
    var comment_admin = $("input[name*='comment_admin']").is(":checked") ? 1 : null;
    var setting_admin = $("input[name*='setting_admin']").is(":checked") ? 1 : null;
    var stock_admin = $("input[name*='stock_admin']").is(":checked") ? 1 : null;

    $.ajax({
    url: APP_URL + '/' + "user/update/admin/" + id,
    type: "POST",
    data: {
        id: id,
        nameAdmin: nameAdmin,
        phoneAdmin: phoneAdmin,
        emailAdmin: emailAdmin,
        passwordAdmin: passwordAdmin,
        catAdmin: catAdmin,
        coupon_admin: coupon_admin,
        product_admin: product_admin,
        blog_admin: blog_admin,
        order_admin: order_admin,
        newsletter_admin: newsletter_admin,
        report_admin: report_admin,
        role_admin: role_admin,
        return_admin: return_admin,
        contact_admin: contact_admin,
        comment_admin: comment_admin,
        setting_admin: setting_admin,
        stock_admin: stock_admin,
    },
    dataType: 'json',
        success: function (data) {
            console.log(data)
            $('#editAdmin').trigger("reset");
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'Success For Your Update Data Admins',
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