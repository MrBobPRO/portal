<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <title>TGEM</title>

   <meta name="robots" content="none"/>
   <meta name="googlebot" content="noindex, nofollow"/>
   <meta name="yandex" content="none"/>

   {{-- Roboto Font --}}
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

   {{-- Bootstrap 5.0 --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   {{-- Material Icons --}}
   <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
   {{-- Select2. NOT DEFINED ON TEMPLATES/MASTER--}}
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      
   <link href="{{ asset('css/main/styles.css') }}" rel="stylesheet">
   <link href="{{ asset('css/main/media.css') }}" rel="stylesheet">
   {{-- include no sidebar and no menu styles --}}
   <link href="{{ asset('css/no_sidebar/styles.css') }}" rel="stylesheet">
   
   @include('templates.styles')

      <style>
         :root {
            --color-scheme: {{\Auth::user()->colorScheme}};
         }
      </style>

   
</head>
<body>

   @include('templates.toolbar')
   
   <main>
      <div class="content">
         @yield('content')
      </div>
   </main>

   @include('templates.dashboard')

   {{-- JQuery 3.6 --}}
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   {{-- Bootstrap 5.0 --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
   {{-- Select2. NOT DEFINED ON TEMPLATES/MASTER--}}
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script src="{{ asset('js/main/scripts.js') }}"></script>

   @include('templates.scripts')

</body>
</html>