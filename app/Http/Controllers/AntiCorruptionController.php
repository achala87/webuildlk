<?php

namespace App\Http\Controllers;
use App\Models\Pledges;
use App\Models\User_Pledges;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AntiCorruptionController extends Controller
{
    public function reject_corruption_pledge()
    {
        $pledges = Pledges::all(['pledge_id', 'pledge' , 'hash_tags', 'description']);
       
        if($pledges){  
            return view('anti-corruption-vote', compact('pledges'));
        }
    }

    public function store_pledge(request $request){
           //dd($request->date_from);
           $data = request()->validate([
            'pledge' => 'required'
            ]);
            
            $user_pledges=array();

            foreach($request->pledge as $k=>$v){
                $user_pledges[] = ['user_id' => $request->user()->id, 'pledge_id' => $v, 'created_at'=> Carbon::now()];
            }
            //dd($user_pledges);
            $d = User_Pledges::upsert($user_pledges , ['user_id', 'pledge_id'], ['updated_at'] );
            if($d){
               $request->session()->flash('sucessrating', 'Thank you for being an active citizen and pledging to rebuild Sri Lanka. Join our team and lead the change.');
               return redirect()->route('anti-corruption', app()->getLocale());
           }else{
               $request->session()->flash('failrating','Failed!!! Please retry...');
               return redirect()->route('anti-corruption', app()->getLocale());
            }     
    }
}
