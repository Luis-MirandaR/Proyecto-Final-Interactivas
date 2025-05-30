<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Game;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; 

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $games = Game::all();
        $categories = Category::all();
        $threads = Thread::where('user_id', $userId)->get();
        
        return view('mythreads', compact('threads', 'games', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        $categories = Category::all();
        return view('createthread', compact('games', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'game_id' => 'required|exists:games,id',
            'category_id' => 'required|exists:categories,id'
        ]);

        $thread = new Thread();
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->user_id = Auth::id();
        $thread->game_id = $request->game_id;
        $thread->category_id = $request->category_id; 


        $thread->save();


        return redirect()->route('threads')->with('success', 'Thread created successfully!');
    }

    public function pdf()
    {
    $threads = \App\Models\Thread::all();
    $pdf = Pdf::loadView('threads_pdf', compact('threads'));
    return $pdf->download('hilos.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        //
        return view('thread', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
