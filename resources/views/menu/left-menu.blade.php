<ul class="list-group">
    <a href="{{ url('') }}" class="list-group-item{!! Request::segment(1) == '' ? ' active' : null !!}">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> Новости
    </a>
    <a href="{{ url('/classmates') }}"
       class="list-group-item{!! Request::segment(1) == 'classmates' ? ' active' : null !!}">
        <i class="fa fa-address-book-o" aria-hidden="true"></i> Одногрупники
    </a>
    <a href="{{ url('/groups') }}" class="list-group-item{!! Request::segment(1) == 'groups' ? ' active' : null !!}">
        <i class="fa fa-users" aria-hidden="true"></i> Группы
    </a>
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
        <a href="{{ url('/forums') }}"
           class="list-group-item{!! Request::segment(1) == 'forums' ? ' active' : null !!}">
            <i class="fa fa-users" aria-hidden="true"></i> Участники
        </a>
    </ul>
    @if(isset($owner) && $owner)
        <a href="{{ url('/groups/' . $group->id . '/invite') }}" class="btn btn-primary">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> Пригласить в группу
        </a>
    @endif
@endif