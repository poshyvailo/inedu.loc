@extends('layouts.app')
@section('title', 'Группы')
@section('content')
    @if(count($ownerGroups) == 0)
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
    @foreach($ownerGroups as $group)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $group->title }}</div>
            <div class="panel-body">
                {{ $group->description }}
            </div>
            <div class="panel-footer">
                <a href="{{ url('/groups/' . $group->id) }}" class="btn-success btn btn-sm">
                    <span class="glyphicon glyphicon-eye-open"></span> Перейти
                </a>
                <a href="{{ url('/groups/' . $group->id . '/edit') }}" class="btn-primary btn btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> Редактировать
                </a>
                <a href="#" class="btn btn-danger btn-sm">
			<span class="glyphicon glyphicon-trash"></span> Удалить
                </a>
            </div>
        </div>
    @endforeach
    @endif
    @if(count($memberGroups) > 0)
    <h4>Вы участник:</h4>

    @foreach($memberGroups as $group)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $group->title }}</div>
            <div class="panel-body">
                {{ $group->description }}
            </div>
            <div class="panel-footer">
                <a href="{{ url('/groups/' . $group->id) }}" class="btn-success btn btn-sm">
                    <span class="glyphicon glyphicon-eye-open"></span> Перейти
                </a>
                <a href="#" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-trash"></span> Выйти из группы
                </a>
            </div>
        </div>
    @endforeach
    @endif

@endsection