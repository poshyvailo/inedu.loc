@extends('layouts.app')
@section('title', 'Форумы')
@section('groupName', $group->title)
@section('content')

    {{--@include('messenger.partials.flash')--}}

    @if (count($threads) == 0)
        <div class="text-center">
            <h2>В группе нет тем</h2>
            <hr>
            <a href="{{ url('/group/' . $group->id . '/forums/create') }}" class="btn btn-lg btn-success">
                <span>Создать тему</span>
            </a>
        </div>
    @else
        <div class="pull-right">
            <a href="{{ url('/group/' . $group->id . '/forums/create') }}" class="text-right">
                <span class="glyphicon glyphicon-plus"></span>
                Создать новую тему
            </a>
        </div>
        <h3 class="page-header">Форумы</h3>
    @foreach($threads as $thread)
        <?php $class = $thread->isUnread(Auth::id()) ? 'panel-success' : 'panel-default'; ?>
        <div class="panel {{ $class }}">
            <div class="panel-heading">
                <h3 class="panel-title">
                <div class="pull-right">
                    Непрочитаных сообщений: {{ $thread->userUnreadMessagesCount(Auth::id()) }}
                </div>
                    <a href="{{ url ('/group/' . $group->id . '/forum/' . $thread->id) }}">{{ $thread->subject }}</a>
                </h3>
            </div>
            <div class="panel-body">
                <p>{{ $thread->latestMessage->body }}</p>

                {{--<p><small><strong>Участники:</strong> {{ $thread->participantsString(Auth::id()) }}</small></p>--}}
            </div>
            <div class="panel-footer">
                <small><strong>Создал:</strong> {{ $thread->creator()->name }} {{ $thread->creator()->surname }}</small>
            </div>
        </div>
    @endforeach
    @endif
@stop