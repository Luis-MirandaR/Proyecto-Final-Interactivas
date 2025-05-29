<?php

namespace App\Http\Controllers;

use App\Models\SuscribedThreads;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuscribedThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userId = Auth::id();
        $suscribedThreads = SuscribedThreads::where('user_id', $userId)->get();
        $threads = Thread::whereIn('id', $suscribedThreads->pluck('thread_id'))->get();
        return view('suscribed_threads', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $suscribedThread = new SuscribedThreads();
            $suscribedThread->user_id = Auth::id();
            $suscribedThread->thread_id = $request->thread_id;
            $suscribedThread->save();


            return redirect()->route('suscribed_threads')->with('success', 'Successfully subscribed to the thread.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while subscribing to the thread: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuscribedThreads $suscribedThreads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuscribedThreads $suscribedThreads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuscribedThreads $suscribedThreads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuscribedThreads $suscribedThreads)
    {
        //
    }
}
