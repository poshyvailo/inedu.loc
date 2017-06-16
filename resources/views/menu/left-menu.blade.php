<ul class="nav nav-pills nav-stacked">
    <li<?php echo Request::segment(1) == '' ? ' class="active"' : null ?>>
        <a href="{{ url('/groups') }}">Новости</a>
    </li>
    <li<?php echo Request::segment(1) == 'classmates' ? ' class="active"' : null ?>>
        <a href="{{ url('/classmates') }}">Одногрупники</a>
    </li>
    <li<?php echo Request::segment(1) == 'groups' ? ' class="active"' : null ?>>
        <a href="{{ url('/groups') }}">Группы</a>
    </li>
    <li<?php echo Request::segment(1) == 'articles' ? ' class="active"' : null ?>>
        <a href="{{ url('/articles') }}">Статьи</a>
    </li>
    <li<?php echo Request::segment(1) == 'home-tasks' ? ' class="active"' : null ?>>
        <a href="{{ url('/home-tasks') }}">Домашнии задания</a>
    </li>
    <li<?php echo Request::segment(1) == 'events' ? ' class="active"' : null ?>>
        <a href="{{ url('/events') }}">События</a>
    </li>
    <li<?php echo Request::segment(1) == 'forums' ? ' class="active"' : null ?>>
        <a href="{{ url('/forums') }}">Форумы</a>
    </li>
</ul>
@if ((Request::is('groups/*') || Request::is('group/*')) && !Request::is('groups/create'))
    <h4>@yield('groupName')</h4>
    <ul class="list-group">
        <a href="{{ url('/group/' . $group->id . '/articles') }}"
           class="list-group-item{!! (Request::segment(3) == 'articles' || Request::segment(3) == 'article') ? ' active' : null !!}">
            <i class="fa fa-file-text-o" aria-hidden="true"></i> Статьи
        </a>
        <a href="{{ url('/group/' . $group->id . '/hometasks') }}"
           class="list-group-item{!! (Request::segment(3) == 'hometasks' || Request::segment(3) == 'hometask') ? ' active' : null !!}">
            <i class="fa fa-tasks" aria-hidden="true"></i> Домашнии задания
        </a>
        <a href="{{ url('/events') }}"
           class="list-group-item{!! Request::segment(1) == 'events' ? ' active' : null !!}">
            <i class="fa fa-calendar" aria-hidden="true"></i> События
        </a>
        <a href="{{ url('/forums') }}"
               class="list-group-item{!! Request::segment(1) == 'forums' ? ' active' : null !!}">
            <i class="fa fa-comments-o" aria-hidden="true"></i> Форумы
        </a>
        <a href="{{ url('/group/' . $group->id . '/members') }}"
           class="list-group-item{!! Request::segment(3) == 'members' ? ' active' : null !!}">
            <i class="fa fa-users" aria-hidden="true"></i> Участники
        </a>
    </ul>
    @if(isset($owner) && $owner)
        <a href="{{ url('/groups/' . $group->id . '/invite') }}" class="btn btn-primary">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> Пригласить в группу
        </a>
    @endif
@endif