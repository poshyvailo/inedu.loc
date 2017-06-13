@if (app('request')->session()->has('message_warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {!! app('request')->session()->get('message_warning') !!}
</div>
@endif