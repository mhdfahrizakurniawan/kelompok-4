<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Lunch;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    public function index()
    {
        $lunch = Lunch::with('meal')->get();
        return view('lunch.index', compact('lunch'));
    }

    public function create()
    {
        $meals = Menu::all();
        return view('Lunch.create', compact('meals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'descripsi' => 'required|string',
            'harga' => 'required|integer',
            'meal_id' => 'required|exists:mealtype,id',
        ]);

        Lunch::create($request->all());
        return redirect()->route('lunch.index')->with('success', 'Lunch created successfully.');

        // Lunch::create($request->all());
        // return redirect()->route('lunch.index')->with('success', 'Lunch created successfully.');
    }

    public function show(Lunch $lunch)
    {
        return view('lunch.show', compact('lunch'));
    }

    public function edit(Lunch $lunch)
    {
        $meals = Menu::all();
        return view('lunch.edit', compact('lunch', 'meals'));
    }

    public function update(Request $request, Lunch $lunch)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'descripsi' => 'required|string',
            'harga' => 'required|integer',
            'meal_id' => 'required|exists:mealtype,id',
        ]);

        $lunch->update($request->all());
        return redirect()->route('lunch.index')->with('success', 'Lunch updated successfully.');
    }

    public function destroy(Lunch $lunch)
    {
        $lunch->delete();
        return redirect()->route('lunch.index')->with('success', 'Lunch deleted successfully.');
    }
}
