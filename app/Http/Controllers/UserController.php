<?php

namespace App\Http\Controllers;

use App\Models\Submitted_Vote;
use App\Models\Poll;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function vote_store(Request $request){
        // $this->validate($request, [
        //     'poll'=>'required',
        //     'option'=>'required'
        // ]);

        // $data['name'] = Auth::user()->name;
        // $data['poll_title'] = $request->poll;
        // $data['option_name'] = $request->option;
       
        // if(DB::table('submitted__votes')->insert($data)){
        //     return redirect()->route('poll');
        //    }
        //    else{
        //     return redirect()->back();
        //    }
        if (Auth::id()) {
            $submit = new Submitted_Vote;
            $submit->name=Auth::user()->name;
            $submit->poll_title=$request->poll_title;
            $submit->option_name=$request->option;
            // dd($submit);
            $submit->save();
            return redirect()->route('poll');
        }else{
            return redirect()->route('dashboard');
        }


    }
    public function show_poll(){
        $polldata = DB::table('polls')->orderBy('id', 'desc')->get();
        return view('poll', compact('polldata'));
    
    }

}
