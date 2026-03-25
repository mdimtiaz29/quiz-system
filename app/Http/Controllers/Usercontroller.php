<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
use App\Models\McqRecord;
use App\Models\Upload;
use App\Mail\Verifyuser;
use App\Mail\ForgetVerify;
class Usercontroller extends Controller
{
             
    function getcategory(){
   $categories = Category::withCount('quizzes')->get();

   return view('welcome',['allcategory'=>$categories]);
}
function quizlistuser($id,$name){
  $result=Quiz::where('category_id',$id)->get();
  return view('user-quiz-list',['allquiz'=>$result,'categoryname'=>$name]);
}
function categoriestop(){
  $categories = Category::withCount('quizzes')->orderBy('quizzes_count','desc')->paginate(5);
 
  return view('category-top-list',['categories'=>$categories]);
}
function user_signup(Request $request){
$validation = $request->validate([
  'name'=>'required | min:3',
  'email'=>'required | email | unique:users,email',
  'password'=>'required | min:4 | confirmed'
]);

$user=User::create([
  'name'=>$request->name,
  'email'=>$request->email,
  'password'=>Hash::make($request->password),
]);
//
$link=Crypt::encryptString($user->email);

 $link = url('/verify-link/'.$link); 
 Mail::to($user->email)->send(new Verifyuser($link));
  
     
//
if ($user) {
    Session::put('user', $user);
    Session::flash('addmsg', 'Now you are the member and please check your email for confirmation. If you do not check and verify you cannot access properly!');
    return redirect('/');
}

}
function start_quiz($id,$name){
  $Userid=Session::get('user')->id;
  
  $checkRes=User::find($Userid);
  
if($checkRes->active!=2){
  Session::flash('invalidMsg','Unverified user, Please check your email for Verification!');
  return redirect('/');
  
}
  $result=Mcq::where('quiz_id',$id)->get()->count();
  $mcqs=Mcq::where('quiz_id',$id)->get();
  
  Session::put('firstmcq',$mcqs[0]);
  return view('start-quiz',['totalmcqs'=>$result,'getname'=>$name]);
}
function logout(){
  Session::forget('user');
  return redirect('/');
}
function usersignlog(){
  return view('user-signup');
}
function user_login(Request $r) {
    $validation = $r->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $r->email)->first();

