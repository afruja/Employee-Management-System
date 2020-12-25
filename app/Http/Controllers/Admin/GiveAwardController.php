<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
use App\GiveAward;
use App\AwardCategory;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Use_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class GiveAwardController extends Controller
{

    /*-----Give an Award Index Show Called This GET Route-----*/
    public function index()
    {
        $awards = GiveAward::all();
        $award_categories  = AwardCategory::all();
        $users  = User::all();
        // return $awards;

        return view('admin.award.index', compact('awards','award_categories','users'));
    }


    /*-----Give an Award Store Data Called Post Route-----*/
    public function store(Request $request)
    {
        //
        $validator=Validator::make($request->all(),[
            'award_category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'gift_item' => 'required',
            'cash_price' => 'required|integer|min:4',

        ]);
        if ($validator->fails()) {
            Alert::error('Oops!', 'Give an Award Has All Field Are Required and Cash Price Field Only Minimum 3 Digits Allows');
            return redirect('admin/give_awards')
                        ->withErrors($validator)
                        ->withInput();
        }

        $store = GiveAward::create($request->all());
        
        if ($store) {
            $alert = [
                'alert-type' => 'success',
                'message' => 'Give Award has been added successfully'
            ];
        }
        else{
            $alert = [
                'alert-type' => 'error',
                'message' => 'Someting went wrong'
            ];
        }
        return redirect('admin/give_awards')->with($alert);
    }
    
    public function create()
    {
        //

    }


    /*Award Certificate SHOW This Get Route*/
    public function show(GiveAward $GiveAward)
    {

        return view('admin.award.show_certificate', compact('GiveAward'));
      
    }

    /*Award Certificate PDF Generate This Get Route*/
    public function edit($id)
    {
        //
        $give_awards=GiveAward::findOrFail($id);
        //dd($GiveAward);
        //$GiveAward=GiveAward::findOrFail($id);
        $pdf = PDF::loadView('admin.pdf.certificate', compact('give_awards'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('certificate.pdf');
        
    }


    /*-----Give an Award Update Data Called Post Route-----*/
    public function update(Request $request)
    {
        //
        $validator=Validator::make($request->all(),[
            'gift_item' => 'required',
            'cash_price' => 'required|integer|min:4',

        ]);
        if ($validator->fails()) {
            Alert::error('Oops!', 'The Give Award All Field Is Required and Cash Price Field Only Minimum 3 Digits Allows');
            return redirect('admin/give_awards')
                        ->withErrors($validator)
                        ->withInput();
        }
        $id=$request->get('give_awards_id');
        $update=GiveAward::find($id);
        $update->award_category_id=$request->input('award_category_id');
        $update->user_id=$request->input('user_id');
        $update->gift_item=$request->input('gift_item');
        $update->cash_price=$request->input('cash_price');
        $update->date=$request->input('date');
        $update->save();
        if ($update) {
            $alert = [
                'alert-type' => 'success',
                'message' => 'Give Award updated successfully'
            ];
        }else{
            $alert = [
                'alert-type' => 'error',
                'message' => 'Someting went wrong'
            ];
        }
        return redirect('admin/give_awards')->with($alert);
    }

    /*-----Give an Award Delete Data Called Post Route-----*/
    public function destroy(Request $request)
    {
        //
        $id=$request->get('give_awards_id');
        $delete=GiveAward::find($id);
        $delete->delete();
        if ($delete) {
            $alert = [
                'alert-type' => 'success',
                'message' => 'Give Award Deleted Successfully'
            ];
        }else{
            $alert = [
                'alert-type' => 'error',
                'message' => 'Someting went wrong'
            ];
        }
        return redirect('admin/give_awards')->with($alert);
    }
}
