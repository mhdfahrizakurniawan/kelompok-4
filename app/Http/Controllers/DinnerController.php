<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Dinner;
use Illuminate\Http\Request;

class DinnerController extends Controller
{
    public function index()
    {
        $dinner = Dinner::with('meal')->get();
        return view('dinner.index', compact('dinner'));
    }

    public function create()
    {
        $meals = Menu::all();
        return view('dinner.create', compact('meals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'descripsi' => 'required|string',
            'harga' => 'required|integer',
            'meal_id' => 'required|exists:mealtype,id',
        ]);

        Dinner::create($request->all());
        return redirect()->route('dinner.index')->with('success', 'dinner created successfully.');

        // dinner::create($request->all());
        // return redirect()->route('dinner.index')->with('success', 'dinner created successfully.');
    }

    public function show(Dinner $dinner)
    {
        return view('dinner.show', compact('dinner'));
    }

    public function edit(Dinner $dinner)
    {
        $meals = Menu::all();
        return view('dinner.edit', compact('dinner', 'meals'));
    }

    public function update(Request $request, Dinner $dinner)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'descripsi' => 'required|string',
            'harga' => 'required|integer',
            'meal_id' => 'required|exists:mealtype,id',
        ]);

        $dinner->update($request->all());
        return redirect()->route('dinner.index')->with('success', 'dinner updated successfully.');
    }

    public function destroy(Dinner $dinner)
    {
        $dinner->delete();
        return redirect()->route('dinner.index')->with('success', 'dinner deleted successfully.');
    }
}
