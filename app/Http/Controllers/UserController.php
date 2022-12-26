<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Poll;
use App\Models\User;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Models\Submitted_Vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // dd($request->option_name);
        // $validatedData = $request->validate([
        //     'criteria'=>'required',
        //     'pollid'=>'required',
        //     'option_id'=>'required'
        // ]);


        // $submit = new Submitted_Vote;
        // $submit->user_id=Auth::user()->id;
        // $submit->option_id = $request->option_id;
        // $submit->poll_id = $request->poll_id;
        // DB::table('users')->where('status', '=', '0')->update(['status'=>1
        // ]);
        // $submit->save();

        // return redirect()->route('showpoll')->with('status', 'Voted successfully');

        $poll_id = $request->poll_id;
        $option_id = $request->option_id;

        $user = Auth::user();
        $votedPoll = $user->votedPolls()->where(['poll_id'=>$poll_id])->count();
        if($votedPoll == 0){
            $user->votedPolls()->attach($poll_id,['option_id'=>$option_id]);
        }
        else{
            return view('dashboard');
        }
        return redirect()->back()->with('sucess','voted sucessfully');

    }
    public function show_poll(){
        $polldata=Poll::whereDate('end_at', '>=', Carbon::today()->toDateString())->latest()->get();

        // $polldata = DB::table('polls')->orderBy('id', 'desc')->where()->get();
       
        return view('poll', compact('polldata'));
    
    }

    public function spoll($id)
    {
      
        $poll = Poll::find($id);
       
        return view('showpoll')->with('poll',$poll);
    }

    public function profile(){
        return view('myprofile');
    }
   public function updateprofile(Request $request){
        $validateData = $request->validate([
            'oldpassword'=>'required',
             'password'=>'required|confirmed'
            //  'password_confirmation'=>'required'
        ]);
// if($request->npassword == $request->cpassword){


        $hashedPassword = Auth::user()->password;
      
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password); 
            $user->save();

            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Is Changed Successfully');
        }else{
            return redirect()->back()->with('error', 'Current Password Is Invalid');

        }
    // }else{
    //         return redirect()->back()->with('error', 'password didn/t match');
    // }
   }
}
