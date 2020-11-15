@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>Inicio</span></li>
@endsection

@section('content')
	<div class="mt-3">
		<center>
			<br><br>
			<img src="{{asset('img/welcome.png')}}" class="img-responsive">
		</center>
	</div>
@endsection
