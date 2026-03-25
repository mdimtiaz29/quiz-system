<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class Admincontroller extends Controller
{
    //
    function login(Request $request){
      $validation= $request->validate([
'name' => 'required|string|min:3',
'password' => 'required|string|min:6',
      ]);
     
$admin = Admin::where([
      ['name','=', $request->name],
      ['password','=', $request->password],
      ])->first();

      if (!$admin) {

         $validation= $request->validate([
'user' => 'required',

      ],[
        'user.required'=>'User does not exist',
      ]);
}
      Session::put('user',$admin);
      return redirect('dashboard');
    }

    function dashboard(){
            $admin= Session::get('user');
            if($admin){
                $user=User::orderBy('id','desc')->paginate(8);
               
            return view('admin',['getname'=>$admin->name,'user'=>$user]);
 }else{
     return redirect('adminlogin'); 
 }  

}
 public function categories()
{
$result=Category::all();
$admin = Session::get('user');

if ($admin) {
// Pass the name to the view
return view('category', ['name' => $admin->name,'allcat'=>$result]);
} else {
return redirect('adminlogin');
}
}
function logout(){
      Session::forget('user');
       return redirect('adminlogin'); 
}
function addcategory(Request $request){
      $admin=Session::get('user');
      $validation= $request->validate([
'category' => 'required | min:2 | unique:categories,name',

      ]);
      $getcat=new Category();
      $getcat->name=$request->category;
      $getcat->creator=$admin->name;
      if($getcat->save()){
Session::flash('msg',"Category ".$request->category." added");
           
      }
      
 return redirect('category');
}
function deleteCategory($id){
$isdelete=Category::destroy($id);
if($isdelete){
      Session::flash('msg',"Category removed");
}
return redirect('category');
}
function addquiz(){

$admin = Session::get('user');
      $result=Category::all();
 $total_mcq=0;   
if ($admin) {

 $cat_id=request('category_id');
$quizname=request('quiz_name');
if($cat_id && $quizname && !Session::has('quizdetails')){
   $quiz=new Quiz();
   $quiz->name=$quizname;
   $quiz->category_id=$cat_id;
   if($quiz->save()){
      Session::put('quizdetails',$quiz);
   // return 'added';
    Session::flash('msg1',"Quiz: ".$quiz->name." added");
   }
}else{
     $quiz = Session::get('quizdetails');

if ($quiz) {
    $quiz = Quiz::find($quiz->id); 
    $total_mcq = Mcq::where('quiz_id', $quiz->id)->count();
}
     // return $result;
}
return view('add-quiz', ['name' => $admin->name,'categories'=>$result, 'totalmcq'=>$total_mcq]);
} else {
return redirect('adminlogin');
}

}

function addmcq(Request $request){
    $admin = Session::get('user');
    $quiz = Session::get('quizdetails');
     if($request->has('leave')){
       return redirect('dashboard');
    }
    $validation=$request->validate([
      'question'=>'required | min:5',
      'a'=>'required | min:3',
      'b'=>'required | min:3',
      'c'=>'required | min:3',
      'd'=>'required | min:3',
      'correct_ans'=>'required'
    ]);
    $mcq= new Mcq();
    $mcq->question=$request->question;
    $mcq->a=$request->a;
    $mcq->b=$request->b;
    $mcq->c=$request->c;
    $mcq->d=$request->d;
    $mcq->correct_ans=$request->correct_ans;
    $mcq->admin_id=$admin->id;
    $mcq->quiz_id=$quiz->id;
    $mcq->category_id=$quiz->category_id;
    if ($mcq->save()) {
    if ($request->has('add_more')) {
      
        return redirect()->back();
    }
    
    else{
      Session::forget('quizdetails');
      Session::flash('msg2','MCQs got submitted');
      return redirect('dashboard');
    }
}

}
function showmcq($id){
      $admin = Session::get('user');
  $result=Mcq::where('quiz_id',$id)->get();
 if ($admin) {

return view('show-mcq', ['name' => $admin->name,'mcqs'=>$result]);
} else {
return redirect('adminlogin');
}
}
function quizlist($id,$name){
           $admin = Session::get('user');
  $result=Quiz::where('category_id',$id)->get();
  
 if ($admin) {

return view('quiz-list', ['name' => $admin->name,'allq'=>$result,'categoryname'=>$name]);
} else {
return redirect('adminlogin');
}
}
function mcqlist($id){
         $admin = Session::get('user');
  $result=Mcq::where('quiz_id',$id)->get();
 // return $result-question;
 if ($admin) {
return view('mcq-list', ['name' => $admin->name,'allquest'=>$result]);
} else {
return redirect('adminlogin');
} 
}
function activate($id){
     $result=User::find($id);
     if($result->active==2){
      $result->active=1;
      if($result->save()){
            return redirect('dashboard');
      }
     }
     if($result->active==1){
      $result->active=2;
      if($result->save()){
            return redirect('dashboard');
      }
     }
}
}