<link href="{{ asset('./style.css') }}" rel="stylesheet"> 
<link href="{{ asset('./bootstrap-3/css/bootstrap.min.css') }}" rel="stylesheet"> 
<script src="{{asset('./jquery.js')}}"></script>
<script src="{{asset('./funkcje.js')}}"></script>
<div class=container>
 <div class=row>
 
   <div class="col-md-13" id=kolumna>
   </div>

   <div class="col-md-3" id=kolumna2>
      <div id=kolumna3>
   <div align=center><span class=menu>MENU</span></div>
   <div id=kolumna4>
   <div align=center><a class=menu2 href={{ url('watch_work2')}}>Oferty pracy</a></div>
   </div>
   <br><br>
   <div id=kolumna4>
   <div align=center><a class=menu2>Wyszukaj oferte pracy</a></div>
   </div>
   <br><br>
   <div id=kolumna4>
   <div align=center><a class=menu2 href={{ url('add_work')}}>Dodaj nową ofertę pracy</a></div>
   </div>
   <br><br>
   <div id=kolumna4>
   <div align=center><a class=menu2 href={{ url('setting') }}>Ustawienia</a></div>
   </div>
   <br><br>
   <div id=kolumna4>
   <div align=center><a class=menu2 href={{ url('rejestracja') }}>Rejestracja</a></div>
   </div><br><br>
   @if (Auth::check() ==true )
   <div id=kolumna4>
   @if ($sum > 0 )
   <div align=center><a class=menu2 href={{ url('notifications') }}>Ilość nie czytanych komentarzy <span class=blad>({{$sum}})</span></a></div>
   @else
   <div align=center><a class=menu2 href={{ url('notifications') }}>Ilość nie czytanych komentarzy {{$sum}}</a></div>
   @endif
   </div><br><br>   
   @endif;
   <div id=kolumna3>
     @if (Auth::check() ==true )
  
  <div align=center><button onclick=wyloguj() class="btn btn-danger">Wyloguj {{  Auth::user()->name }}</button></div>
    @else 
<div class=row>
  <form class=form-inline action={{ url('login')}} method=post>
      <div class = "col-md-3">
      <span class=menu>login</span>
      </div>
      <div class = "col-md-9">
      <input type=text class=form-control size=19 placeholder=login name=login>
      </div>
      
      </div>
      <div class=row>
      <div class = "col-md-3">
      <span class=menu>hasło</span>
      </div>
      <div class = "col-md-9">
      <input type=password class=form-control size=20 placeholder=hasło name=password>
      </div>
      </div>
      <div class=row>
      <div class = "col-md-9">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div align=center><button onclick=wyloguj() class="btn btn-danger">Zaloguj</button></div>
      </div>
      </div>
    </form>
   @endif
   </div>

   </div>
   </div>  
   
   
   <div class="col-md-1" id=kolumna>
   </div>

   <div class="col-md-8" id=kolumna2>
   
      <div id=kolumna3>
   <div align=center><span class=menu>STRONA GŁÓWNA</span></div>
   @yield('content')
   
   
   </div>  
   </div>