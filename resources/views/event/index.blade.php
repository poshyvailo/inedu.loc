@extends('layouts.app')
@section('title', 'События')
@section('groupName', $group->title)
@section('content')
    @if($owner)
    <div class="edit-calendar">
        <a href="{{ url('/group/' . $group->id . '/events/list') }}" class="btn btn-primary">
            <i class="fa fa-pencil" aria-hidden="true"></i>
            Редактировать события
        </a>
    </div>
    @endif
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
@endsection