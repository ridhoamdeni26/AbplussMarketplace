@extends('admin.admin_layouts')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('admin.all.user') }}"><button type="button" class="btn btn-outline-info btn-lg" style="float: right;">All Product</button></a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-gray-dark color-palette">
                            <h3 class="card-title">New Admin Add Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('store.admin') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_name">Name: <code>*</code></label>
                                            <input type="text" class="form-control @error('name_admin') is-invalid @enderror" 
                                            id="name_admin" name="name_admin" placeholder="Enter User Name">
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
                                            id="phone_admin" name="phone_admin" placeholder="Enter Phone Admin">
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
                                            id="email" name="email" placeholder="Enter Email Admin">
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
                                                id="password_admin" name="password_admin" placeholder="Enter Password Admin">
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-eye" id="togglePassword"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    <hr>
                                    <br>
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
                                    <div class="col-4">
                                        <div class="form-group clearfix">
                                            <div class="checkbox icheck-turquoise">
                                              <input type="checkbox" id="cbh13" name="stock_admin" value="1">
                                              <label for="cbh13">Stocks
                                              </label> 
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-light color-palette">
                                <button type="submit" class="btn btn-outline-primary store-data">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password_admin');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
@endsection
