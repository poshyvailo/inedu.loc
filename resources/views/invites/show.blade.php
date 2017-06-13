@extends('layouts.app')
@section('title', 'Приглашения в группу')
@section('content')
    <h3 class="page-header">Приглашения</h3>
@if (count($invites) > 0)
<table class="table">
    <tr>
       <th>Группа</th>
       <th>Приглашает</th>
       <th>Действия</th>
    </tr>
    @foreach($invites as $invite)
        <tr>
            <td>{{ $invite->group->title }}</td>
            <td>{{ $invite->user->name }} {{ $invite->user->surname }}</td>
            <td>
                <a href="{{ url('/invite/' . $invite->group->id . '/join') }}" class="btn btn-primary">Принять</a>
                <a href="{{ url('/invite/' . $invite->group->id . '/reject') }}" class="btn btn-danger">Отклонить</a>
            </td>
        </tr>
    @endforeach
</table>
@endif
@endsection