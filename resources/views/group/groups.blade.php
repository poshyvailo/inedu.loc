@extends('layouts.app')

@section('content')
    @if(count($groups) == 0)
        <div class="text-center">
            <h2>У вас нет групп</h2>
            <hr>
            <a href="{{ url('/groups/create') }}" class="btn btn-lg btn-success">
                <span class="glyphicon glyphicon-plus"></span>
                Создать группу
            </a>
        </div>
    @else
    <h3 class="page-header">Список групп</h3>
    <div class="pull-right">
        <a href="{{ url('/groups/create') }}" class="text-right">
            <span class="glyphicon glyphicon-plus"></span>
            Создать группу
        </a>
    </div>
    <h4>Вы администратор:</h4>
    @foreach($groups as $group)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $group->title }}</div>
            <div class="panel-body">
                {{ $group->description }}
            </div>
            <div class="panel-footer">
                <a href="#" class="btn-success btn btn-sm">
                    <span class="glyphicon glyphicon-eye-open"></span> Перейти
                </a>
                <a href="#" class="btn-primary btn btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> Редактировать
                </a>
                <a href="#" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-trash"></span> Удалить
                </a>
            </div>
        </div>
    @endforeach
    <h4>Вы участник:</h4>
    @endif
@endsection