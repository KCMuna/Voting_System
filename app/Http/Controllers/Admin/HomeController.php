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
public function show_dashboard(){
    $optionCount=Option::count();
        $pollCount=Poll::count();
        $submittedCount = Submitted_Vote::count();

        return view('admin/dashboard',compact('optionCount','pollCount','submittedCount'));

}
public function show_option(){
    $optiondata = DB::table('options')->orderBy('id', 'asc')->get();
    return view('admin/option', compact('optiondata'));

}
 public function show(){
     $data=DB::table('polls')->orderBy('id','asc')->get();
 return view('admin/poll',compact('data'));

 }
 public function show_submitted() {
        $submitted = DB::table('submitted__votes')->orderBy('id', 'asc')->get();
    return view('admin/submitted', compact('submitted'));
}

   public function option_store(Request $request){
    $this->validate($request,[
        'oname'=>'required',
        'pollid'=>'required'

    ]);
    $optiondata['option_name']=$request->oname;
    $optiondata['poll_id']=$request->pollid;


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
        'pollid'=>'required'
    ]);
    DB::table('options')->where('id','=',$request->criteria)->update([
       'option_name'=>$request->oname,
        'poll_id'=>$request->pollid
    ]);
    return redirect()->route('admin.option')->with('success','upadted successfully');
}

  }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function store(Request $request){
    $this->validate($request,[
        'name'=>'required',
        'date'=>'required'
    ]);
    
    $data['poll_title']=$request->name;
        $data['end_at'] = $request->date;

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
         'date'=>'required'
         
     ]);
     DB::table('polls')->where('id','=',$request->criteria)->update([
         'poll_title'=>$request->name,
         'end_at'=>$request->date
     ]);
     return redirect()->route('admin.poll')->with('success','updated successfully');
 }

   }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function counter()
    {
        $optionCount=Option::count();
        $pollCount=Poll::count();
        $submittedCount = Submitted_Vote::count();
        $KP = DB::table('submitted__votes')->where('option_id', '=',6)->count();
        $prachanda = DB::table('submitted__votes')->where('option_id', '=',7)->count();
        $balen = DB::table('submitted__votes')->where('option_id', '=',8)->count();
        $harka = DB::table('submitted__votes')->where('option_id', '=',9)->count();
// ->where('poll_title','=','Local Election')->orWhere('poll_title','=','Provincial Assembly Election')
// ->where('poll_title','=','Local Election')->orWhere('poll_title','=','Provincial Assembly Election')
// ->where('poll_title','=','Local Election')->orwhere('poll_title','=','Provincial Assembly Election')
        
        // $localelection = Submitted_Vote::count()->where('option_name', '=', 'Local Election');

        return view('admin.dashboard',compact('optionCount','pollCount','submittedCount','KP','prachanda','balen','harka'));
    
      
    }

    public function viewStats(Poll $Poll){
        $options = $Poll->Options;
        $votedUsers = $Poll->votedUsers;
        // dd($options);
        $var = array();
        $label = array();
        foreach($options as $option)
        {
            $count = 0;
            $id = $option->id;
            
            foreach($votedUsers as $vote)
            {
                if($id == $vote->pivot->option_id) {
                    $count ++;
                };
            }
            $label[] = $option->option_name;
            $var[] = $count;
        }
        return view('admin.chart')->with('var',$var)->with('label',$label)->with('totalVotes',$votedUsers->count());

    }
}
