@extends('layout.index')


@section('content')
<br>
<div class=row>
<form action=add_work2 method=post>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Stanowisko</span>
</div>

<div class = "col-md-5">


<input type=text class=form-control size=14 placeholder=stanowisko name=position>

</div>
<br><br>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Wynagrodzenie</span>
</div>

<div class = "col-md-5">


<input type=text class=form-control size=14 placeholder=wynagrodzenie name=price>

</div>


<br><br>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Miasto</span>
</div>

<div class = "col-md-5">



<select name=city class=form-control>
@for ($i=0;$i < count($city);$i++)
<option value={{$city[$i][0]}}>{{$city[$i][1]}}</option>

@endfor
</select>
</div>

<br><br>
<div class = "col-md-3">

</div>
<div class = "col-md-2">
<span class=reje>Wykształcenie</span>
</div>

<div class = "col-md-5">

<select class=form-control name=education>
<option value=brak>brak wykształcenia</option>
<option value=podstawowe>podstawowe</option>
<option value=zawodowe>zawodowe</option>
<option value="niepełne średnie">niepełne średnie</option>
<option value="średnie">średnie</option>
<option value="niepełne wyższe">niepełne wyższe</option>
<option value="wyższe">wyższe</option>
</select>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<br>
<button type=submit class="btn btn-warning">Dodaj ofertę</button>


@if(isset($messages) ) 
 @foreach ($messages->errors()->all() as $msg) 
  <br><span class=blad> {!!$msg !!} </span>
 @endforeach
@endif
 
</div>

</div>

@endsection
