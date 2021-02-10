$(document).on('click', '#showProduct', function (event) {
    event.preventDefault();
    var id = $(this).attr('data-show-id');
    $.get( APP_URL + '/' + "product/edit/" + id, function (data) {
        $('#editCoupon').modal('show');
        $("input[name*='id_product']").val(data.data.id);
        $("input[name*='showProduct_name']").val(data.data.product_name);
        $("input[name*='showProduct_code']").val(data.data.product_code);
        $("input[name*='showProduct_quantity']").val(data.data.product_quantity);
        $("input[name*='showDuration_time']").val(data.data.time_duration);
        $("input[name*='showCategory_name']").val(data.data.category_name);
        $("input[name*='showSubcategory_name']").val(data.data.subcategory_name);
        $("input[name*='showBrand_name']").val(data.data.brand_name);
        $("input[name*='showProduct_size']").val(data.data.product_size);
        $("input[name*='showProduct_color']").val(data.data.product_color);
        $("input[name*='showSelling_price']").val(data.data.selling_price);
        $("input[name*='showDiscount_price']").val(data.data.discount_price);
        $("textarea:input[name*='showProduct_detail']").val(data.data.product_details);
        $("input[name*='showVideo_link']").val(data.data.video_link);
        $("#showImage_one").empty().html(
            '<img src ="' + APP_URL + "/" + data.data.image_one + '" style="height: 80px; width: 80px;" />'
        );

        //Image
        if (data.data.image_two == null){
            $("#showImage_two").empty().html(
                '<img src ="' + APP_URL + "/" + 'public/media/no-photo/no-photo.png' + '" style="height: 80px; width: 80px;" />'
            );
        }else{
            $("#showImage_two").empty().html(
                '<img src ="' + APP_URL + "/" + data.data.image_two + '" style="height: 80px; width: 80px;" />'
            );
        }

        // if (data.data.image_two == null){
        //     $("#showImage_three").empty().html(
        //         '<img src ="' + APP_URL + "/" + 'public/media/no-photo/no-photo.png' + '" style="height: 80px; width: 80px;" />'
        //     );
        // }else{
        //     $("#showImage_three").empty().html(
        //         '<img src ="' + APP_URL + "/" + data.data.image_three + '" style="height: 80px; width: 80px;" />'
        //     );
        // }

        // Main Slider
        // if (data.data.main_slider == 1) {
        //     $("#showMainSlider").prop("checked", true);
        // }else{
        //     $("#showMainSlider']").prop("checked", false);
        // }
        // Hot Deal
        if (data.data.hot_deal == 1) {
            $("#showHot_deal").prop("checked", true);
        }else{
            $("#showHot_deal").prop("checked", false);
        }
        // Best rated
        if (data.data.best_rated == 1) {
            $("#showBestRared").prop("checked", true);
        }else{
            $("#showBestRared").prop("checked", false);
        }
        // Mid Slider
        // if (data.data.best_rated == 1) {
        //     $("#showMid_slider").prop("checked", true);
        // }else{
        //     $("#showMid_slider").prop("checked", false);
        // }
        // Trend
        if (data.data.trend == 1) {
            $("#showTrend").prop("checked", true);
        }else{
            $("#showTrend").prop("checked", false);
        }
        //Hot New
        if (data.data.hot_new == 1) {
            $("#showHot_new").prop("checked", true);
        }else{
            $("#showHot_new").prop("checked", false);
        }
        //
    });
});