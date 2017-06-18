@extends('layouts.app')
@section('title', 'События')
@section('content')
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
@endsection