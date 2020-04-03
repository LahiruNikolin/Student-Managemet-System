<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
class attendenceController extends Controller
{
    public function issueCard($id){

        
        return view('Attendence.issueCard')->with('id',$id);
    }
}
