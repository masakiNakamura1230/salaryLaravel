@extends('layout')

@section('logout')
  <a id="userList" href="userList.php" >ユーザー一覧</a>
@endsection

@section('title')
  <h1 class="pageTitle" data-en="TalentList"><span>タレント一覧</span></h1>
@endsection

@section('content')
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
@endsection

