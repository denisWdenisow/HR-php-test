<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('title')

        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css">
  		<link rel="stylesheet" href="css/style.css">
  	
        
        
    </head>
    <body>
    
        @yield('content')
        
        <!-- app.js -->
        <script src="js/app.js"></script>
        <!-- script.js -->
        <script src="js/script.js"></script>
    </body>
</html>
