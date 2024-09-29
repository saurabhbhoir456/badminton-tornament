<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Display a listing of teams
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    // Show the form for creating a new team
    public function create()
    {
        return view('teams.create');
    }

    // Store a newly created team in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
        ]);

        Team::create($request->only('name'));

        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    // Show the form for editing the specified team
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    // Update the specified team in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:teams,name,'.$id,
        ]);

        $team = Team::findOrFail($id);
        $team->update($request->only('name'));

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    // Remove the specified team from storage
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}

