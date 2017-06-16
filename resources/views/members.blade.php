@extends('layouts.app')
@section('title', 'Участники группы')
@section('groupName', $group->title)
@section('content')
    @if(count($members) == 0)
        <div class="text-center">
            <h2>В группе нет участников</h2>
            <hr>
            @if ($owner)
                <a href="{{ url('/groups/' . $group->id . '/invite') }}" class="btn btn-primary">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i> Пригласить в группу
                </a>
            @endif
        </div>
    @else
        @if ($owner)
            <div class="pull-right">
                <a href="{{ url('/groups/' . $group->id . '/invite') }}">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i> Пригласить в группу
                </a>
            </div>
        @endif
        <h3 class="page-header">Список участников</h3>
        <table class="table">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th></th>
            </tr>
        @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->surname }}</td>
                    <td>
                        <a href="{{ url('/profile/view/' . $member->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
        @endforeach
        </table>
    @endif
@endsection