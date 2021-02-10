@extends('admin.admin_layouts')

@section('admin_content')

<div class="content-wrapper"><br />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                    <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Site Settings</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form method="post" action="{{ route('update.sitesetting') }}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_setting" value="{{ $setting->id }}">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_name">Phone One </label>
                                <input type="text" class="form-control" 
                                name="phone_one" value="{{ $setting->phone_one }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_code">Phone Two: </label>
                                <input type="text" class="form-control" 
                                name="phone_two" value="{{ $setting->phone_two }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_quantity">Email: </label>
                                <input type="email" class="form-control" 
                                name="email_site" value="{{ $setting->email }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Comapany Name: </label>
                                <input type="text" class="form-control" 
                                name="company_name" value="{{ $setting->company_name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Comapany Address: </label>
                                <input type="text" class="form-control" 
                                name="company_address" value="{{ $setting->company_address }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Facebook: </label>
                                <input type="text" class="form-control" 
                                name="facebook_site" value="{{ $setting->facebook }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Youtobe: </label>
                                <input type="text" class="form-control" 
                                name="youtobe_site" value="{{ $setting->youtobe }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Instagram: </label>
                                <input type="text" class="form-control" 
                               name="instgram_site" value="{{ $setting->instagram }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_code">Twitter: </label>
                                <input type="text" class="form-control" 
                                name="twitter_site" value="{{ $setting->twitter }}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="bg-light color-palette">
                            <button type="submit" class="btn btn-outline-success store-data btn-md">Submit</button>
                        </div>
                    </div>
                    </form>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<!-- /.edit and update modal -->
<div class="modal fade" id="editAdmin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="id_admin" name="id_admin" value="">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_name">Name: <code>*</code></label>
                            <input type="text" class="form-control @error('name_admin') is-invalid @enderror" 
                            name="name_admin" id="name_admin" placeholder="Enter User Name">
                            @if ($errors->has('name_admin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name_admin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_code">Phone: <code>*</code></label>
                            <input type="text" class="form-control @error('phone_admin') is-invalid @enderror" 
                            name="phone_admin" id="phone_admin" placeholder="Enter Phone Admin">
                            @if ($errors->has('phone_admin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_admin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_quantity">Email: <code>*</code></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" id="email_admin" placeholder="Enter Email Admin">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_quantity">Password: <code>*</code></label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="password" class="form-control @error('password_admin') is-invalid @enderror" 
                                 id="new_password_admin" name="new_password_admin" placeholder="Enter Password Admin">
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="far fa-eye" id="newtogglePassword"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkbox Area -->
                <div class="row">
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="chb1" name="category_admin" value="1">
                                <label for="chb1">Category
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="chb2" name="coupon_admin" value="1">
                                <label for="chb2">Coupon
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh3" name="product_admin" value="1">
                                <label for="cbh3">Product
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh4" name="blog_admin" value="1">
                                <label for="cbh4">Blog
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh5" name="order_admin" value="1">
                                <label for="cbh5">Order
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh6" name="newsletter_admin" value="1">
                                <label for="cbh6">Newsletter
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh7" name="report_admin" value="1">
                                <label for="cbh7">Report
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh8" name="role_admin" value="1">
                                <label for="cbh8">Role
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh9" name="return_admin" value="1">
                                <label for="cbh9">Return
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh10" name="contact_admin" value="1">
                                <label for="cbh10">Contact
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh11" name="comment_admin" value="1">
                                <label for="cbh11">comment
                                </label> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group clearfix">
                            <div class="checkbox icheck-turquoise">
                                <input type="checkbox" id="cbh12" name="setting_admin" value="1">
                                <label for="cbh12">Setting
                                </label> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="UpdateAdmin" class="btn btn-primary">Update Data User Admin</button>
                </div>
                <div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    const togglePassword = document.querySelector('#newtogglePassword');
    const password = document.querySelector('#new_password_admin');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

@endsection
