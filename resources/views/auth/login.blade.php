
<!doctype html>
<html class="fixed">
<head>
    <title>{{ env('app.name', 'IVA CMS') }}</title>
    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Admin control" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="IVA CMS">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('css/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('vendor/modernizr/modernizr.js') }}"></script>

</head>
<body>
<!-- start: page -->

<section class="body-sign">
    @if (count($errors))
        <ul>
            @foreach($errors->all() as $error)
                // Remove the spaces between the brackets
                <li>{ { $error } }</li>
            @endforeach
        </ul>
    @endif
    <div class="center-sign">
        <a href="{{ url('/') }}" class="logo float-left">
            <img src="{{ asset('img/logo.png') }}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i> @lang('template_login.login')</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label>@lang('template_login.email')</label>
                        <div class="input-group input-group-icon">
                            <input {{ $errors->has('email') ? 'id="inputError"' : 'id="email"' }} id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autofocus>
                            <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">@lang('template_login.password')</label>
                            @if (Route::has('password.request'))
                                <a class="float-right" href="{{ route('password.request') }}">
                                    @lang('template_login.forgotyourpassword')
                                </a>
                            @endif
                        </div>
                        <div class="input-group input-group-icon">
                            <input id="password" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
                                <label for="remember">@lang('template_login.rememberme')</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary mt-2">@lang('template_login.enterlogin')</button>
                        </div>
                    </div>

                    <span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>@lang('template_login.or')</span>
							</span>

                    <div class="mb-1 text-center">
                        <!--
                        <a class="btn btn-facebook mb-3 ml-1 mr-1" href="#">Connect with <i class="fa fa-facebook"></i></a>
                        <a class="btn btn-twitter mb-3 ml-1 mr-1" href="#">Connect with <i class="fa fa-twitter"></i></a>
                        -->
                    </div>

                    <p class="text-center">@lang('template_login.donthaveanaccountyet') <a href="{{ route('register') }}">@lang('template_login.signup')</a></p>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">{{date('Y')}} @lang('template_main.copyrights')</p>
    </div>
</section>

<!-- end: page -->

<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

</body>
</html>





