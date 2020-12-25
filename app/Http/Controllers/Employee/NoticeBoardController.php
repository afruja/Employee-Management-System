<?php

namespace App\Http\Controllers\Employee;
use Session;
use App\NoticeBoard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class NoticeBoardController extends Controller
{
    /*-----Notice Board Index Show Called This GET Route-----*/
    public function index()
    {
        //
        $notice_boards = NoticeBoard::orderBy('id','ASC')->get();
        return view('employee.notice.index',['notice_boards'=>$notice_boards]);
    }
}
