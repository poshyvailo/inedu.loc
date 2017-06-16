@extends('layouts.app')
@section('title', 'Список статей')
@section('groupName', $group->title)
@section('content')
    @if(count($articles) == 0)
        <div class="text-center">
            <h2>В группе нет статей</h2>
            <hr>
            @if ($owner)
                <a href="{{ url('/group/' . $group->id . '/articles/create') }}" class="btn btn-lg btn-success">
                    <span>Добавить статью</span>
                </a>
            @endif
        </div>
    @else
        @if ($owner)
            <div class="pull-right">
                <a href="{{ url('/group/' . $group->id . '/articles/create') }}" class="text-right">
                    <span class="glyphicon glyphicon-plus"></span>
                    Добавить статью
                </a>
            </div>
        @endif
        <h3 class="page-header">Список статей</h3>
        @foreach($articles as $article)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $article->title }}</div>
                <div class="panel-body">
                    {{ $article->description }}
                </div>
                <div class="panel-footer">
                    <a href="{{ url('/group/' . $group->id . '/article/' . $article->id) }}" class="btn-success btn btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span> Перейти
                    </a>
                    @if ($owner)
                        <a href="{{ url('/group/' . $group->id . '/article/' . $article->id . '/edit') }}" class="btn-primary btn btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> Редактировать
                        </a>
                        <a href="{{ url('/group/' . $group->id . '/article/' . $article->id . '/delete') }}" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-trash"></span> Удалить
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection