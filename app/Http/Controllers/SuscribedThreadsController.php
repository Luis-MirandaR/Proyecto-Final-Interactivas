<?php

namespace App\Http\Controllers;

use App\Models\SuscribedThreads;
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
        return view('suscribed_threads', compact('suscribedThreads'));
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
