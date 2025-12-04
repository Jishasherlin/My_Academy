<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function index()
    {
         $mentors = Mentor::all();
        return view('mentor.index', compact('mentors'));
    }   
    function create()
    {
        $mentors = Mentor::all();
        return view('mentor.create', compact('mentors'));
    }
    
    function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mentors',
            'expertise' => 'required|string|max:255',
        ]);

        // Assuming you have a Mentor model
        Mentor::create([
            'image' => $request->file('image')->store('images', 'public'),
            'name' => $request->name,
            'email' => $request->email,
            'expertise' => $request->expertise,
        ]);

        return redirect()->route('mentor.index')->with('success', 'Mentor added!');
    }   
    function edit(Mentor $mentor)
    {
        return view('mentor.edit', compact('mentor'));
    }
    function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mentors,email,' . $mentor->id,
            'expertise' => 'required|string|max:255',
        ]);

        $mentor->update([
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : $mentor->image,
            'name' => $request->name,
            'email' => $request->email,
            'expertise' => $request->expertise,
        ]);

        return redirect()->route('mentor.index')->with('success', 'Mentor updated!');
    }
    function destroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('mentor.index')->with('success', 'Mentor deleted!');
    }   
}
