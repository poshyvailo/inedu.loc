@extends('layouts.app')
@section('content')
<div id="msg-box">
  <ul>
  </ul>
</div>
<form id="t-box" action="?" style="">
  Имя: <input type="text" class='name' style="width:100px;" >
  <input type="text" class='msg' style="width:500px;" >
  <input type="submit" value="Отправить" style="margin-top:5px;">
</form>
@endsection
