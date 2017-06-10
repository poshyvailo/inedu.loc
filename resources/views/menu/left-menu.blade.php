<ul class="list-group">
@if (Request::segment(1) != 'groups')
    <a href="{{ url('/groups') }}" class="list-group-item{!! Request::segment(1) == '' ? ' active' : null !!}">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> Новости
    </a>
    <a href="{{ url('/classmates') }}" class="list-group-item{!! Request::segment(1) == 'classmates' ? ' active' : null !!}">
        <i class="fa fa-address-book-o" aria-hidden="true"></i> Одногрупники
    </a>
    <a href="{{ url('/groups') }}" class="list-group-item{!! Request::segment(1) == 'groups' ? ' active' : null !!}">
        <i class="fa fa-users" aria-hidden="true"></i> Группы
    </a>
</ul>
@elseif (Request::segment(1) == 'groups' && !Request::segment(2))
    <a href="{{ url('/groups') }}" class="list-group-item{!! Request::segment(1) == 'groups' ? ' active' : null !!}">
        <i class="fa fa-users" aria-hidden="true"></i> Группы
    </a>
@elseif (Request::segment(1) == 'groups' && Request::segment(2))
    <a href="{{ url('/articles') }}" class="list-group-item{!! Request::segment(1) == 'articles' ? ' active' : null !!}">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> Статьи
    </a>
    <a href="{{ url('/home-tasks') }}" class="list-group-item{!! Request::segment(1) == 'home-tasks' ? ' active' : null !!}">
        <i class="fa fa-tasks" aria-hidden="true"></i> Домашнии задания
    </a>
    <a href="{{ url('/events') }}" class="list-group-item{!! Request::segment(1) == 'events' ? ' active' : null !!}">
        <i class="fa fa-calendar" aria-hidden="true"></i> События
    </a>
    <a href="{{ url('/forums') }}" class="list-group-item{!! Request::segment(1) == 'forums' ? ' active' : null !!}">
        <i class="fa fa-comments-o" aria-hidden="true"></i> Форумы
    </a>
@endif
</ul>