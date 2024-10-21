<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{config('app.name', 'Carlog')}}</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- kell gomb ami megjeleníti az autógyártókat -->
    <div id="app">
        <div class="container">
            <h1>Autó kezelő cucc dolog</h1>
            <div class="menu">
                <a href="{{route("home")}}">Home</a>
                <a href="{{route("makers")}}">Makers</a>
                <a href="{{route("fuels")}}">Fuels</a>
                <a href="{{route("models")}}">Models</a>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <footer class="text-center">
            {{config('app.name', 'Carlog')}} v{{config('app.version')}} (PHP v{{PHP_VERSION}})
        </footer>
    </div>
</body>
</html>
