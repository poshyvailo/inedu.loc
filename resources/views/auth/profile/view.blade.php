@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $user->avatar }}" class="img-thumbnail">
            </div>
            <div class="col-md-6">
                <p><strong>Имя:</strong> {{ $user->name }}</p>
                <p><strong>Фамилия:</strong> {{ $user->surname }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                @if (Auth::user()->id === $user->id)
                <div>
                    <a href="{{ url('/profile/edit/' . $user->id) }}" class="btn btn-primary">Изменить данные</a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection