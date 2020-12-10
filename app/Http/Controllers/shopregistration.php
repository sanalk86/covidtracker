<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class shopregistration extends Controller
{
    public function index(Request $request){
    //  echo $request->input('phone_number');
      $id = DB::table('shopmasters')->insertGetId(
      ['name' => $request->input('name'), 'shop_name' => $request->input('shop_name'), 'phone_number'=>$request->input('phone_number')]
      );
      return Redirect::back()->withErrors(['  Hi, please note your shop id to be deplayed is : '.$id]);
    }
}
