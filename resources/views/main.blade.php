@extends('layouts.app')
@section('title', 'Главная')
@section('content')
@if (Auth::guest())
    <div>
        <h2 class="page-header">Главная</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.</p>
        <p>Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.</p>
        <p>Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.</p>
    </div>
@else
    <h2 class="page-header">Последние обновления ваших групп</h2>
    @if ($news)
        @foreach($news['article'] as $collection)
            @if(count($collection) == 0)
                <h3>У вас нет статей</h3>
            @else
                <h3>Последнии статьи</h3>
            <table class="table">
                <tr>
                    <th>Заголовок</th>
                    <th>Группа</th>
                    <th>Дата создания</th>
                    <th>Дата обновления</th>
                </tr>
                @foreach($collection as $item)
                    <tr>
                        <td>
                            <a href="{{ url('/group/' . $item->group_id . '/article/' . $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td>{{ $item->group->title }}</td>
                        <td>{{ date('d.m.Y в H:i', strtotime($item->created_at)) }}</td>
                        <td>{{ date('d.m.Y в H:i', strtotime($item->updated_at)) }}</td>
                    </tr>
                @endforeach
            </table>
            @endif
        @endforeach

        @foreach($news['hometask'] as $collection)
            @if(count($collection) == 0)
                <h3>У вас нет домашних заданий</h3>
            @else
                <h3>Последние домашние задания</h3>
            <table class="table">
                <tr>
                    <th>Заголовок</th>
                    <th>Группа</th>
                    <th>Дата создания</th>
                    <th>Дата обновления</th>
                </tr>
                @foreach($collection as $item)
                    <tr>
                        <td>
                            <a href="{{ url('/group/' . $item->group_id . '/article/' . $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td>{{ $item->group->title }}</td>
                        <td>{{ date('d.m.Y в H:i', strtotime($item->created_at)) }}</td>
                        <td>{{ date('d.m.Y в H:i', strtotime($item->updated_at)) }}</td>
                    </tr>
                @endforeach
            </table>
            @endif
        @endforeach

        @foreach($news['events'] as $collection)
            @if(count($collection) == 0)
                <h3>У вас нет событий</h3>
            @else
                <h3>Последние события</h3>
            <table class="table">
                <tr>
                    <th>Заголовок</th>
                    <th>Группа</th>
                    <th>Дата создания</th>
                    <th>Дата обновления</th>
                </tr>
                @foreach($collection as $item)
                    <tr>
                        <td>
                            <a href="{{ url('/group/' . $item->group_id . '/article/' . $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td>{{ $item->group->title }}</td>
                        <td>{{ date('d.m.Y в H:i', strtotime($item->created_at)) }}</td>
                        <td>{{ date('d.m.Y в H:i', strtotime($item->updated_at)) }}</td>
                    </tr>
                @endforeach
            </table>
            @endif
        @endforeach
    @else
        <h4>Вы не состоите ни в одной группе</h4>
    @endif
@endif

@endsection