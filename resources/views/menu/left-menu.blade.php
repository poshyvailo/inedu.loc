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
    <li<?php echo Request::segment(1) == 'hometasks' ? ' class="active"' : null ?>>
        <a href="{{ url('/hometasks') }}">Домашнии задания</a>
    </li>
    <li<?php echo Request::segment(1) == 'events' ? ' class="active"' : null ?>>
        <a href="{{ url('/events') }}">События</a>
    </li>
    <li<?php echo Request::segment(1) == 'forums' ? ' class="active"' : null ?>>
        <a href="{{ url('/forums') }}">Форумы</a>
    </li>
</ul>