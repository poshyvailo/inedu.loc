@extends('layouts.app')

@section('title', $group->title)
@section('groupName', $group->title)

@section('content')
    <h3 class="page-header">{{ $group->title }}</h3>
    <p>{{ $group->description }}</p>
@endsection