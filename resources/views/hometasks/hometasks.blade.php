@extends('layouts.app')
@section('content')
@if(count($hometasks) == 0)
        <div class="text-center">
            <h2>В группе нет ДЗ</h2>
            <hr>
            @if ($owner)
            <a href="{{ url('/hometasks/hometaskscreate') }}" class="btn btn-lg btn-success">
                <span>Добавить ДЗ</span>
            </a>
            @endif
        </div>
@else
    <h3 class="page-header">Список ДЗ</h3>
    <div class="pull-right">
        <a href="{{ url('/hometasks/hometaskscreate') }}" class="text-right">
            <span class="glyphicon glyphicon-plus"></span>
           Добавить ДЗ
        </a>
    </div>
    @foreach($hometasks as $hometask)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $hometask->title }}</div>
            <div class="panel-body">
                {{ $hometask->description }}
            </div>
            <div class="panel-footer">
                <a href="{{ url('/hometasks/' . $hometask->id) }}" class="btn-success btn btn-sm">
                    <span class="glyphicon glyphicon-eye-open"></span> Перейти
                </a>
                <a href="{{ url('/hometasks/' . $hometask->id . '/edit') }}" class="btn-primary btn btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> Редактировать
                </a>
                <a href="#" class="btn btn-danger btn-sm">
			<span class="glyphicon glyphicon-trash"></span> Удалить
                </a>
            </div>
        </div>
    @endforeach
@endif
@endsection