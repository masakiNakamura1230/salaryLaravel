<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>給与管理システム</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    @yield('styles')
  </head>
  <body>
    
    <div id="logOutWrap">
      <div id="logOutBox">
        <a id="logOut" href="login.php">ログアウト</a>
        @yield('logout')
      </div>
    </div>

    @yield('title')

    <main>
      @yield('content')
    </main>

    @yield('script')
  </body>
</html>
