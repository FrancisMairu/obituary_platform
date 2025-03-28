<?php

namespace App\Http\Controllers;

use App\Models\Obituary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ObituaryController extends Controller
{
    /**
     * Display a listing of obituaries
     */
    public function index()
    {
        $obituaries = Obituary::orderBy('date_of_death', 'desc')
                     ->paginate(10);
        
        return view('obituaries.index', [
            'obituaries' => $obituaries
        ]);
    }

    /**
     * Show the form for creating a new obituary
     */
    public function create()
    {
        return view('obituaries.create');
    }

    /**
     * Store a newly created obituary
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'required|date|after:date_of_birth',
            'content' => 'required|string',
            'author' => 'required|string|max:100'
        ]);

        // Create the obituary with a unique slug
        $obituary = Obituary::create([
            'name' => $validated['name'],
            'date_of_birth' => $validated['date_of_birth'],
            'date_of_death' => $validated['date_of_death'],
            'content' => $validated['content'],
            'author' => $validated['author'],
            'slug' => Str::slug($validated['name'] . '-' . time()),
            'submission_date' => now()
        ]);

        // Redirect to the obituary page with success message
        return redirect()
               ->route('obituaries.show', $obituary->slug)
               ->with('success', 'Obituary submitted successfully!');
    }

    /**
     * Display the specified obituary
     */
    public function show($slug)
    {
        $obituary = Obituary::where('slug', $slug)->firstOrFail();
        return view('obituaries.show', compact('obituary'));
    }
}