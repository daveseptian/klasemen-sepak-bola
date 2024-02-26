<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function addClub(){
        return view('add-club');
    }

    public function storeClub(Request $request){
        $request->validate([
            'club_name' => 'required|string|max:255|unique:clubs',
            'club_city' => 'required|string|max:255'
        ]);

        Club::create([
            'club_name' => $request->club_name,
            'club_city' => $request->club_city,
            'club_total_plays' => 0
        ]);

        return redirect()->route('dashboard')->withSuccess('Klub berhasil ditambahkan!');
    }

    public function addClubScores(){
        return view('add-scores');
    }

    public function storeMatch(Request $request){
        
        $club1 = [$request->club_name1, $request->club_score1];
        $club2 = [$request->club_name2, $request->club_score2];
        
        if(Score::where('club_name', '=', $club1[0])->exists() && Score::where('club_name', '=', $club2[0])->exists()){
            if($club1[1] > $club2[1]){
                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_score', $club1[1]);

                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_wins');

                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_points', 3);
                
                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_score', $club2[1]);
                
                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_loses');
            }
            else if($club1[1] < $club2[1]){
                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_score', $club2[1]);

                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_wins');

                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_points', 3);
                
                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_score', $club1[1]);
                
                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_loses');
            }
            else if($club1[1] == $club2[1]){
                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_score', $club2[1]);

                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_draws');

                DB::table('scores')
                ->where('club_name', $club2[0])
                ->increment('club_points');
                
                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_score', $club1[1]);
                
                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_draws');
                
                DB::table('scores')
                ->where('club_name', $club1[0])
                ->increment('club_points');
            }
        }
        else{
            if($club1[1] > $club2[1]){
                Score::create([
                    'club_name' => $club1[0],
                    'club_score' => $club1[1],
                    'club_wins' => 1,
                    'club_loses' => 0,
                    'club_draws' => 0,
                    'club_points' => 3,
                ]);

                
                Score::create([
                    'club_name' => $club2[0],
                    'club_score' => $club2[1],
                    'club_wins' => 0,
                    'club_loses' => 1,
                    'club_draws' => 0,
                    'club_points' => 0,
                ]);
            }
            else if($club1[1] < $club2[1]){
                Score::create([
                    'club_name' => $club2[0],
                    'club_score' => $club2[1],
                    'club_wins' => 1,
                    'club_loses' => 0,
                    'club_draws' => 0,
                    'club_points' => 3,
                ]);

                
                Score::create([
                    'club_name' => $club1[0],
                    'club_score' => $club1[1],
                    'club_wins' => 0,
                    'club_loses' => 1,
                    'club_draws' => 0,
                    'club_points' => 0,
                ]);
            }
            else if($club1[1] == $club2[1]){
                Score::create([
                    'club_name' => $club2[0],
                    'club_score' => $club2[1],
                    'club_wins' => 0,
                    'club_loses' => 0,
                    'club_draws' => 1,
                    'club_points' => 1,
                ]);

                
                Score::create([
                    'club_name' => $club1[0],
                    'club_score' => $club1[1],
                    'club_wins' => 0,
                    'club_loses' => 0,
                    'club_draws' => 1,
                    'club_points' => 1,
                ]);
            }
        }

        DB::table('clubs')
        ->where('club_name', $club1[0])
        ->increment('club_total_plays');

        DB::table('clubs')
        ->where('club_name', $club2[0])
        ->increment('club_total_plays');
        
        return redirect()->route('dashboard')->withSuccess('Skor berhasil ditambahkan!');
    }

    public function viewTable(){
        $klub = DB::table('clubs')->get();
        $skor = DB::table('scores')->get();

        return view('show-table', ['klub' => $klub, 'skor' => $skor]);
    }
}
