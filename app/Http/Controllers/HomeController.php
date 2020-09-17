<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Words;
use App\Models\User;
use App\Models\History;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        if(Auth::Check() && Auth::user()->role == 1){
            return redirect('admin');
        }
        $test = Words::select('id','word')->get();

        if(isset($test) > 0){
            $getWord = Words::select('id','word')->get()->random();
            
            $anwser = [];
            $wordCorrect = $getWord->word;
            $wordSuffle = str_shuffle($getWord->word);
    
    
            if($request->ajax()){
                $user = User::find(Auth::user()->id);
                $word = Words::find(base64_decode($request->all()['secret']));
                
                if($request->all()['answer'] === $word->word){
                    $user->score = $user->score + 10;
                    $user->save();
    
                    History::create([
                        'id_user' => $user->id,
                        'score' =>  $user->score + 10,
                        'word' => base64_decode($request->all()['secret']),
                        'answer' => $request->all()['answer'],
                        'correct' => 1,
                    ]);
    
    
                    return response()->json(['success' => true]);
                }
    
                History::create([
                    'id_user' => $user->id,
                    'score' => $user->score + 10,
                    'word' => base64_decode($request->all()['secret']),
                    'answer' => $request->all()['answer'],
                    'correct' => 0,
                ]);
                
                return response()->json(['success' => false,'correct' => $word->word]);
            }
    
            for($i = 0; $i < 3; $i++){
                array_push($anwser,str_shuffle($wordSuffle));
                $i === 2  &&  array_push($anwser,$getWord->word) ;
            };
    
            $user = User::find(Auth::user()->id);
            $collection = collect($anwser);
            $shuffled = $collection->shuffle();
    
            return view('home', [
                'words' => str_shuffle($getWord->word),
                'answer' => $shuffled->all(),
                'secret' => base64_encode($getWord->id),
                'score' => $user->score
            ]);
        }else{
            $user = User::find(Auth::user()->id);

            return view('home', [
                'words' => '',
                'answer' => '',
                'secret' => '',
                'score' => $user->score
            ]);
        }
    }
}
