@extends('layouts.app')
@section('title', 'Редактировать статью')
@section('groupName', $group->title)
@section('content')
    <h3 class="page-header">Редактировать статью</h3>
    <form method="POST" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Название статьи</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}" >
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="10">{{ $article->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Редактировать статью</button>
    </form>
@endsection