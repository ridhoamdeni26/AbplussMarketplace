<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png">
    <!--Page title-->
    <title>Login Muda-Ads</title>
    
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('public/panel/assets/css/bootstrap.min.css')}}">
    <!--Login Css-->
    <link rel="stylesheet" href="{{asset('public/panel/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/loginpage/login.css')}}">
    <link rel="stylesheet" href="{{asset('public/loginpage/login.css')}}">
</head>

<body id="page-top">
    <div class="body-login">
    <div class="form-structor">
        <div class="signup">
            <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-holder">

                    <input id="nameSign" type="text" class="input @error('nameSign') is-invalid @enderror"
                        placeholder="Username" name="name" value="{{ old('nameSign') }}" required autocomplete="name"
                        autofocus>
                    
                    <input id="phone" type="text" class="input @error('phone') is-invalid @enderror"
                        placeholder="Phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                        autofocus>

                    <input id="emailSign" type="email" class="input @error('emailSign') is-invalid @enderror"
                        placeholder="Email" name="email" value="{{ old('emailSign') }}" required autocomplete="email">

                    <input id="passwordSign" type="password" class="input @error('passwordSign') is-invalid @enderror"
                        placeholder="Password" name="password" required autocomplete="new-password">

                    <input id="password-confirm" type="password" class="input" name="password_confirmation"
                        placeholder="Re-Type Password" required autocomplete="new-password">
                        
                </div>
                <button class="submit-btn" type="submit">Sign up</button>
            </form>
        </div>
        <form action="{{route('login')}}" class="d-block" method="post">
            @csrf
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                    <div class="form-holder">
                        <div class="form-group icon_parent">
                            <input type="email" name="email" id="email"
                                class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                                autocomplete="email" autofocus placeholder="Email Address" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group icon_parent">
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br />
                    <button class="submit-btn" type="submit">Log in</button>
                    <a href="{{ url('/auth/redirect/facebook') }}" class="login-with-fb">
                        <span class="icon fab fa-facebook-f"></span>
                        Login with facebook
                    </a>
                    <a href="{{ url('/auth/redirect/google') }}" class="login-with-google">
                        <span class="icon fab fa-google"></span>
                        Login with google
                    </a>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- jquery -->
    <script src="{{asset('public/panel/assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{asset('public/panel/assets/js/bootstrap.min.js')}}"></script>
    <!-- Fontawesome-->
    <script src="{{asset('public/panel/assets/js/all.min.js')}}"></script>

    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <!-- Main js -->
    <script src="{{asset('public/panel/assets/js/main.js')}}"></script>

    <!-- login script js -->
    <script>
        console.clear();

        const loginBtn = document.getElementById('login');
        const signupBtn = document.getElementById('signup');

        loginBtn.addEventListener('click', (e) => {
            let parent = e.target.parentNode.parentNode;
            Array.from(e.target.parentNode.parentNode.classList).find((element) => {
                if (element !== "slide-up") {
                    parent.classList.add('slide-up')
                } else {
                    signupBtn.parentNode.classList.add('slide-up')
                    parent.classList.remove('slide-up')
                }
            });
        });

        signupBtn.addEventListener('click', (e) => {
            let parent = e.target.parentNode;
            Array.from(e.target.parentNode.classList).find((element) => {
                if (element !== "slide-up") {
                    parent.classList.add('slide-up')
                } else {
                    loginBtn.parentNode.parentNode.classList.add('slide-up')
                    parent.classList.remove('slide-up')
                }
            });
        });

    </script>
    <!-- end login js -->

    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif

    </script>

    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });

    </script>


</body>

</html>
