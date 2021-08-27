<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
      <h1>Приваетная страница</h1>
      <p>Сюда попадают только аутентифицированные пользователи</p>
      <form class="" action="{{ route('user.logout') }}" method="get">
        <button type="submit" name="button">Выход</button>
      </form>
      </body>
</html>
