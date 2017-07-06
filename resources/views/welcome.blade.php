<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link href="{{asset('css/app.css')}} " rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      
    </head>
    <body>
        <div id="app">
        <div class="container">
        @include('partial.layout')
          <router-view ></router-view>  
        
        </div>

        </div>
     
    </body>
    
    
    <SCRIPT src="js/app.js"></SCRIPT>
</html>
