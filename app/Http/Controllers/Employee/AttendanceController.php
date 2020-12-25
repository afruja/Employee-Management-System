<?php

namespace App\Http\Controllers\Employee;

use App\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(){

        $user = Auth::id();
        $attendances = Attendance::where('user_id',$user)->get();
        return view('employee.attandence.show',compact('attendances'));
    }
}
