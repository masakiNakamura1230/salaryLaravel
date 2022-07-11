<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>給与管理システム</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
    
    <div id="logOutWrap">
      <div id="logOutBox">
        <a id="logOut" href="login.php">ログアウト</a>
        <a id="userList" href="userList.php" >ユーザー一覧</a>
      </div>
    </div>

    <h1 class="pageTitle" data-en="TalentList"><span>タレント一覧</span></h1>

    <main>
      <table id="talentTable">
        @foreach($talents as $talent)
        <tr>
          <td class="tableInput">
            <a href="{{ route('salaries.list', ['id' => $talent->id]) }}" class="talentName" >
                {{ $talent->name }}
            </a>
          </td>
        </tr>
        @endforeach
      </table>
    </main>
  </body>
</html>
