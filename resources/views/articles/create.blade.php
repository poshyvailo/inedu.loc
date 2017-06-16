@extends('layouts.app')
@section('title', 'Добавить статью')
@section('groupName', $group->title)
@section('content')
    <h3 class="page-header">Добавить статью</h3>
    <form method="POST" role="form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Название статьи</label>
        <input type="text" class="form-control" name="title" id="title" >
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Добавить статью</button>
    </form>
@endsection