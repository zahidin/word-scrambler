<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use App\Models\Words;
use Illuminate\Http\Request;

use DB;
use Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if(!Auth::Check()){
            return redirect('/');
        }
        
        if(Auth::Check() && Auth::user()->role !== 1){
            return redirect('home');
        }

        $result = DB::table('history')
        ->join('users', 'users.id', '=', 'history.id_user')
        ->select('history.*', 'users.name')
        ->get()->toArray();  
        
        return view('admin',['records' => $result]);
    }

    public function create_word(Request $request)
    {
        $faker = Faker::create();
        $word = $faker->lexify('???????');
        Words::create([
            'word' => $word,
        ]);

        return response()->json(['success' => true,'word' => $word]);
    }
}
