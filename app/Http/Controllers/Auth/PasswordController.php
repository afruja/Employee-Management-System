<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index(){
       if (Auth::user()->type=='Admin') {
        return view('admin.change');
       }elseif (Auth::user()->type=='Manager') {
           return view('manager.change');
       }elseif (Auth::user()->type=='Employee') {
           return view('employee.change');
       }else{
           return redirect('/');
       }

    }

    public function update(Request $request ){
        $user = Auth::user();
        $newpass = [
            'password' => Hash::make($request->password)
        ];
        $user->update($newpass);
        return redirect('/admin');
    }
}
