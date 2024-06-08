<?php

namespace App\Http\Controllers;

use App\Models\Breakfast;
use App\Models\Menu;
use Illuminate\Http\Request;

class BreakfastController extends Controller
{
    public function index()
    {
        $breakfasts = Breakfast::with('meal')->get();
        return view('breakfast.index', compact('breakfasts'));
    }

    public function create()
    {
        $meals = Menu::all();
        return view('breakfast.create', compact('meals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'descripsi' => 'required|string',
            'harga' => 'required|integer',
            'meal_id' => 'required|exists:mealtype,id',
        ]);

        Breakfast::create($request->all());
        return redirect()->route('breakfast.index')->with('success', 'Breakfast created successfully.');
    }

    public function show(Breakfast $breakfast)
    {
        return view('breakfast.show', compact('breakfast'));
    }

    public function edit(Breakfast $breakfast)
    {
        $meals = Menu::all();
        return view('breakfast.edit', compact('breakfast', 'meals'));
    }

    public function update(Request $request, Breakfast $breakfast)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'descripsi' => 'required|string',
            'harga' => 'required|integer',
            'meal_id' => 'required|exists:mealtype,id',
        ]);

        $breakfast->update($request->all());
        return redirect()->route('breakfast.index')->with('success', 'Breakfast updated successfully.');
    }

    public function destroy(Breakfast $breakfast)
    {
        $breakfast->delete();
        return redirect()->route('breakfast.index')->with('success', 'Breakfast deleted successfully.');
    }
}
