<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InitialFetchController extends Controller
{
    public function index ()
    {
        // 最初のレンダリングで与えるデータを選ぶ。
        if(Auth:: check()){
            $prefectures = DB::table('prefecture') -> orderBy('id','asc')->get(['id','name']);
            return response()->json($prefectures);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
