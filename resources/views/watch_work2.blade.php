@extends('layout.index')


@section('content')
<br>
<div class=row>
<div class = "col-md-3">

</div>
<div class = "col-md-3">
<span class=menu><b>Nazwa</b></span>
</div>
<div class = "col-md-3">
<span class=menu>{{$work[0]}}</span>
</div>
</div>
<div class=row>
<div class = "col-md-3">

</div>
<div class = "col-md-3">
<span class=menu><b>Cena</b></span>
</div>
<div class = "col-md-3">
<span class=menu>{{$work[1]}} zł</span>
</div>
</div>
<div class=row>
<div class = "col-md-3">

</div>
<div class = "col-md-3">
<span class=menu><b>Ddata dodania</b></span>
</div>
<div class = "col-md-3">
<span class=menu>{{$work[2]}}</span>
</div>
</div>

<div class=row>
<div class = "col-md-3">

</div>
<div class = "col-md-3">
<span class=menu><b>Miasto</b></span>
</div>
<div class = "col-md-3">
<span class=menu>{{$work[3]}}</span>
</div>
</div>

<div class=row>
<div class = "col-md-3">

</div>
<div class = "col-md-3">
<span class=menu><b>Wykształcenie</b></span>
</div>
<div class = "col-md-3">
<span class=menu>{{$work[4]}}</span>
</div>
</div>
<div class=row>
<div class = "col-md-3">

</div>
<div class = "col-md-3">
<span class=menu><b>Użytkownik</b></span>
</div>
<div class = "col-md-3">
<span class=menu>{{$work[5]}}</span>
</div>
</div>


<div class=row>
<div class = "col-md-5">

</div>
<div class = "col-md-6">
@if ($bool == true)
<button onclick=apply('{{$work[6]}}','{{$work[5]}}','{{url('apply')}}') class="btn btn-danger">Aplikuj</button>
@endif
</div>
</div>
@for ($i = 0;$i < count($read_kome);$i++) 

@if ($read_kome[$i][3] == true)

<div class=row>
  <div class=fieldy{{$z}}>
  <br>
    <div class="col-md-3">


    </div>
  <div class="col-md-7" id=comments>
    <div class=row>
      <div class="col-md-3">
	<span class=menu><B>{{$read_kome[$i][2]}}</b></span>
      </div>
      <div class="col-md-1">
    
      </div>
      <div class="col-md-6">
	<span class=menu><B>{{$read_kome[$i][1]}}</b></span>
      </div>
    </div>
    <div class=row>
      <div class="col-md-10">
	<span class=menu>{{$read_kome[$i][0]}}</span>
      </div>
    </div>
  
  
    <div class=row>
    
    
    
    
      <div class="col-md-5">
	  @if ($bool == true)
	    <a onclick=show_field({{$i}})>Odpowiedź</a>
	  @endif
      </div>
      <div class="col-md-5">
      
    </div>
    
  </div>
  
  
<div class=row>
    
    
    
    
  <div class="col-md-10">
    <div id=field{{$i}}>
    <form action = {{ url('write_comments') }} method=post>
    <textarea name=fieldx cols=40></textarea>
    <input type=hidden name=if_true value={{$read_kome[$i][3]}}>
    <input type=hidden name=id_comments value={{$read_kome[$i][5]}}>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button  class="btn btn-danger">Napisz</button>
    </form> 
    </div>
  </div>
  
</div>
  
</div>


</div>

</div>

@php

$bool2 = false;
@endphp

@else




@if ($bool2 == false)  
 @php
 $z++;
 $bool2 = true;
  
 
  @endphp
@endif

<br>
<div class=row>
<div class="col-md-2">

</div>

<div class="col-md-7" id=comments>
  <div class=row>
  <div class="col-md-3">
    <span class=menu><B>{{$read_kome[$i][2]}}</b></span>
  </div>
  <div class="col-md-1">
    
  </div>
  <div class="col-md-6">
     <span class=menu><B>{{$read_kome[$i][1]}}</b></span>
  </div>
  </div>
  <div class=row>
  <div class="col-md-10">
  <span class=menu>{{$read_kome[$i][0]}}</span>
  </div>
  </div>
  
        <div class=row>
    
    
    
    
  <div class="col-md-5">
  @if ($bool == true)
  <a onclick=show_field({{$i}})>Odpowiedź</a>
  @endif
  </div>
  <div class="col-md-5">
  @if ($read_kome[$i][4] != 0)
  <a onclick=show_fieldy({{$z}})>komentarze ({{$read_kome[$i][4]}})</a>
  @endif
  </div>
  </div>
  
  
  <div class=row>
  <div class="col-md-10">
  <div id=field{{$i}}>
  
    <form action = {{ url('write_comments') }} method=post>
    <textarea name=fieldx cols=40></textarea>
    <input type=hidden name=if_true value={{$read_kome[$i][3]}}>
    <input type=hidden name=id_comments value={{$read_kome[$i][5]}}>
    <input type=hidden name=id_work value={{$id_work}}>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button  class="btn btn-danger">Napisz</button>
    </form>
  </div>
  </div>
  </div>
</div>

</div>


@endif

@endfor
  <div class=row>
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <form action = {{ url('write_comments') }} method=post>
    <textarea name=fieldx cols=40></textarea>
    <input type=hidden name=id_work value={{$id_work}}>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    <button  class="btn btn-danger">Napisz</button>
    </form> 
    </div>
    </div>
<script language="javascript">
hide({{$i}});
hide_fieldy({{$i}});
//tomek();
</script>
@endsection
