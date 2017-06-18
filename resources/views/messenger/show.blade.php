@extends('layouts.app')
@section('title', 'Тема: ' . $thread->subject)
@section('groupName', $group->title)
@section('content')
        <h3 class="page-header">Тема: {{ $thread->subject }}</h3>
        @each('messenger.partials.messages', $thread->messages, 'message')
        <hr>
        @include('messenger.partials.form-message')
@stop