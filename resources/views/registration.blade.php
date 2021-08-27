<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
      <h1>Регистрация</h1>
      <form method="post" action="{{ route('user.registration') }}">
        @csrf
        <input type="text" name="email" value="" placeholder="Email">
        <input type="password" name="password" value="" placeholder="password">
        <button type="submit" name="sendMe" value="1">Зарегаться</button>
      </form>
    </body>
</html>
