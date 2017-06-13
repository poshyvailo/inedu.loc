@extends('layouts.app')
@section('title', 'Пригласить друга в группу ' . $group->title)
@section('groupName', $group->title)
@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Пригласить друга в {{ $group->title }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Отправить приглашение
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
