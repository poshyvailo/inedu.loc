@extends('layouts.app')
@section('title', 'События')
@section('groupName', $group->title)
@section('content')
    @if(count($events) == 0)
        <div class="text-center">
            <h2 class="page-header">В группе нет событий</h2>
            <a href="{{ url('/group/' . $group->id . '/events/create') }}" class="btn btn-lg btn-success">
                <span class="glyphicon glyphicon-plus"></span>
                Добавить событие
            </a>
        </div>
    @else
        <div class="pull-right">
            <a href="{{ url('/group/' . $group->id . '/events/create') }}">
                <span class="glyphicon glyphicon-plus"></span>
                Добавить событие
            </a>
        </div>
        <h3 class="page-header">Список событий</h3>
        <table class="table">
            <tr>
                <th>Заголовок</th>
                <th>Начало</th>
                <th>Конец</th>
                <th>Весь день</th>
                <th>Действия</th>
            </tr>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{!! date('d.m.Y H:i', strtotime($event->start)) !!}</td>
                <td>{!! date('d.m.Y H:i', strtotime($event->end)) !!}</td>
                <td>{!! $event->all_day
                        ? '<i class="fa fa-check-square-o" aria-hidden="true"></i>'
                        : '<i class="fa fa-square-o" aria-hidden="true"></i>'
                    !!}
                </td>
                <td>
                    <a href="{{ url('/group/' . $group->id . '/event/' . $event->id . '/edit') }}" class="btn-primary btn btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ url('/group/' . $group->id . '/event/' . $event->id . '/delete') }}" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </table>
    @endif
@endsection