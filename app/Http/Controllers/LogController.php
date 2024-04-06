<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{
    public function logPage(){
        return view('page.log');
    }
    public function signPage(){
        return view('page.sign');
    }
    public function sign(UserRequest $request){
        $data=$request->validated();
        
        $user=User::query()->create($data);

        auth()->login($user);
        
        return redirect()->route('main.page');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('main.page');

    }

    public function log(Request $request){
        $validate=Validator::make($request->all(),[
            'email'=>['required', 'exists:users,email'],
            'password'=>['required']
        ]);

        $user=$validate->validate();

        if(!auth()->attempt($user)){
            return back()->withErrors(['invalid_password'=>'неверный пароль'])->withInput($request->all());
        }

        return redirect()->route('main.page');
    }
}
