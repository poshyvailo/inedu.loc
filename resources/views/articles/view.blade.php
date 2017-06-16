@extends('layouts.app')

@section('title', 'Статья - ' . $article->title)
@section('groupName', $group->title)

@section('content')
    <h3 class="page-header">{{ $article->title }}</h3>
    <p>{{ $article->description }}</p>
@endsection