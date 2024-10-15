<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{config('app.name', 'Carlog')}}</title>
</head>
<body>
    <div id="app">
        <div class="container">
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
