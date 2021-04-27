<?php



Route::get('/', function () {
    return view('pages.index');
});

//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// Route For Google Akun Login
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
 Route::get('/callback/{provider}', 'SocialController@callback');

// Admin Section


//Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('admin/delete/category/{id}', 'Admin\Category\CategoryController@Deletecategory');
Route::get('admin/category/edit/{id}', 'Admin\Category\CategoryController@Editcategory');
Route::post('admin/category/update/{id}', 'Admin\Category\CategoryController@Updatecategory');

//Brands
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
Route::get('admin/delete/brand/{id}', 'Admin\Category\BrandController@Deletebrand');
Route::get('admin/edit/brand/{id}', 'Admin\Category\BrandController@Editbrand');
Route::post('admin/update/brand/{id}', 'Admin\Category\BrandController@Updatebrand');

//Sub Categories
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@subcategory')->name('sub.categories');
Route::post('admin/store/subcat', 'Admin\Category\SubCategoryController@storesubcat')->name('store.subcategory');
Route::get('admin/delete/subcat/{id}', 'Admin\Category\SubCategoryController@Deletesubcat');
Route::get('admin/edit/subcat/{id}', 'Admin\Category\SubCategoryController@Editsubcat');
Route::post('admin/update/subcat/{id}', 'Admin\Category\SubCategoryController@Updatesubcat');

// Duration Time
Route::get('admin/duration', 'Admin\Category\DurationController@duration')->name('duration');
Route::post('admin/store/duration', 'Admin\Category\DurationController@StoreDuration')->name('store.duration');
Route::get('admin/delete/duration/{id}', 'Admin\Category\DurationController@DeleteDuration');
Route::get('admin/duration/edit/{id}', 'Admin\Category\DurationController@EditDuration');
Route::post('admin/duration/update/{id}', 'Admin\Category\DurationController@UpdateDuration');

// Coupon All
Route::get('admin/coupon', 'Admin\Category\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@StoreCoupon')->name('store.coupon');
Route::get('admin/delete/coupon/{id}', 'Admin\Category\CouponController@DeleteCoupon');
Route::get('admin/coupon/edit/{id}', 'Admin\Category\CouponController@EditCoupon');
Route::post('admin/coupon/update/{id}', 'Admin\Category\CouponController@UpdateCoupon');

// newslaters
Route::get('admin/newslaters', 'Admin\Category\CouponController@Newslaters')->name('admin.newslaters');
Route::get('delete/newslater/{id}', 'Admin\Category\CouponController@DeleteNewslater');
Route::delete('/deleteall', 'Admin\Category\CouponController@DeleteAllLetter')->name('deleteall');



// Product All Route
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/storenew/product', 'Admin\ProductController@storeProduct')->name('store.product');

Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
Route::get('delete/product/{id}', 'Admin\ProductController@delete');
Route::get('product/edit/{id}', 'Admin\ProductController@show');
Route::get('product/update/{id}', 'Admin\ProductController@edit');
Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/withphoto/{id}', 'Admin\ProductController@UpdateProductWithPhoto');

// Sub Category Show with ajax
Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcat');

// Blog Admin All
Route::get('admin/blog/category/list', 'Admin\PostController@BlogCatList')->name('add.blog.categorylist');
Route::post('admin/store/blog', 'Admin\PostController@StoreBlog')->name('store.blog.category');
Route::get('admin/delete/blog/category/{id}', 'Admin\PostController@BlogDeleteBlog');
Route::get('admin/edit/blog/category/{id}', 'Admin\PostController@BlogEdit');
Route::post('admin/update/blog/category/{id}', 'Admin\PostController@BlogUpdate');

Route::get('admin/add/post', 'Admin\PostController@CreatePost')->name('add.blogpost');
Route::get('admin/all/post', 'Admin\PostController@IndexPost')->name('all.blogpost');

Route::post('admin/store/post', 'Admin\PostController@StorePost')->name('store.post');
Route::get('admin/delete/post/{id}', 'Admin\PostController@DeletePost');
Route::get('admin/edit/post/{id}', 'Admin\PostController@EditPost');
Route::post('admin/update/post/{id}', 'Admin\PostController@UpdatePost');


// front AllRoute

//Newslater
Route::post('store/newslater', 'FrontController@storeNewslater')->name('store.newslater');

//wishlist
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');

//Add to cart
Route::get('add/to/cart/{id}', 'CartController@AddCart');
Route::get('check', 'CartController@CheckCart');
Route::get('product/cart', 'CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@RemoveCart');

// ajax add cart and view before click add cart
Route::get('cart/product/view/{id}', 'CartController@ViewCart');

// checkout page
Route::get('user/checkout', 'CartController@Checkout')->name('user.checkout');

// wishlist page
Route::get('user/wishlist', 'CartController@Wishlist')->name('user.wishlist');
Route::get('remove/wishlist/{id}', 'CartController@RemoveWislist');

// Coupon
Route::post('user/apply/coupon/', 'CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@RemoveCoupon')->name('coupon.remove');


