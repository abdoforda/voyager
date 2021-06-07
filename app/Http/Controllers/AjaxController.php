<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Employee as AppEmployee;
use App\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AjaxController extends Controller
{

    public function getuserdata(Request $request){
        $em = AppEmployee::find($request->id);
        return view('userdata',compact('em'));
    }

    public function getuserdatafrommonth(Request $request){
        $cat = Cat::find($request->cat);
        $users = $cat->employees;
        return view('datafromcat',compact('users','request'));
    }

    public function dashhome(){
        return view('dahshome');
    }

    

    
}
