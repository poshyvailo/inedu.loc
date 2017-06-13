@extends('layouts.app')
@section('content')
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">КОНТАКТЫ</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Напишите нам и Мы ответим Вам в течении 24 часов.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Украина, Днепр</p>
            <p><span class="glyphicon glyphicon-phone"></span> +38(012)345-67-89</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
	<form role="form" method="POST" action="{{ url('/contacts/') }}" enctype="multipart/form-data">
	    {{ csrf_field() }}
	    <div class="col-sm-7 slideanim">
		<div class="row">
		    <div class="col-sm-6 form-group">
			<input class="form-control" id="name" name="name" placeholder="Имя" type="text" required>
		    </div>
		    <div class="col-sm-6 form-group">
			<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
		    </div>
		</div>
		<textarea class="form-control" id="comments" name="comments" placeholder="Ваш комментарий" rows="5"></textarea><br>
		<div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Отправить</button>
                    </div>
		    </form>	
		</div>
	    </div>
    </div>
</div>
@endsection