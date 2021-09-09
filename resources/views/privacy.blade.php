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
    <div>
        <span style="font-size: 24px; font-weight: bold;">Disclaimer</span>
    </div><div><br></div><div>
       Neither Golden Plains Unified School District or MVS are licensed medical doctors and are not providing medical advice, or diagnosing or treating any condition you may have. Always consult with your physician about your personal health or medical related issues. The contents of this App and related communications are presented for information purposes only and are not intended as medical advice, nor to replace the advice of a medical doctor or other health care professional. Anyone experiencing symptoms of covid-19 should first consult with, and seek clearance and guidance from, a competent health care professional. The information on this App and related communications should not be construed as specific advice. It is presented for the sole purpose of stimulating awareness and reducing the spread of any viruses.
    </div><div><br></div><div>
        <span style="font-weight: bold; font-size: 24px;">Español</span>
    </div><div>&nbsp;</div><div>
        Ni el Distrito Escolar Unificado de Golden Plains ni MVS son médicos con licencia y no brindan asesoramiento médico, ni diagnostican ni tratan ninguna afección que pueda tener. Siempre consulte con su médico acerca de su salud personal o problemas médicos relacionados. El contenido de esta aplicación y las comunicaciones relacionadas se presentan únicamente con fines informativos y no pretenden ser un consejo médico ni reemplazar el consejo de un médico u otro profesional de la salud. Cualquier persona que experimente síntomas de covid-19 debe consultar primero con un profesional de la salud competente y buscar autorización y orientación. La información contenida en esta aplicación y las comunicaciones relacionadas no debe interpretarse como un consejo específico. Se presenta con el único propósito de estimular la conciencia y reducir la propagación de virus.
    </div><div><br></div>
</div>
@yield('scripts')
</body>
</html>
