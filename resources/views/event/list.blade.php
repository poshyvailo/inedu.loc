@extends('layouts.app')
@section('title', 'События')
@section('groupName', $group->title)
@section('content')
    @if(count($events) == 0)
        <div class="text-center">
            <h2>В группе нет событий</h2>
            <hr>
            @if ($owner)
                <a href="{{ url('/group/' . $group->id . '/hometasks/create') }}" class="btn btn-lg btn-success">
                    <span>Добавить ДЗ</span>
                </a>
            @endif
        </div>
    @else
        <h3 class="page-header">Список событий</h3>
        @foreach($events as $event)

        @endforeach
    @endif
@endsection