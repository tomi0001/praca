@extends('layout.index')


@section('content')
<br>

@for ($i = 0;$i < count($work);$i++)
<a href="watch_work/{{$work[$i][3]}}"><div id=kolumna4>
<div class=row>
<div class = "col-md-1">
<span class=menu> <b>{!!$i+1 !!} </b></span>
</div>
<div class = "col-md-2">
<span class=menu> {!!$work[$i][0] !!} </span>
</div>
<div class = "col-md-3">
<span class=menu> {!!$work[$i][1] !!} zł </span>
</div>
<div class = "col-md-3">
<span class=menu> {!!$work[$i][2] !!} </span>
</div>
</div>
</div>
<br><br></a>
@endfor



 


@endsection