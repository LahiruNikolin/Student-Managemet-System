<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class attendenceController extends Controller
{
    public function issueCard($id){
        return view('Attendence.issueCard')->with('id',$id);
    }
}
