<?php

namespace App\Http\Controllers;
use App\Models\Apparatus;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $apparatus = Apparatus::all();
        return view('admin.borrowing.index' , ['Apparatus' => $apparatus]);
    }
    public function searchtext(Request $request)
    {
        if($request->search=='')
        {
            $apparatus =  Apparatus::all();
        }
        else
        {
             $apparatus =  Apparatus::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }
        return response()->json($apparatus);
    }
    public function additem(Request $request)
    {
        Session::push('addeditems',  $request->apparatusid);
        Session::push('qty',  $request->apparatusqty);
        return back();
    }
}
