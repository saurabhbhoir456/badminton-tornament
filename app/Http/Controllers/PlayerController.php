<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Player; // Ensure you have this model
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // Show the form to create a new player
    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    // Store a newly created player in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15|unique:players',
            'team_id' => 'nullable|exists:teams,id',
        ]);

        $player = Player::create($request->all());

        return redirect()->route('players.index')->with('success', 'Player added successfully.');
    }

    // Display a listing of players
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    // Show the form for editing the specified player
    public function edit($id)
    {
        // Fetch the player by ID
        $player = Player::findOrFail($id);
        // Fetch all teams
        $teams = Team::all();

        // Pass both player and teams to the view
        return view('players.edit', compact('player', 'teams'));
    }

    // Update the specified player in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15|unique:players,mobile_number,' . $id,
            'team_id' => 'nullable|exists:teams,id', // Validate team_id if provided
        ]);
    
        $player = Player::findOrFail($id);
        $player->update($request->all());
    
        return redirect()->route('players.index')->with('success', 'Player updated successfully.');
    }

    // Remove the specified player from storage
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }
}
