<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'poll'=>'required',
            'option'=>'required'
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['vote_id'] = $request->vote_id;
        $data['option_id'] = $request->option_id;

        if( DB::table('submitted_votes')->insert($data)){
            return redirect()->with('message','submitted');
           }
           else{
            return redirect()->back();
           }
    }
    public function show_poll(){
        $polldata = DB::table('polls')->orderBy('id', 'desc')->get();
        return view('poll', compact('polldata'));
    
    }
}
