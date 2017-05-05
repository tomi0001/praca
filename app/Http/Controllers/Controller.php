<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use Illuminate\Support\Facades\Validator;
use Input;
use Hash;
use DB;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
        public function register() {
         
	  //return View::make('/register');
	  return View('register');
	  //print "dobrze";
   
    }
    
    
        public function logout() {
    
          Auth::logout();
	  return View::make('/logout');
	  //print "dobrze";
    
    }
    
            public function error() {
    	if (!empty(Auth::user()->id) ) {
	  $sum = $this->quantity_not_read_comments(Auth::user()->id);
	}
	else $sum = 0;
          
	  return View::make('/error')->with('sum',$sum);
	  //print "dobrze";
    
    }
    
      public function sukces() {
	if (!empty(Auth::user()->id) ) {
	  $sum = $this->quantity_not_read_comments(Auth::user()->id);
	}
	else $sum = 0;
    
	  return View::make('/sukces')->with('sum',$sum);
	  //print "dobrze";
    
    }
    public function registration_succes() {

    
      return View::make('/sukces');
    }
    
    
        public function register2() {
        $klasa = new \App\Http\Controllers\klasa();
                          $rules = array(
    'email' => 'required|email|unique:users',
    'haslo' => 'required|same:haslo2|min:5|regex:[[a-z][0-9]]',
    'name'=> 'required|unique:users'
      );
      
      $validation = Validator::make(Input::all(), $rules);
      
      if ($validation->fails())
      {
      
	//return Redirect('rejestracja')->withErrors($validation)->withInput();
	//return redirect()->route('/rejestracja2', ['id' => 1]);
	return view('register', ['messages' => $validation]); 
	
      }
      $user = new \App\User;
      $user->email = htmlspecialchars(Input::get('email'));
      $user->password = Hash::make(Input::get('haslo'));
      $user->name = htmlspecialchars(Input::get('name'));
      $user->date_registration = time();
      if ($user->save())
      {
	//Auth::loginUsingId($user->id);
	return Redirect('registration_succes')->with('login_sukces','Poprawnie się zarejestrowałeś');
      }	
        //Input::get('login');
	  //return View::make('/register');
	  //return View::make('register2');
	  //print "dobrze";
    //
    
    }
    
    
    
        public function login() {
         if (!empty(Auth::user()->id) ) {
	$sum = $this->quantity_not_read_comments(Auth::user()->id);
      }
      else $sum = 0;
    
  $user = array(
    'name' => Input::get('login'),
    'password' => Input::get('password')
  );
  if (Input::get('login') == "" and Input::get('password') == "" ) {
    return Redirect('blad')->with('login_error','Uzupełnij pole login i hasło')->with('sum',$sum);
  }
  if (Auth::attempt($user))
  {
  print "kupa";
    return Redirect('/sukces')->with('login_sukces','Poprawnie się zalogowałeś')->with('sum',$sum);
  }
  else {
    return Redirect('blad')->with('login_error','Nieprawidłowy login lub hasło')->with('sum',$sum);
  }
    
    }
    private function read_city($id_city) {
      
      	  $city = DB::select("select id,city from city");
	  $cities = array();
	  $i = 0;
	  foreach ($city as $city2) {
	    $cities[$i][0] = $city2->id;
	    $cities[$i][1] = $city2->city;
	    if ($cities[$i][0] == $id_city) {
	      
	      $cities[$i][2] = $id_city;
	    }
	    else {
	      
	      $cities[$i][2] = 0;
	    }
	    $i++;
	  }
      
      
      
      
      return $cities;
      
    }
    public function add_work() {
         
	  //return View::make('/register');
	  $cities = $this->read_city(Auth::user()->id_city);
	  return View('add_work')->with('city',$cities)->with('id_city',Auth::user()->id_city);
	  //print "dobrze";
   
    }
    public function add_work2() {
    
	 //$variable = $this->check_variable(Input::get('price'));
	 
         if (Input::get('position') == "" or Input::get('price') == "" or Input::get('city') == "" or Input::get('education') == "" ) {
	    return Redirect('blad')->with('login_error','Uzupełnij wszystkie dane');
         }
         
         if (empty(Auth::user()->id) ) {
	    return Redirect('blad')->with('login_error','Musisz się zalogować');
         }
         //if ($variable == false) {
         if (!is_numeric(Input::get('price'))) {
	    return Redirect('blad')->with('login_error','W polu cena musi mieć wartość liczbową');
         }
         else {
	    
	    $this->add_work3(Input::get('position'),Input::get('price'),Input::get('city'),Input::get('education'));
	    return Redirect('/sukces')->with('login_sukces','Poprawnie dodano dane');
         }
	  //return View::make('/register');
	  //return View('add_work2');
	  //print "dobrze";
   
    }
    private function add_work3($position,$price,$city,$education) {
       $start_date = date("Y-m-d");
       $date_add = time();
       $id_users = Auth::user()->id;
       //print $city;
       DB::insert("insert into work_offers (name,price,date_add,start_date,id_city,education,id_user) values ('$position','$price','$date_add','$start_date','$city','$education','$id_users')");
      
      
      
      
    }
    private function read_work() {
      $work = DB::select("select name,price,id_city,id from work_offers order by date_add");
      $i = 0;
      $work3 = array();
      foreach ($work as $work2) {
	  $work3[$i][0] = $work2->name;
	  $work3[$i][1] = $work2->price;
	  //$work3[$i][2] = $work2->id_city;
	  $work3[$i][3] = $work2->id;
	  $id_city = $work2->id_city;
	  if ($id_city != "") {
	    $work4 = DB::select("select city from city where id = '$id_city'");
	  
	    foreach($work4 as $work5) {
	      $work3[$i][2] = $work5->city;
	    }
	  }
	  else {
	    $work3[$i][2] = 0;
	  }
	//print $work2->price;
	$i++;
      }
      return $work3;
    }
    
    
    public function watch_work() {
      $work = $this->read_work();
      if (!empty(Auth::user()->id) ) {
	$sum = $this->quantity_not_read_comments(Auth::user()->id);
      }
      else $sum = 0;
      return view('watch_work')->with('work',$work)->with('sum',$sum); 
      
    }
    
    

    public function setting() {
      if (empty(Auth::user()->id) ) {
	return Redirect('blad')->with('login_error','Musisz być zalogowany');
      }
      else {
	$array_education = $this->draw_education(Auth::user()->id);
	$cities = $this->read_city(Auth::user()->id_city);
	return view('setting')->with('cities',$cities)->with('id_city',Auth::user()->id_city)->with('array_education',$array_education);
      }
      
    }
    
    private function draw_education($id_user) {
      $array = array();
      $array2 = array();
      $array2[0] = "podstawowe";
      $array2[1] = "brak";
      $array2[2] = "zawodowe";
      $array2[3] = "niepełne średnie";
      $array2[4] = "średnie";
      $array2[5] = "niepełne wyższe";
      $array2[6] = "wyższe";
      $education = DB::select("select education from users where id = '$id_user'");
      foreach ($education as $education2) {
      
      }
      //$i = 0;
      //foreach ($education as $education2) {
      for ($i = 0;$i < count($array2);$i++) {
	if ($array2[$i] == $education2->education) {
	  $array[$i][0] = $array2[$i];
	  $array[$i][1] = true;
	}
	else {
	  $array[$i][0] = $array2[$i];
	  $array[$i][1] = false;	
	}
	//$i++;
      }
      return $array;
    }
    
    public function setting2() {
      $id_users = Auth::user()->id;
      if (Input::get("old_password") == "" and Input::get("new_password") == "" and Input::get("new_password2") == "" ) {
	$this->save_city($id_users,Input::get("cities"),Input::get('education'),"");
	return Redirect('sukces')->with('login_sukces','Pomyślnie zmodyfikowałeś dane');
      }
      else if (Input::get("old_password") != "" or Input::get("new_password") != "" or Input::get("new_password2") != "") {
	$result = $this->check_old_password(Input::get("old_password"));
	$result2 = $this->check_new_password(Input::get("new_password"),Input::get("new_password2"));
	if ($result == false) {
	  return Redirect('blad')->with('login_error','Podane stare hasło różni się od teraźniejszego hasła');
	//print bcrypt(Input::get("old_password"));
	//print "ff";
	}
	else if ($result2 == -1) {
	  return Redirect('blad')->with('login_error','Podane nowe hasłą różnią się');
	}
	else if ($result2 == -2) {
	  return Redirect('blad')->with('login_error','Hasło musi mięc minimum 5 znakóœ');
	}
	else {
	  $this->save_city($id_users,Input::get("cities"),Input::get('education'),Input::get('new_password'));
	  return Redirect('sukces')->with('login_sukces','Pomyślnie zmodyfikowałeś dane');
	}
      }
      else {
	return Redirect('sukces')->with('login_sukces','Pomyślnie zmodyfikowałeś dane');
      }
      
      
    }
    
    private function save_city($id_users,$id_city,$education,$password) {
      if ($password == "") {
	$array = array('id_city' => $id_city,'education' => $education);
      }
      else {
	$password = Hash::make($password);
	$array = array('id_city' => $id_city,'education' => $education,'password' => $password);
      }
          DB::table('users')
            ->where('id', $id_users)
            ->update($array);
      
    }
    
    private function check_old_password($password) {
      $check_password = Hash::check($password,Auth::user()->password);
      //print $check_password . "<br>" . Auth::user()->password;
      if ($check_password == true) return true;
      else return false;
    }
    private function check_new_password($password,$password2) {
      if ($password != $password2) return -1;
      else if ( strlen($password) < 5) return -2;
      else return 0;
    }
    
    
    public function watch_work2($work) {
      $id_work = $work;
      $work = $this->download_work($work);
      $id_user = $this->download_user2($work[5]);
      $bool = false;
      $result = $this->check_if_apply($id_user,$id_work);
      if (empty(Auth::user()->id)) $bool = false;
      if ($result == false ) $bool = false;
      else if (!empty(Auth::user()->id)) $bool = true;
      $read_kome = $this->read_kome($id_work);
      if (!empty(Auth::user()->id) ) {
	$sum = $this->quantity_not_read_comments(Auth::user()->id);
      }
      else $sum = 0;
      //$this->add_notifications2($id_work);
      return view('watch_work2')->with('work',$work)->with('bool',$bool)->with('read_kome',$read_kome)->with('z',0)->with('bool2','false')->with('id_work',$id_work)->with('sum',$sum);
    }
    private function download_work($id_work) {
      $work_download = DB::select("select name,price,start_date,id_city,education,id_user,id from work_offers where id = '$id_work'");
      
      foreach ($work_download as $work_download2) {
	//print "d";
      }
      //if (!empty($work_download2) ) {
	$user = $this->download_user($work_download2->id_user);
	$city = $this->read_city2($work_download2->id_city);
	return array($work_download2->name,$work_download2->price,$work_download2->start_date,$city,$work_download2->education,$user,$work_download2->id);
      //}
    }
    
    private function download_user($id_users) {
      $download_user = DB::select("select name from users where id = '$id_users'");
      foreach ($download_user as $download_user2) {
      
      }
      return $download_user2->name;
    }
    
    private function download_user2($user) {
      //print $user;
      $download_user = DB::select("select id from users where name = '$user'");
      foreach ($download_user as $download_user2) {
      
      }
      return $download_user2->id;
    }
    
    private function read_city2($id_city) {
      $read_city = DB::select("select city from city where id = '$id_city'");
      foreach ($read_city as $read_city2) {
	
      }
      return $read_city2->city;
    }
    
    public function apply() {
      if (Auth::user()->name == Input::get("user") ) {
	return Redirect('blad')->with('login_error','Nie możesz aplikowac do pracy, którą sam dodałeś');
      }
      else {
	$id_user = $this->download_user2(Input::get("user"));
	$result = $this->check_if_apply($id_user,Input::get("id"));
	if ($result == false) {
	  return Redirect('blad')->with('login_error','Już aplikowałeś na to miejsce pracy');
	}
	else {
	  $this->add_apply($id_user,Input::get("id"));
	  return Redirect('sukces')->with('login_sukces','Pomyślnie dodano aplikację');
	}
      }
      
      
    }
    private function check_if_apply($id_user,$id_work) {
      
      $check = DB::select("select id_work from apply where id_work = '$id_work' and id_user = '$id_user' ");
      
      foreach ($check as $check2) {
	if ($check2->id_work != "") return false;
      }
      return true;
    }
    private function add_apply($id_user,$id) {
      $start_date = time();
      $date_add = date("Y-m-d");
      //print $id;
      DB::insert("insert into apply(id_work,id_user,start_date,date_add) values('$id','$id_user','$start_date','$date_add')");
    }
    
    

    private function read_kome($id_work) {
      
      $read_kome = DB::select("select description,date_add,id_user,id from comments where id_work = '$id_work' ");
      $read_kome3 = array();
      $i = 0;
      $j = 0;
      //$z = 0;
      if (!empty(Auth::user()->id) ) {
	$this->add_notifications(Auth::user()->id,$id_work);
      }
      foreach ($read_kome as $read_kome2) {
	$read_kome3[$i][0] = $read_kome2->description;
	$read_kome3[$i][1] = $this->calculate_date($read_kome2->date_add);
	$read_kome3[$i][2] = $this->download_user($read_kome2->id_user);
	$read_kome3[$i][3] = false;
	$read_kome3[$i][4] = $this->calculate_commnets2($read_kome2->id);
	$read_kome3[$i][5] = $read_kome2->id;
	//if ($z > 0 ) {
	  //$read_kome3[$z-1][4] = $j;
	  //print "dobrze";
	//}
	//else {
	  //print "źle";
	  //$read_kome3[$z][4] = $j;
	//}
	//$read_kome3[$i][3] = $this->read_kome2($read_kome2->id);
	$id_kome = $read_kome2->id;
	$read_kome4 = DB::select("select description,date_add,id_user,id from comments2 where id_comments = '$id_kome' ");
	//$read_kome6 = array();
	$j = 0;
	foreach ($read_kome4 as $read_kome5) {
	  $i++;
	  $read_kome3[$i][0] = $read_kome5->description;
	  $read_kome3[$i][1] = $this->calculate_date($read_kome5->date_add);
	  $read_kome3[$i][2] = $this->download_user($read_kome5->id_user);
	  $read_kome3[$i][3] = true;
	  $read_kome3[$i][4] = 0;
	  $read_kome3[$i][5] = $read_kome5->id;
	  $j++;
	}
	
	//$z = $j;
	//$read_kome3[$i][4] = $z;
	//$z = 0;
	$i++;
	//$z++;
      }
      return $read_kome3;
      //print_r($read_kome3);
       //$a = array(1,2,3,4,5,array(1,2,3,4,array(1,2,3,4)));
       //$a[0][[0][0]] = "tomek";
       //$a[0][[0][1]] = "tomek2";
       //var_dump($a);
      //print $a[5][4][1];
      //print $read_kome3[0][0]->$read_kome3[0];
      //foreach ($read_kome3[1] as $read_kome4) {
	//print $read_kome4[0];
      //}
      //var_dump($read_kome3);
      //print $read_kome3[2][2];


//$data = [ 'element' ];
//$element = $data[0];
 
//var_dump($element);
 
//$data = [ ['element'] ];
//$element = $data[0];
 
//var_dump($element);
//var_dump($element[0]);
 
//$element = [ [ [ 'element'] ] ];
//print $element[ [ [ 'element' ] ] ];
//var_dump($element);
//var_dump($element[0]);
//print $element[0][0];

    }
    
    private function calculate_commnets2($id) {
      $check = DB::select("select id from comments2 where id_comments = '$id' ");
      $i = 0;
      foreach ($check as $check2) {
	
	$i++;
      }
      return $i;
    }
    
    private function read_kome2($id_kome) {
      $read_kome = DB::select("select description,date_add,id_user,id from comments2 where id_comments = '$id_kome' ");
      $read_kome3 = array();
      $i = 0;
      foreach ($read_kome as $read_kome2) {
	$read_kome3[$i][0] = $read_kome2->description;
	$read_kome3[$i][1] = $read_kome2->date_add;
	$read_kome3[$i][2] = $this->download_user($read_kome2->id_user);
	$i++;
      }
      return $read_kome3;
    }
    
    
    private function calculate_date($int) {
      $date = "";
      $result = time() - $int;
      $date2 = date("Y-m-d",$int);
      $date3 = date("Y-m-d");
      if ($result < 3600) {
	$date = $result / 60;
	$date = round($date);
	return $date . " minut temu";
      }
      else if ($result < 54000) {
	$date = $result / 60 / 60;
	$date = round($date);
	return $date . " godzin temu";
      }
      else if ($date2 == $date3) {
	return "dzisiaj o godzinie " . date("h",$int) . " i minucie " . date("i",$int);
      }
      else {
	return $date2 . " o godzinie " . date("h",$int) . " i minucie " . date("i",$int);
      }
    }
		    
    private function add_under_comments($id_comments,$if_true,$id_work) {
      $fieldx = Input::get('fieldx');
      $id_user = Auth::user()->id;
      print $id_work;
      $this->add_notifications2($id_work);
      $time = time();
      if ($if_true == true) {
      //print $if_true;
	$id_comments2 = DB::select("select id_comments from comments2 where id = '$id_comments'");
	foreach ($id_comments2 as $id_comments3) {
	  $id_comments4 = $id_comments3->id_comments;
	}
	//print $id_comments4;
	DB::insert("insert into comments2(description,date_add,id_user,id_comments) values('$fieldx','$time','$id_user','$id_comments4')");
      }
      else {
      //print $if_true;
      //print "id_comments2";
	DB::insert("insert into comments2(description,date_add,id_user,id_comments) values('$fieldx','$time','$id_user','$id_comments')");
      }
      
      
    }
    private function add_comments($id_work) {
      $fieldx = Input::get('fieldx');
      $id_user = Auth::user()->id;
      $time = time();      
      $this->add_notifications2($id_work);
      DB::insert("insert into comments(description,date_add,id_user,id_work) values('$fieldx','$time','$id_user','$id_work')");
      
    }
    public function write_comments() {
      if (empty(Input::get('id_comments') )) {
	$this->add_comments(Input::get('id_work'));
	print Input::get('id_work');
      }
      else {
      print Input::get('id_work');
      print "tomek";
	$this->add_under_comments(Input::get('id_comments'),Input::get('if_true'),Input::get('id_work'));
      }
    }
    private function add_notifications($id_user,$id_work) {
      $read_notifications = DB::select("select quantity_comments from Notifications where id_work = '$id_work' and id_user = '$id_user'");
      foreach ($read_notifications as $read_notifications2) {
	
      }
      if (isset($read_notifications2->quantity_comments) ) {
	  $update = array('quantity_comments' => 0);
	  DB::table('Notifications')->where('id_user', $id_user)->where('id_work',$id_work)->update($update);
      }
      else {
	  DB::insert("insert into Notifications(id_work,id_user,quantity_comments) values('$id_work','$id_user','0')");
      }

    }
    /*
    private function read_notifications($id_user) {
      $read_notifications = DB::select("select quantity_comments from Notifications where id_user = '$id_user'");
      $sum = 0;
      foreach ($read_notifications as $read_notifications2) {
	$sum += $read_notifications2->quantity_comments;
      }
      
      return $sum;
    }*/
    private function add_notifications2($id_work) {
      //$read_comments = DB::select("select distinct(comments2.id_user) from comments,comments2 where comments.id_work = '$id_work'");
      $id_users = Auth::user()->id;
      $read_comments = DB::select("SELECT id_user,id FROM comments where id_work = '$id_work' and id_user != '$id_users' ");
      $read_comments3 = array();
      $i = 0;
      foreach ($read_comments as $read_comments2) {
	//print $read_comments2->id_user . "<br>";
	$read_comments3[$i] = $read_comments2->id_user;
	//$read_comments3[$i][1] = $read_comments2->id;
	$id_kome = $read_comments2->id;
	//$this->add_notifications3($read_comments2->id_user,$id_work);
	$read_comments5 = DB::select("select id_user,id_comments from comments2 where id_comments = '$id_kome' and id_user != '$id_users' ");
	foreach ($read_comments5 as $read_comments6) {
	  $i++;
	  //$this->add_notifications3($read_comments4->id_user,$id_work);
	  //print $read_comments6->id_user . "<br>";
	  $read_comments3[$i] = $read_comments6->id_user;
	  //$read_comments3[$i][1] = $read_comments6->id_comments;
	  
	}
	$i++;
      
      }
      $result = array_unique($read_comments3);
      //for ($j = 0;$j < count($result);$j++) {
      foreach ($result as $result2) {
	$this->add_notifications4($result2,$id_work);
	
      }
      
      //var_dump($wynik);
    }
    
    public function notifications() {
      if (!empty(Auth::user()->id) ) {
	  $sum = $this->quantity_not_read_comments(Auth::user()->id);
      }
      else $sum = 0;
      $read_notifications = $this->read_notifications(Auth::user()->id);
      //if (empty($read_notifications) ) {
	//print "dupa";
	//return Redirect('blad')->with('login_error','Nie masz żadnych powiadomień');
      //}
      //else {
	return View('read_notifications2')->with('read_notifications',$read_notifications)->with('sum',$sum);
      //}
      var_dump($read_notifications);
      
    }
    

    private function read_notifications($id_user) {
      
      
      $read = DB::select("select quantity_comments,id_work from Notifications where id_user = '$id_user'and quantity_comments > '0'");
      $read3 = array();
      $i = 0;
      foreach ($read as $read2) {
	$id_work = $read2->id_work;
	$title_work = DB::select("select name from work_offers where id = '$id_work' ");
	foreach ($title_work as $title_work2) {
	
	}
	$read3[$i][0] = $read2->quantity_comments;
	$read3[$i][1] = $title_work2->name;
	$read3[$i][2] = $read2->id_work;
	
	$i++;
      }
      return $read3;
      
    }
    private function add_notifications3($id_user,$id_work) {
      
      DB::insert("insert into Notifications(id_work,id_user,quantity_comments) values ('$id_work','$id_user','1')");
      
    }
    private function add_notifications4($id_user,$id_work) {
      
      DB::insert("insert into Notifications(id_work,id_user,quantity_comments) values ('$id_work','$id_user','1')");
      
    }
    private function quantity_not_read_comments($id_user) {
      $read_quantity = DB::select("select quantity_comments from Notifications where id_user = '$id_user'");
      $sum = 0;
      foreach ($read_quantity as $read_quantity2) {
	$sum += $read_quantity2->quantity_comments;
	
      }
      
      return $sum;
    }
}
