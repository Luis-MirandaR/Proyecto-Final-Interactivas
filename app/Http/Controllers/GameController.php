<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $games = Game::all();
        return view('games', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creategame');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $request->validate([
            'name' => 'required|string|max:255|unique:games,name',
            'genre' => 'required|string',
            'image_url' => 'nullable|url',
            ]);

            $game = new Game();
            $game->name = $request->name;
            $game->genre = $request->genre;
            $game->image_url = $request->image_url;
        
            $game->save();
            return redirect()->route('games')->with('success', 'Game created successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error creating game: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
        return view('editgame', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:games,name,' . $game->id,
                'genre' => 'required|string',
                'image_url' => 'nullable|url',
            ]);

            $game->name = $request->name;
            $game->genre = $request->genre;
            $game->image_url = $request->image_url;

            $game->save();
            return redirect()->route('games')->with('success', 'Game updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating game: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
