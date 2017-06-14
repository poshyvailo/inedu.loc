@extends('layouts.app')
@section('title', 'Добавить домашнее задание')
@section('content')
    <h3 class="page-header">Изменить домашнее задание</h3>
    <form method="POST" role="form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Домашнее задание</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $hometask->title }}" >
    </div>
    <div class="form-group">
        <label for="description">Задание</label>
        <textarea class="form-control" id="description" name="description" rows="10">{{ $hometask->description }}</textarea>
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="name">Загрузить файл</label>--}}
        {{--<input type="file" class="form-control"  >--}}
    {{--</div>--}}
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection