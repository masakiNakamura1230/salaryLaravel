@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('logout')
  <a id="salaryListBack" href="{{ route('salaries.list', ['id' => $talent->id]) }}">一覧画面</a>
@endsection

@section('title')
  <h1 class="pageTitle" data-en="SalaryRegist"><span>給与登録</span></h1>
@endsection

@section('content')
@if($errors->any())
  <div class="errorPanel">
    @foreach($errors->all() as $message)
      <span class="errorMsg">
        {{ $message }}
      </span>
    @endforeach  
  </div>
    
  @endif

  <!-- 給与登録フォーム -->
  <form action="{{ route('salaries.create') }}" method="post">
    @csrf
    <!-- 氏名 -->
    <div class="playTextboxWrap">
      <label class="playLabelSelectTalentId" for="userId">氏名</label>
      <select class="textInput" name="talent_id">
        <option value="{{ $talent->id }}">{{ $talent->name }}</option>
      </select>
    </div>

    <!-- 担当者 -->
    <div class="playTextboxWrap">
      <label class="playLabelSelectManagerId" for="userId">担当者</label>
      <select class="textInput" name="manager_id">
        @foreach($managers as $manager)
          <option value="{{ $manager->id }}">{{ $manager->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- 仕事内容 -->
    <div class="playTextboxWrap">
      <input id="work" class="textInput playTextboxWork" type="text" name="work" value="{{ old('work') }}">
      <label class="playLabelWork" for="work">仕事内容</label>
    </div>

    <!-- 稼働日 -->
    <div class="playTextboxWrap">
      <input id="workingDate" class="textInput playTextboxWorkingDate" type="text" name="workingDate" value="{{ old('workingDate') }}">
      <label class="playLabelWorkingDate" for="workingDate">稼働日</label>
    </div>

    <!-- 給与 -->
    <div class="playTextboxWrap">
      <input id="salary" class="textInput playTextboxSalary" type="text" name="salary" value="{{ old('salary') }}">
      <label class="playLabelSalary" for="salary">給与</label>
    </div>

    <input class="btn" type="submit" value="登録">
  </form>
@endsection

@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script src="/js/main.js"></script>
  <script>
    flatpickr(document.getElementById('workingDate'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      maxDate: new Date()
    });
  </script>
@endsection
