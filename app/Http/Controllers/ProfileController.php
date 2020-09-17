<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\History;
use DB;
use Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = History::where('id_user',Auth::user()->id)->get();
        $result = DB::table('history')
        ->join('users', 'users.id', '=', 'history.id_user')
        ->select('history.*', 'users.name')
        ->get()->toArray();  
        
        return view('profile',[
            'name' => $user->name,
            'email' => $user->email,
            'user_score' => $user->score,
            'records' => $data
        ]);
    }
}
