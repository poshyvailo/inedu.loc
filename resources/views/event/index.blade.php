@extends('layouts.app')
@section('title', 'События')
@section('groupName', $group->title)
@section('content')
    <div>
        <a href="{{ url('/group/' . $group->id . '/events/list') }}" class="btn btn-primary">Список событий</a>
    </div>
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
@endsection