    if ($user && Hash::check($r->password, $user->password)) {
       
       Session::put('user',$user);
       Session::flash('verifymsg','Successfully login');
        return redirect('/');
    } 
    else{
      $validation= $r->validate([
'user' => 'required',

      ],[
        'user.required'=>'User does not exist. Please check email and password!',
      ]);
    }
}
function mcq($id,$name){
 $record=new Record;
 $record->user_id=Session::get('user')->id;
$record->quiz_id=Session::get('firstmcq')->quiz_id;
$record->status=1;
if($record->save()){
 $currentquiz=[];
 $currentquiz['totalmcq']=Mcq::where('quiz_id',Session::get('firstmcq')->quiz_id)->get()->count();
$currentquiz['quizname']=$name;
$currentquiz['currentmcq']=1;
$currentquiz['quizid']=Session::get('firstmcq')->quiz_id;
$currentquiz['record_id']=$record->id;
Session::put('currentquiz',$currentquiz);
$mcqdata=Mcq::find($id);
  return view('mcq-page',['qname'=>$name,'mcqdata'=>$mcqdata]);
}

}
function submitnext(Request $request, $id){
if ($request->has('quit')) {
            Session::forget('currentquiz');
        return redirect('/');
    }
    $Currentquiz = Session::get('currentquiz');
$isexist = McqRecord::where('record_id', $Currentquiz['record_id'])
            ->where('mcq_id', $request->mcq_id)
            ->exists();
if(!$isexist){

    $mcq = Mcq::find($request->mcq_id);   // Get correct answer from MCQ table

    $mcq_rec = new McqRecord();
    $mcq_rec->record_id = $Currentquiz['record_id'];
    $mcq_rec->user_id = Session::get('user')->id;
    $mcq_rec->mcq_id = $request->mcq_id;
    $mcq_rec->select_answer = $request->option;

    // ✅ Correct Answer Check
    if(strtolower($request->option) == strtolower($mcq->correct_ans)){
        $mcq_rec->is_correct = 1;
    }else{
        $mcq_rec->is_correct = 0;
    }

    $mcq_rec->save();
}


    // ✅ THEN INCREASE QUESTION NUMBER
    $Currentquiz['currentmcq'] += 1;

    // ✅ THEN CHECK FINISH
    if($Currentquiz['currentmcq'] > $Currentquiz['totalmcq']){
      $final_result=McqRecord::WithMCQ()->where('record_id',$Currentquiz['record_id'])->get();
      $correctans=McqRecord::where([
        ['record_id','=',$Currentquiz['record_id']],
        ['is_correct','=',1]
      ])->count();
      $record=Record::find($Currentquiz['record_id']);
      if($record){
        $record->status=2;
        $record->update();
      }
        return view('quiz-result',['finalres'=>$final_result,'count_correct'=>$correctans]);
    }

    Session::put('currentquiz', $Currentquiz);

    // Get next MCQ
    $mcqdata = Mcq::where('quiz_id', $Currentquiz['quizid'])
                  ->orderBy('id')
                  ->skip($Currentquiz['currentmcq'] - 1)
                  ->first();

    return view('mcq-page', [
        'qname' => $Currentquiz['quizname'],
        'mcqdata' => $mcqdata
    ]);
}
function Userdetails($id){
  $quizrecords=Record::WithQuiz()->where('user_id',Session::get('user')->id)->get();
 
$getname=User::find($id);
$photo = Upload::where('user_id',$id)->first();

  return view('user-details',['username'=>$getname,'quizrecords'=>$quizrecords,'photo'=>$photo]);
}
function searchquiz(Request $request){
  $totalcal=Quiz::withCount('Mcqs')->where('name','Like','%'.$request->search.'%')->get();
  
return view('search-quiz',['totalcal'=>$totalcal]);
}
public function user_Verify($email)
{
 
$orgEmail=Crypt::decryptString($email);

$user=User::where('email',$orgEmail)->first();
if($user){
  $user->active=2;
  if($user->save()){
    
    
    return redirect('/');
  }
}
}
function user_forget(Request $r){
 $validation = $r->validate([
        'email' => 'required|email',
       
    ]);

    $user = User::where('email', $r->email)->first();
if(!$user){
      $validation= $r->validate([
'user' => 'required',

      ],[
        'user.required'=>'User does not exist. Please check email!',
      ]);
    }
    $link=Crypt::encryptString($user->email);

 $link = url('/verify-forgot-email/'.$link); 
 Mail::to($user->email)->send(new ForgetVerify($link));
  Session::flash('forgetmsg','Please check email');
    return redirect('/');
}
function userForgot($email){
  $orgEmail=Crypt::decryptString($email);

$user=User::where('email',$orgEmail)->first();
if($user){

  if($user->active==2){  //verified
    return view('reset-password',['email'=>$user->email]);
  }else if($user->active==1){  //if it is not verified with gmail
     return redirect('/');
  }
}else{
  return redirect('/');
}
}
function updatePassword(Request $request){
  $validation = $request->validate([

  'password'=>'required | min:4 | confirmed'
]);
 $user=User::where('email',$request->email)->first();
 if($user){
  $user->password=$request->password;
  if($user->save()){
    return view('user-login');
  }
 }
}
function certificate(){

$result = [];
$result['quizname']=Session::get('currentquiz')['quizname'];
$result['user_name']=Session::get('user')->name;
return view('Certificate',['name'=>$result['user_name'],'quiz'=>$result['quizname']]);
}
function edit($id){
$result=User::find($id);
return view('edit-profile',['result'=>$result]);

// if($result->active==2){
// $profile=new Upload();
// $profile->user_id=$id;
// $profile->image='image';
// if($profile->save()){
  
// }
// }
}
function uploadinfo(Request $request){
  $users = User::with('Upload')->where('id',$request->id)->get();
  $upload=new Upload();
  $upload->user_id=$request->id;
  if ($request->hasFile('file')){
    $path = $request->file('file')->store('profiles', 'public');
    $upld = basename($path);
}
$upload->image=$upld;
if($upload->save()){
  return redirect('/');
}
}
}
