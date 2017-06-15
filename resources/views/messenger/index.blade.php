@extends('layouts.app')

@section('content')
<a href="/messages/create">Create New Message</a>
    @include('messenger.partials.flash')
    
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop