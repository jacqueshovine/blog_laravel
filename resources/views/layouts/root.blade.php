<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"  />
    </head>
    <body class="antialiased">

      @include('components.navbar')

      <div class="container-fluid">

        <!-- Lors du rendu de la page, on part du haut du fichier puis on attend la partie body -->
        @yield('body')
      
      </div>

    </body>
</html>
