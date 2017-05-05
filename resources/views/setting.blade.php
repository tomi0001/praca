@extends('layout.index')


@section('content')
<div class=row>
<form action=setting2 method=post>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Miejsce zamieszkania</span>
</div>

<div class = "col-md-5">

<select name=cities  class=form-control>
@for ($i=0;$i < count($cities);$i++)
@if ($cities[$i][2] == $id_city) 
<option value={{$cities[$i][0]}} selected>{{$cities[$i][1]}}</option>
@else
<option value={{$cities[$i][0]}}>{{$cities[$i][1]}}</option>
@endif
@endfor
</select>
</div>
<br><br>




<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Miejsce zamieszkania</span>
</div>

<div class = "col-md-5">
<select class=form-control name=education>
@for($i=0;$i< count($array_education);$i++)
@if($array_education[$i][1] == true)
<option value="{{$array_education[$i][0]}}" selected>{{$array_education[$i][0]}}</optino>
@else
<option value="{{$array_education[$i][0]}}">{{$array_education[$i][0]}}</optino>
@endif
@endfor
</select>
</div>
<br><br>

<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Stare hasło</span>
</div>

<div class = "col-md-5">
<input type=password class=form-control size=14 placeholder="stare hasło" name=old_password>

</div>
<br><br>

<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Nowe hasło</span>
</div>

<div class = "col-md-5">

<input type=password class=form-control size=14 placeholder="nowe hasło" name=new_password>
</div>
<br><br>

<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Wpisz jeszcze raz nowe hasło</span>
</div>

<div class = "col-md-5">

<input type=password class=form-control size=14 placeholder="nowe hasło" name=new_password2>
<br>
<button type=submit class="btn btn-warning">Zapisz</button>
</div>
<br><br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>

</div>
@endsection
