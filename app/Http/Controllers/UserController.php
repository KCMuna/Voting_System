<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\User;
use App\Models\Option;
use App\Models\Submitted_Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function vote_store(Request $request){
    //     // dd($request->all());
    //     $this->validate($request, [
    //         'criteria'=>'required|unique:users,id',
    //         'poll_title'=>'required',
    //         'option'=>'required'
    //     ]);

    //     // $data['name'] = Auth::user()->name;
    //     // $data['poll_title'] = $request->poll;
    //     // $data['option_name'] = $request->option;
       
    //     // if(DB::table('submitted__votes')->insert($data)){
    //     //     return redirect()->route('poll');
    //     //    }
    //     //    else{
    //     //     return redirect()->back();
    //     //    }

    //     if (Auth::id()) {
    //         $submit = new Submitted_Vote;
    //         $submit->user_id=Auth::user()->id;
    //         $submit->name=Auth::user()->name;
    //         $submit->poll_title=$request->poll_title;
    //         $submit->option_name=$request->option;
    //         $submit->save();  


            
    //         return redirect()->route('dashboard');
    //     }else{
    //         return redirect()->route('dashboard');
    //     }

    // }

    public function vote_store(Request $request)
    {        
        $validatedData = $request->validate([
            'criteria'=>'required',
            'poll_title'=>'required',
            'option_name'=>'required'
        ]);


        $submit = new Submitted_Vote;
        $submit->user_id=Auth::user()->id;
        $submit->name=Auth::user()->name;
        $submit->poll_title = $request->poll_title;
        $submit->option_name = $request->option_name;
        DB::table('users')->where('status', '=', '0')->update(['status'=>1
        ]);
        
        $submit->save();
        return redirect()->route('poll')->with('status', 'Voted successfully');

    }
    public function show_poll(){
        $polldata = DB::table('polls')->orderBy('id', 'desc')->get();
        return view('poll', compact('polldata'));
    
    }
    public function show_option(){
        // $optiondata = DB::table('options')
        $optiondata=DB::table('options')->select('option_name')->where('poll_title','=','Local Election')->get();
       
       
        // $optiondata = DB::table('options')->orderBy('id', 'desc')->get();
        return view('poll', compact('optiondata'));
    
    }
}
