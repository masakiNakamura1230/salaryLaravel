@extends('layout')

@section('logout')
  <a id="talentListBtn" href="{{ route('talents.list') }}">タレント一覧</a>
@endsection

@section('title')
  <h1 class="pageTitle" data-en="SalaryList"><span>給与一覧画面</span></h1>
@endsection

@section('content')
<div id="listHead">
  <div class="listHeadItem bbb">
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
        <form action="{{ route('salaries.edit') }}" method="get" class="centerItem">
          <input type="hidden" name="id" value="{{ $salary->id }}">
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
@endsection

