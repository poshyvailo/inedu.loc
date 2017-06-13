@extends('layouts.app')
@section('title', 'Создание группы')
@section('content')
    <h3 class="page-header">Создание группы</h3>
<div>
    <form method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="group-title">Название группы</label>
            <input type="text" name="title" class="form-control" id="group-title">
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="group-description">Описание группы</label>
            <textarea name="description" class="form-control" id="group-description" rows="10"></textarea>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
</div>
@endsection