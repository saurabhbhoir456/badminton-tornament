<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\Team;
use App\Models\Matchh;
use App\Models\IndividualMatch;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Matchh::with('individualMatches')->get();
        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $players = Player::all(); // Assuming you have a Player model and table
        return view('matches.create', compact('players'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'match_date' => 'required|date',
            'venue' => 'required|string|max:255',
            'singles_player1_team1' => 'required|exists:players,id',
            'singles_player2_team1' => 'required|exists:players,id',
            'singles_player1_team2' => 'required|exists:players,id',
            'singles_player2_team2' => 'required|exists:players,id',
            'doubles_player1_team1' => 'required|exists:players,id',
            'doubles_player2_team1' => 'required|exists:players,id',
            'doubles_player3_team1' => 'required|exists:players,id',
            'doubles_player4_team1' => 'required|exists:players,id',
            'doubles_player1_team2' => 'required|exists:players,id',
            'doubles_player2_team2' => 'required|exists:players,id',
            'doubles_player3_team2' => 'required|exists:players,id',
            'doubles_player4_team2' => 'required|exists:players,id',
        ]);

        // Create the match
        $match = Matchh::create($request->only('team1_id', 'team2_id', 'match_date', 'venue'));

        // Create singles matches
        IndividualMatch::create([
            'match_id' => $match->id,
            'type' => 'single',
            'player1_id' => $request->singles_player1_team1,
            'player2_id' => $request->singles_player2_team1,
        ]);
        
        IndividualMatch::create([
            'match_id' => $match->id,
            'type' => 'single',
            'player1_id' => $request->singles_player1_team2,
            'player2_id' => $request->singles_player2_team2,
        ]);

        // Create doubles matches
        IndividualMatch::create([
            'match_id' => $match->id,
            'type' => 'double',
            'player1_id' => $request->doubles_player1_team1,
            'player2_id' => $request->doubles_player2_team1,
            'player3_id' => $request->doubles_player3_team1,
            'player4_id' => $request->doubles_player4_team1,
        ]);
        
        IndividualMatch::create([
            'match_id' => $match->id,
            'type' => 'double',
            'player1_id' => $request->doubles_player1_team2,
            'player2_id' => $request->doubles_player2_team2,
            'player3_id' => $request->doubles_player3_team2,
            'player4_id' => $request->doubles_player4_team2,
        ]);

        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }

    public function show(Matchh $match)
    {
        return view('matches.show', compact('match'));
    }

    public function edit(Matchh $match)
    {
        $players = Player::all();
        return view('matches.edit', compact('match', 'players'));
    }

    public function update(Request $request, Matchh $match)
    {
        // Update logic similar to store
    }

    public function destroy(Matchh $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('success', 'Match deleted successfully.');
    }
}
