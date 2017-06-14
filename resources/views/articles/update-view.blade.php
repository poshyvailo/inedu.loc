@extends('layouts.app')

@section('content')
    <?php var_dump($errors) ?>
    <form action="{{ url('/hometasks/create') }}" method="POST" role="form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Название статьи</label>
        <input type="text" class="form-control" name="name" id="name" >
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Добавить статью</button>
    </form>
@endsection