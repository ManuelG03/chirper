<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(50)->get();
        

        return view('home', ['chirps' => $chirps]);
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
    // Validate the request
    $validated = $request->validate([
        'message' => 'required|string|max:255|min:5',
    ],   [
        'message.required' => 'Please enter a chirp for your chirp.',
        'message.string' => 'The message must be a valid string.',
        'message.max' => 'Your chirp cannot be longer than 255 characters.',
        'message.min' => 'Your chirp must be at least 5 characters long.',
    ]
    );

    // If the user is not logged in, redirect to login page
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to post a chirp.');
    }
   
    // Create the chirp associated with the authenticated user
    auth()->user()->chirps()->create($validated);

    return redirect('/')->with('success', 'Your chirp has been posted!');

}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Chirp $chirp)
{
    $this->authorize('update', $chirp);

    return view('chirps.edit', compact('chirp'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
{
    $this->authorize('update', $chirp);

    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);

    $chirp->update($validated);

    return redirect('/')->with('success', 'Chirp updated!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
{
    $this->authorize('delete', $chirp);

    $chirp->delete();

    return redirect('/')->with('success', 'Chirp deleted!');
}
}
