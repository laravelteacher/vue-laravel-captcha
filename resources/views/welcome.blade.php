<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       
    </head>
    <body>
    <!-- id="app"  take from  el: '#app', in app.js -->
    <div id="app">

        <index></index>
     </div>

<style>
small {
	color: red;
	display: none;
}
.mx_form_inv .mx_empty_filed ~ small {
	display: block;
}
.mx_form_inv .mx_recaptcha_failed small {
	display: block;
}

.passwords{
    display:none
}
</style>
       <!-- Scripts -->
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script src="{{ asset('js/app.js') }}" defer></script>
  	<!-- development version, includes helpful console warnings -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

<script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>
    </body>
</html>
