@extends('layouts.app')

@section('content')
    <?php var_dump($errors) ?>
    <form action="{{ url('/hometasks/create') }}" method="POST" role="form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Домашнее задание</label>
        <input type="text" class="form-control" name="name" id="name" >
    </div>
    <div class="form-group">
        <label for="description">Задание</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="name">Загрузить файл</label>
        <input type="file" class="form-control"  >
    </div>
    <button type="submit" class="btn btn-success">Добавить ДЗ</button>
</form>
@endsection