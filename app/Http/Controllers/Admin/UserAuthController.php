<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Sentinel;
use Reminder;

class UserAuthController extends Controller
{
    public function login(){
        return view("Admin.Login.Login");
    }

    public function registration(){
        return view("Admin.Login.Registration");
    }
    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|min:5|max:12|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = Hash::make($request->password);
        $insert = $user->save();

        if ($insert){
            return back()->with('success','Register successful');
        }else{
            return back()->with('fail','Register Unsuccessful');
        }

    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);


        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('LoggedUser', $user->id);
                return redirect('/');
            }else{
                return back()->with('fail','Email and Password doesnt match.');
            }
        }else{
            return back()->with('fail','No account found for this email.');
        }
    }

    public function dashboard(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $user
            ];

            return view("Admin.AdminPanel.Dashboard.Dashboard",$data);
        }

    }

//    public function forgotPassword(){
//        return view('Admin.Login.ForgotPassword');
//    }
//    public function password(Request $request){
//        $request->validate([
//            'email' => "required|email"
//        ]);
//
//        $user = User::whereEmail($request->email)->first();
//
//        if (count($user) == 0){
//            return back()->with('error','Email not exist');
//        }
//        $user = Sentinel::findById($user->id);
//        $reminder = Reminder::exists($user) ? : Reminder::create($user);
//        $this->sendEmail($user,$reminder->code);
//        return back()->with('success','Rest code send to your Email !');
//    }
//
//    public function send_email($user, $code){
//        Mail::send(
//            'email.resetCode',
//            ['user'=>$user, 'code'=>$code],
//            function ($message) use ($user){
//                $message->to($user->email);
//                $message->subject("$user->name, Reset Your Password. ");
//           }
//        );
//    }

    function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

}
