<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'user_role'=>'1'])){
                // Session::put('adminSession',$data['email']);
                return redirect('/admin/index');
            }else{
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function index(){
        // if(Session::has('adminSession')){
        //     //Perform All Tasks
        // }else{
        //     return redirect('/admin')->with('flash_message_error', 'Please Login to Proceed.');
        // }
        return view('admin.index');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function CheckPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $check_password = User::where(['user_role'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_password'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['password']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password Updated Successfully!');
            }else{
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect Password!');
            }
        }
        return view('admin.admin_login');
    }
    
    public function logout(){
        Session::flush();
        return redirect('/admin')->with('logout_message', 'You Have Successfully Logged Out!');
    }
}
