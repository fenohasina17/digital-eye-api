<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php $setting =\App\Models\Setting::pluck('value','name')->toArray(); @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16"
          href="@isset($setting['favicon']) {{ asset('uploads/'.$setting['favicon']) }}@endisset">
    <title>Privacy Policy</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

    @yield('stylesheets')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div style="text-align: center">
    <img src="@isset($setting['logo']) {{ asset('uploads/'.$setting['logo']) }}@endisset" alt="home" class="light-logo" style="width: 160px">
</div>

<div style="margin: 15px;">
    <div><span style="font-size: 24px; font-weight: bold;">Privacy Policy</span></div><div><br></div><div>Digital Eye Student Security is committed to respecting the personal privacy of people who visit this web site. This section summarizes the privacy policy and practices Digital Eye Student Security.</div><div><br></div><div><span style="font-weight: bold; font-size: 24px;">Security</span></div><div>&nbsp;</div><div>
        Digital Eye Student Security does not automatically gather any personal information-such as your name, phone number, email address, or street address-when you visit our web site. This type of information is obtained only when you yourself submit it in person, email, facsimile, or by phone.
        Whenever Digital Eye Student Security conducts online transactions on your behalf, 128-bit SSL encryption (secure socket layer) is used to encode your information and protect its confidentiality while it is in transit.
        Any information you provide is disclosed only to officials who need it to process your transaction. We do not create individual profiles from the information that users provide. As well, we do not disclose the information to any party inside or outside Digital Eye Student Security unless authorized by law.
        All personal information you provide is protected under the federal Privacy Act (PIPEDA).
        If you have any questions or comments about Digital Eye Student Security privacy policies and practices, or if you are not satisfied that we have adequately respected your privacy, you are encouraged to contact Digital Eye Student Security</div><div><br></div>
</div>
@yield('scripts')
</body>
</html>
