<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopmaster;
use DB;
use Illuminate\Support\Facades\Redirect;
class Transaction extends Controller
{
  public function index(Request $request){
    if(!$request->hidden_guest){
    $shopmaster = DB::table('shopmasters')->where('id', $request->shop_id)->get();
    return view('transaction', ['shopmaster' => $shopmaster]);
  }else{
    $id = DB::table('transactions')->insertGetId(
    ['guestid' => $request->input('hidden_guest'), 'shopid' => $request->input('hidden_shop'),'created_at'=> date('Y-m-d H:i:s')]
    );
    return Redirect::back()->withErrors(['Success']);
  }
   //echo 'in'.$request->shop_id;
  }
  

}
