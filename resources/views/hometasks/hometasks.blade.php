@extends('layouts.app')
@section('title', 'Список домашних заданий')
@section('groupName', $group->title)
@section('content')
@if(count($hometasks) == 0)
        <div class="text-center">
            <h2>В группе нет домашних заданий</h2>
            <hr>
            @if ($owner)
            <a href="{{ url('/group/' . $group->id . '/hometasks/create') }}" class="btn btn-lg btn-success">
                <span>Добавить ДЗ</span>
            </a>
            @endif
        </div>
@else
    @if ($owner)
    <div class="pull-right">
        <a href="{{ url('/group/' . $group->id . '/hometasks/create') }}" class="text-right">
            <span class="glyphicon glyphicon-plus"></span>
           Добавить домашнее задание
        </a>
    </div>
    @endif
    <h3 class="page-header">Список домашних заданий</h3>
    @foreach($hometasks as $hometask)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $hometask->title }}</div>
            <div class="panel-body">
                {{ $hometask->description }}
            </div>
            <div class="panel-footer">
                <a href="{{ url('/group/' . $group->id . '/hometask/' . $hometask->id) }}" class="btn-success btn btn-sm">
                    <span class="glyphicon glyphicon-eye-open"></span> Перейти
                </a>
                @if ($owner)
                <a href="{{ url('/group/' . $group->id . '/hometask/' . $hometask->id . '/edit') }}" class="btn-primary btn btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> Редактировать
                </a>
                <a href="{{ url('/group/' . $group->id . '/hometask/' . $hometask->id . '/delete') }}" class="btn btn-danger btn-sm">
			        <span class="glyphicon glyphicon-trash"></span> Удалить
                </a>
                @endif
            </div>
        </div>
    @endforeach
@endif
@endsection