<div class="media">
    <div class="pull-left">
        <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}" class="img-thumbnail avatar">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $message->user->name }}</h4>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Опубликовано: {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>