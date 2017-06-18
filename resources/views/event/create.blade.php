@extends('layouts.app')
@section('title', 'Добавить событие')
@section('groupName', $group->title)
@section('content')
    <h3 class="page-header">Добавить событие</h3>
    <form method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Заголовок</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
            <label for="start">Дата и время начала</label>
            <div class='input-group date' id='start'>
                <input type='text' name="start" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
            <label for="end">Дата и время конца</label>
            <div class='input-group date' id='end'>
                <input type='text' name="end" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="checkbox">
            <label for="all_day">
                <input type="checkbox" name="all_day" id="all_day"> Событие всего дня
            </label>
        </div>
        <input type="submit" value="Добавить" class="btn btn-primary">
    </form>
    <script type="text/javascript">
        $(function () {
            $('#start, #end').datetimepicker({
                locale: 'ru'
            });
        });
    </script>
@endsection