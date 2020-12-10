<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;

class publicRegistration extends Controller
{
    public function index(Request $request){
      $id = DB::table('publicmaster')->insertGetId(['name' => $request->input('name'), 'otp' => $request->input('otp'), 'phone_number'=>$request->input('phone_number')]);
      return Redirect::back()->withErrors(['Msg']);
    }

    public function getlist(Request $request){
      $array=array();
      $id=DB::table('publicmaster')
      ->select('publicmaster.id','transactions.created_at')
      ->join('transactions','transactions.guestid','=','publicmaster.id')
      ->where(['publicmaster.phone_number' => $request->phone_number])
      ->get();
      foreach ($id as $key => $value) {
        $newdate=date($value->created_at, strtotime('+6 hours'));
        $publicmaster=DB::table('publicmaster')
        ->select('publicmaster.name','publicmaster.phone_number','transactions.created_at')
        ->join('transactions','transactions.guestid','=','publicmaster.id')
        ->whereBetween('transactions.created_at',[$value->created_at,$newdate])
        ->get()->toArray();

        if($array==""){
        $array=$publicmaster;}
        else{
        $array = array_merge($array, $publicmaster);
      }
      }
      return view('home', ['list' => $array]);

    }
}
