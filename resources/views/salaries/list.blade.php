<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>給与管理システム</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    
  </head>
  <body>

    <div id="logOutWrap">
      <div id="logOutBox">
        <a id="logOut" href="login.php">ログアウト</a>
        <a id="talentListBtn" href="{{ route('talents.list') }}">タレント一覧</a>
      </div>
    </div>

    <h1 class="pageTitle" data-en="SalaryList"><span>給与一覧画面</span></h1>

    <main>
      <div id="listHead">
        <div class="listHeadItem bbb">
          <!-- <form action="{{ route('salaries.create') }}" method='post'>
            <input class="aaa bbb" type="submit" value="登録">
          </form> -->
          <a href="{{ route('salaries.create') }}" class="aaa">登録</a>
        </div>
        <p class="listHeadItem listHeadItemMonth">
          7月
        </p>
        <div id="managerSelect" class="listHeadItem">
          <form action="" method="post" class="listHeadForm">
            <span>担当者</span>
            <select name="selectManager">
              <option value="9999" selected>全て</option> 
              <option value="1">中村昌樹</option>
              <option value="2">原雄一</option>
            </select>
            <input type="submit" value="絞込">
          </form>
          <form action="" method="post" class="listHeadForm">
            <select name="selectMonth">
              <option selected>7月</option>
              @for($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}">{{ $i }}月</option>
              @endfor
            </select>
            <input type="submit" value="検索">
          </form>
        </div>
      </div>

      <table id="listTable" class="salaryTableDesign salaryTableDesignDetail">
        <thead>
          <tr>
            <th class="centerItem">氏名</th>
            <th class="centerItem">担当者</th>
            <th class="centerItem">仕事内容</th>
            <th class="centerItem">稼働日</th>
            <th class="centerItem">登録日</th>
            <th class="centerItem">給与</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($salaries as $salary)
          <tr>
            <td class="centerItem listTableData">{{ $salary->talentName }}</td>
            <td class="centerItem listTableData">{{ $salary->managerName }}</td>
            <td class="centerItem listTableData">{{ $salary->work }}</td>
            <td class="centerItem listTableData">{{ $salary->working_date }}</td>
            <td class="centerItem listTableData">{{ $salary->updated_at }}</td>
            <td class="rightItem listTableData">{{ $salary->salary }}</td>
            <td class="salaryChange">
              <form action="" method="post" class="centerItem">
                <input type="hidden" name="id" value="{{ $salary->id }}">
                <input type="hidden" name="talentId" value = "{{ $salary->talent_id }}">
                <input type="hidden" name="managerId" value = "{{ $salary->manager_id }}">
                <input type="hidden" name="work" value = "{{ $salary->work }}">
                <input type="hidden" name="workingDateYear" value = "{{ $salary->working_date }}">
                <input type="hidden" name="salary" value = "{{ $salary->salary }}">
                <input class="centerItem" type="submit" value="変更">
              </form>
            </td>
            <td class="salaryDelete">
              <form action="" method="post" class="centerItem">
                <input type="hidden" name="id" value="{{ $salary->id }}">
                <input class="centerItem" type="submit" value="削除" onclick='return confirm("削除してよろしいですか？");' >
              </form>
            </td>
          </tr>
          @endforeach
          <tr class="salaryTableSum">
            <td colspan="5" class="centerItem listTableData salaryTableSumItem">合計</td>
            <td class="rightItem listTableData salaryTableSumItem">
              xxx
            </td>
            <td colspan="2"></td>
          </tr>
        </tbody>
      </table>
    </main>
    <!-- <script src="/js/ajax.js"></script> -->
  </body>
</html>
