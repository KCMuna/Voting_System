<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use App\Models\Option;
use App\Models\Submitted_Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
public function show_(){
    return view('admin/dashboard');

}
public function show_option(){
    $optiondata = DB::table('options')->orderBy('id', 'desc')->get();
    return view('admin/option', compact('optiondata'));

}
 public function show(){
     $data=DB::table('polls')->orderBy('id','desc')->get();
 return view('admin/poll',compact('data'));

 }
 public function show_submitted() { 
    return view('admin/submitted');
}

   public function option_store(Request $request){
    $this->validate($request,[
        'oname'=>'required',
        'opname'=>'required'

    ]);
    
    $optiondata['option_name']=$request->oname;
    $optiondata['poll_title']=$request->opname;


   if( DB::table('options')->insert($optiondata)){
    return redirect()->route('admin.option');
   }
   else{
    return redirect()->back();
   }
  }
  public function option_edit(Request $request){
    $id=$request->id;
    $data=DB::table('options')->where('id','=',$id)->first();
    return view('admin/option_edit',compact('data'));

   }
   public function option_delete(Request $request){
    $id=$request->id;
    DB::table('options')->where('id','=',$id)->delete();
    return redirect()->route('admin.option');

   }

   public function option_update(Request $request){
    if($request->isMethod('get')){
        return redirect()->back();
    }
    if($request->isMethod('post')){
    $this->validate($request,[
        'oname'=>'required',
        'opname'=>'required'
    ]);
    DB::table('options')->where('id','=',$request->criteria)->update([
       'option_name'=>$request->oname,
        'poll_title'=>$request->opname
    ]);
    return redirect()->route('admin.option')->with('success','upadted successfully');
}

  }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function store(Request $request){
    $this->validate($request,[
        'name'=>'required',
    ]);
    
    $data['poll_title']=$request->name;

   if( DB::table('polls')->insert($data)){
    return redirect()->route('admin.poll');
   }
   else{
    return redirect()->back();
   }
  }

   public function edit(Request $request){
    $id=$request->id;
    $data=DB::table('polls')->where('id','=',$id)->first();
    return view('admin/edit',compact('data'));

   }
   public function delete(Request $request){
     $id=$request->id;
     DB::table('polls')->where('id','=',$id)->delete();
     return redirect()->route('admin.poll');

    }
   public function update(Request $request){
     if($request->isMethod('get')){
         return redirect()->back();
     }
     if($request->isMethod('post')){
     $this->validate($request,[
         'name'=>'required',
     ]);
     DB::table('polls')->where('id','=',$request->criteria)->update([
         'poll_title'=>$request->name,
     ]);
     return redirect()->route('admin.poll')->with('success','upadted successfully');
 }

   }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function counter()
    {
        $optionCount=Option::count();
        $pollCount=Poll::count();
        $submittedCount = Submitted_Vote::count();
        return view('admin.dashboard',compact('optionCount','pollCount','submittedCount'));
      
    }

}
