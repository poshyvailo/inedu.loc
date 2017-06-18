@extends('layouts.app')
@section('title', 'Добавить домашнее задание')
@section('groupName', $group->title)
@section('content')
    <h3 class="page-header">Создать новую тему</h3>
    <form  method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="subject" class="control-label">Заголовок темы</label>
                <input type="text" id="subject" class="form-control" name="subject" value="{{ old('subject') }}">
            </div>

            <div class="form-group">
                <label class="control-label">Сообщение</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{{ $user->name }}">
                            <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{!!$user->name!!}
                        </label>
                    @endforeach
                </div>
            @endif
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
    </form>
@stop