Route::get('product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::post('cart/product/add/{id}', 'ProductController@AddCart');

//blog post
Route::get('blog/post/', 'BlogController@BlogView')->name('blog.post');
// language englis
Route::get('language/english', 'BlogController@English')->name('language.english');
// language indonesia
Route::get('language/indonesia', 'BlogController@Indonesia')->name('language.indonesia');
// Blog Detail
Route::get('blog/details/{id}', 'BlogController@BlogDetails');

// Payment Proses
Route::post('user/payment/process/', 'PaymentController@Payment')->name('payment.process');

// pdf create for invoice
Route::get('invoice/pdf_print', 'PaymentController@PdfPrint')->name('pdf.create');
// payment done proses
Route::get('done/payment', 'PaymentController@donePayment')->name('done.payment');



// Product Detail Page Shop
Route::get('products/{id}', 'ProductController@ProductViewPages');
Route::get('allcategory/{id}', 'ProductController@CategoryView');

// Admin Order Route

Route::get('admin/pading/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
//admin accept
Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPayment')->name('admin.accept.payment');
Route::get('admin/progress/order', 'Admin\OrderController@ProgressPayment')->name('admin.progress.order');
Route::get('admin/done/order', 'Admin\OrderController@DonePayment')->name('admin.done.order');
Route::get('admin/cancel/order', 'Admin\OrderController@CancelPayment')->name('admin.cancel.order');

Route::get('admin/progress/process/{id}', 'Admin\OrderController@ProgressProcess');
Route::get('admin/progress/done/{id}', 'Admin\OrderController@DoneProcess');

// SEO Setting Route
Route::get('admin/seo', 'Admin\SeosettingController@SeoSetting')->name('admin.seo');
Route::post('admin/update/seo', 'Admin\SeosettingController@SeoUpdate')->name('update.seo');

// Order Tracking Route
Route::post('order/tracking/', 'FrontController@OrderTracking')->name('order.tracking');

// Report Order Route
Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/progress', 'Admin\ReportController@TodayProgress')->name('today.progress');
Route::get('admin/month/order', 'Admin\ReportController@MonthOrder')->name('month.order');
Route::get('admin/search/report', 'Admin\ReportController@SearchReport')->name('search.report');

// search By
Route::post('admin/search/by/year', 'Admin\ReportController@SearchByYear')->name('search.by.year');
Route::post('admin/search/by/month', 'Admin\ReportController@SearchByMonth')->name('search.by.month');
Route::post('admin/search/by/date', 'Admin\ReportController@SearchByDate')->name('search.by.date');

// user role management
Route::get('admin/all/user', 'Admin\UserRoleController@UserRole')->name('admin.all.user');
Route::get('admin/create/admin', 'Admin\UserRoleController@UserCreate')->name('create.admin');
//add User Admin
Route::post('admin/store/admin', 'Admin\UserRoleController@StoreAdmin')->name('store.admin');
// delete User Admin
Route::get('delete/admin/{id}', 'Admin\UserRoleController@DeleteAdmin');
// edit User Admin with ajax
Route::get('user/edit/admin/{id}', 'Admin\UserRoleController@EditAdmin');
Route::post('user/update/admin/{id}', 'Admin\UserRoleController@UpdateAdmin');

// Site Setting Admin
Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/sitesetting', 'Admin\SettingController@UpdateSitesetting')->name('update.sitesetting');

// Front end Return Order Route
Route::get('success/list/', 'PaymentController@SuccessList')->name('success.orderlist');

//Return Order
Route::get('request/return/{id}', 'PaymentController@RequestReturn');

// Return Request Admin Page
Route::get('admin/return/request', 'Admin\ReturnController@ReturnRequest')->name('admin.return.request');
Route::get('admin/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return', 'Admin\ReturnController@AllReturn')->name('admin.all.return');

// Order Stock Route
Route::get('admin/product/stock', 'Admin\UserRoleController@ProductStock')->name('admin.product.stock');

// Contact Page
Route::get('contact/page', 'ContactController@Contact')->name('contact.page');
Route::post('contact/form', 'ContactController@FormContact')->name('contact.form');
Route::get('admin/all/message', 'Admin\ContactController@AllMessage')->name('admin.all.message');

// Search Route 
Route::post('product/search', 'CartController@SearchProduct')->name('product.search');

// log user
Route::get('admin/log/user', 'Admin\UserRoleController@LogUser')->name('admin.log.user');

// Reward Admin
Route::get('admin/voucher', 'Admin\VoucherController@index')->name('admin.voucherList');
Route::get('admin/voucher/add', 'Admin\VoucherController@CreateVoucher')->name('create.voucher');
Route::post('admin/voucher/store', 'Admin\VoucherController@StoreVoucher')->name('store.voucher');
Route::get('admin/voucher/edit/{id}', 'Admin\VoucherController@EditVocuher');
Route::post('admin/voucher/claim/', 'Admin\VoucherController@ClaimVocuher');

// claim voucher








