<?php
namespace App\Http\Controllers; 
  
 use App\Course;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\View\View;
 use App\Http\Requests; 
 use App\User;
 use DB;
 use Illuminate\Mail\Message;
 use Illuminate\Support\Facades\Input;
 use Psy\Util\Str;

 class AdminController extends Controller 
 { 
  
  
     public static function isAdmin(){ 
 		if (\Auth::guest() == false){
 			$isAdminTrue = \Auth::user()->isadmin;
 			if ($isAdminTrue === true){ 
 				return true; 
 			} 
 		} 
 		return false; 
     }


     public function executeSearch() {


         $keywords = Input::get('keywords');

         $courses = Course::all();

         $searchCourses = new \Illuminate\Database\Eloquent\Collection();

         foreach ($courses as $c) {
             if(str_contains($c->zip, $keywords)) {
                 $searchCourses->add($c);
             } elseif (str_contains(strtolower($c->name), strtolower($keywords))) {
                 $searchCourses->add($c);
             } elseif (str_contains(strtolower($c->city), strtolower($keywords))) {
                 $searchCourses->add($c);
             } elseif (str_contains(strtolower($c->state), strtolower($keywords))) {
                 $searchCourses->add($c);
             }

         }

         return view('admin.searchCourses', compact(['searchCourses']) );



     }
}
