@extends('layouts.app')

@section('content')
    <h3 class="page-header">{{ $title }}</h3>
    <p>{{ $description }}</p>
    @if ($owner)
    <p>Owner</p>
    @endif
@endsection