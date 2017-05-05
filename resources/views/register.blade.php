@extends('layout.index')


@section('content')
<br>
<div class=row>
<form action=rejestracja2 method=post>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Twój login</span>
</div>

<div class = "col-md-5">


<input type=text class=form-control size=14 placeholder=login name=name>

</div>
<br><br>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Twoje hasło</span>
</div>

<div class = "col-md-5">


<input type=password class=form-control size=14 placeholder=hasło name=haslo>

</div>


<br><br>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Wpisz jeszcze raz twoje hasło</span>
</div>

<div class = "col-md-5">


<input type=password class=form-control size=14 placeholder=hasło name=haslo2>

</div>

<br><br>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Twój email</span>
</div>

<div class = "col-md-5">


<input type=text class=form-control size=14 placeholder=email name=email>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<br>
<button type=submit class="btn btn-warning">Zarejestruj</button>


@if(isset($messages) ) 
 @foreach ($messages->errors()->all() as $msg) 
  <br><span class=blad> {!!$msg !!} </span>
 @endforeach
@endif
 
</div>

</div>

@endsection
