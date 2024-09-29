<?php

namespace App\Http\Controllers;

use App\Models\Player; // Ensure you have this model
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // Show the form to create a new player
    public function create()
    {
        return view('players.create');
    }

    // Store a newly created player in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15|unique:players',
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
        $player = Player::findOrFail($id);
        return view('players.edit', compact('player'));
    }

    // Update the specified player in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15|unique:players,mobile_number,' . $id,
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
